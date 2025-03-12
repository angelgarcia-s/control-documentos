<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait SortableSearchable
{
    /**
     * Aplica ordenamiento y búsqueda a una consulta.
     *
     * @param Request $request
     * @param mixed $query Consulta Eloquent
     * @param array $allowedSorts Columnas permitidas para ordenar
     * @param array $searchableFields Campos directos para buscar
     * @param array $searchableRelations Relaciones para buscar con JOIN (opcional)
     * @return mixed
     */
    protected function applySortingAndSearching(
        Request $request,
        $query,
        array $allowedSorts,
        array $searchableFields,
        array $searchableRelations = []
    ) {
        // Ordenamiento
        $sort = $request->query('sort', 'id'); // Por defecto, ordenar por ID
        $direction = $request->query('direction', 'asc'); // Por defecto, ascendente

        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id'; // Fallback si la columna no es válida
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc'; // Fallback si la dirección no es válida
        }

        // Prefijar la columna de ordenamiento con el nombre de la tabla principal
        $tableName = $this->getTableName($query);
        $query->orderBy("$tableName.$sort", $direction);

        // Búsqueda
        $search = $request->query('search', []);

        // Campos directos
        foreach ($searchableFields as $field) {
            if (!empty($search[$field])) {
                $query->where("$tableName.$field", 'like', '%' . $search[$field] . '%');
            }
        }

        // Relaciones con JOIN
        foreach ($searchableRelations as $relation => $details) {
            if (!empty($search[$relation])) {
                $query->leftJoin(
                    $details['table'],
                    "$tableName.$relation",
                    '=',
                    $details['table'] . '.' . $details['key']
                )->where(
                    $details['table'] . '.' . $details['searchField'],
                    'like',
                    '%' . $search[$relation] . '%'
                );
            }
        }

        return $query;
    }

    /**
     * Obtiene el nombre de la tabla de la consulta.
     *
     * @param mixed $query
     * @return string
     */
    protected function getTableName($query)
    {
        return $query->getModel()->getTable();
    }
}