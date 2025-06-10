# 📚 Manual: Sistema de Tablas con Livewire + HasTableFeatures

## 🎯 Descripción General

Este manual explica cómo crear tablas interactivas con **búsqueda**, **ordenamiento**, **paginación** y **gestión de relaciones** usando el trait `HasTableFeatures` desarrollado para el proyecto.

---

## 🏗️ Arquitectura del Sistema

### **Componentes Principales:**

1. **Trait HasTableFeatures** (`app/Traits/HasTableFeatures.php`)
   - Funcionalidades genéricas de tabla
   - Búsquedas, ordenamiento, paginación
   - Manejo de relaciones complejas

2. **Componente Livewire** (ej: `PrintCardsTable.php`)
   - Configuración específica de la tabla
   - Definición de columnas y relaciones
   - Lógica de negocio específica

3. **Vista Blade** (ej: `print-cards-table.blade.php`)
   - Renderizado de la tabla
   - Campos de búsqueda dinámicos
   - Interfaz de usuario

4. **Vista Index** (ej: `print-cards/index.blade.php`)
   - Contenedor principal
   - Botones de acción
   - Alertas y mensajes

---

## 🔧 Paso a Paso: Crear Nueva Tabla

### **1. Crear el Componente Livewire**

```bash
php artisan make:livewire NombreTabla
```

**Ejemplo: `app/Livewire/ProductosTable.php`**

```php
<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Traits\HasTableFeatures;

class ProductosTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    // 📋 CONFIGURACIÓN DE COLUMNAS
    public $columnas = [
        // Campo simple
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        
        // Campo con relación simple
        ['name' => 'categoria', 'label' => 'Categoría', 'sortable' => true, 'searchable' => true, 
         'relationship' => 'categoria', 'search_field' => 'nombre'],
        
        // Campo con relación anidada
        ['name' => 'proveedor_contacto', 'label' => 'Contacto Proveedor', 'sortable' => true, 'searchable' => true,
         'relationship' => 'proveedor.contacto'],
        
        // Campo no buscable
        ['name' => 'created_at', 'label' => 'Fecha Creación', 'sortable' => true, 'searchable' => false],
    ];

    // 🧹 MÉTODOS DE LIMPIEZA
    public function clearErrorMessage()
    {
        $this->errorMessage = '';
    }

    // 🗑️ MÉTODOS DE ELIMINACIÓN
    public function confirmarEliminar($id)
    {
        $this->confirmingDelete = $id;
        $this->dispatch('abrir-modal', 'eliminar-elemento');
    }

    public function eliminarElemento()
    {
        if ($this->confirmingDelete) {
            $producto = Producto::find($this->confirmingDelete);
            if ($producto) {
                try {
                    $producto->delete();
                    session()->flash('success', 'Producto eliminado correctamente.');
                    $this->resetPage();
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el producto: ' . $e->getMessage();
                }
                $this->confirmingDelete = null;
            }
        }
    }

    public function cancelarEliminar()
    {
        $this->confirmingDelete = null;
    }

    // 📊 RENDERIZADO PRINCIPAL
    public function render()
    {
        // Consulta base con relaciones
        $query = Producto::query()->with(['categoria', 'proveedor']);
        
        // Aplicar filtros del trait
        $query = $this->aplicarFiltros($query, $this->columnas);
        
        // Paginar resultados
        $productos = $query->paginate($this->perPage);

        return view('livewire.productos-table', [
            'productos' => $productos,
            'columnas' => $this->columnas,
        ]);
    }

    // 🎨 FORMATEO DE VALORES
    public function getColumnValue($producto, $columna)
    {
        // Manejo de relaciones
        if (isset($columna['relationship'])) {
            if ($columna['name'] === 'categoria') {
                return $producto->categoria->nombre ?? '-';
            }
            if ($columna['name'] === 'proveedor_contacto') {
                return $producto->proveedor->contacto ?? '-';
            }
        }

        // Formateo de campos especiales
        $campo = $columna['name'];
        if ($campo === 'created_at') {
            return $producto->created_at ? $producto->created_at->format('d/m/Y') : '-';
        }
        if ($campo === 'precio') {
            return $producto->precio ? '$' . number_format($producto->precio, 2) : '-';
        }

        // Campo normal
        return $producto->$campo ?? '-';
    }
}
```

### **2. Crear la Vista de la Tabla**

**Archivo: `resources/views/livewire/productos-table.blade.php`**

```blade
<div class="overflow-x-auto">
    <div class="ti-custom-table ti-striped-table ti-custom-table-hover">
        <!-- Mensajes de Error -->
        @if ($errorMessage)
            <x-alert type="danger" :message="$errorMessage" duration="3000"
                x-init="setTimeout(() => { show = false; $wire.clearErrorMessage(); }, 3000)" />
        @endif

        <!-- Tabla Principal -->
        <table class="w-full bg-white table-auto whitespace-nowrap border border-gray-300 rounded-lg">
            <!-- ENCABEZADOS -->
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    @foreach($columnas as $columna)
                        <th class="py-3 px-6 text-left border cursor-pointer" 
                            wire:click="ordenarPor('{{ $columna['name'] }}')">
                            {{ $columna['label'] }}
                            @if($columna['sortable'])
                                <i class="ti {{ $orderBy === $columna['name'] ? ($orderDirection === 'asc' ? 'ti-sort-ascending' : 'ti-sort-descending') : 'ti-arrows-sort' }} ml-1"></i>
                            @endif
                        </th>
                    @endforeach
                    <th class="py-3 px-6 text-left border">Acciones</th>
                </tr>
                
                <!-- FILA DE BÚSQUEDA -->
                <tr>
                    @foreach($columnas as $columna)
                    <th class="border px-4 py-2 relative">
                        @if($columna['searchable'])
                            <div class="relative">
                                <input type="text"
                                       wire:model.live="search.{{ $columna['name'] }}"
                                       class="ti-form-input w-full text-sm px-2 py-1 border rounded focus:ring-1 focus:ring-blue-500"
                                       placeholder="Buscar {{ $columna['label'] }}">
                                @if(!empty($search[$columna['name']]))
                                    <button type="button"
                                            wire:click="limpiarBusqueda('{{ $columna['name'] }}')"
                                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                        <i class="ti ti-x text-sm"></i>
                                    </button>
                                @endif
                            </div>
                        @endif
                    </th>
                    @endforeach
                    <th class="border px-4 py-2"></th>
                </tr>
            </thead>

            <!-- CUERPO DE LA TABLA -->
            <tbody>
                @foreach($productos as $producto)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                        @foreach($columnas as $columna)
                            <td class="py-3 px-6 border">
                                {!! $this->getColumnValue($producto, $columna) !!}
                            </td>
                        @endforeach
                        <td class="py-3 px-6 border">
                            <!-- Botones de Acción -->
                            <div class="flex space-x-2">
                                @can('productos-show')
                                    <a href="{{ route('productos.show', $producto) }}" 
                                       class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave" title="Ver">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                @endcan
                                @can('productos-edit')
                                    <a href="{{ route('productos.edit', $producto) }}" 
                                       class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave" title="Editar">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                @endcan
                                @can('productos-destroy')
                                    <button wire:click="confirmarEliminar({{ $producto->id }})" 
                                            class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave" title="Eliminar">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- PAGINACIÓN -->
        <div class="mt-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm text-gray-600">Mostrar:</label>
                    <select wire:model.live="perPage" 
                            class="ti-form-select w-20 text-sm border rounded">
                        @foreach($perPageOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    <span class="text-sm text-gray-600">registros</span>
                </div>
                <div>
                    {{ $productos->links('livewire.pagination') }}
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE CONFIRMACIÓN DE ELIMINACIÓN -->
    <x-modal-confirmacion 
        modalId="eliminar-elemento"
        titulo="Confirmar Eliminación"
        mensaje="¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer."
        accionConfirmar="eliminarElemento"
        accionCancelar="cancelarEliminar" />
</div>
```

### **3. Crear la Vista Index**

**Archivo: `resources/views/productos/index.blade.php`**

```blade
@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <x-breadcrumbs />
    </div>
    <!-- Page Header Close -->
    
    <!-- Alertas -->
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    
    <!-- Contenedor Principal -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Lista de Productos</h5>
                </div>
                <div class="box-body space-y-3">
                    <!-- Botones de Acción -->
                    <div class="flex justify-between">
                        <div>
                            @can('productos-create')
                                <a href="{{ route('productos.create') }}" 
                                   class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">
                                   Agregar Producto
                                </a>
                            @endcan
                        </div>
                        <div class="space-x-2">
                            @can('productos-import')
                                <button type="button" class="ti-btn ti-btn-primary" id="import-xlsx">
                                    Importar
                                </button>
                            @endcan
                            @can('productos-download')
                                <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">
                                    Descargar
                                </button>
                            @endcan
                        </div>
                    </div>
                    
                    <!-- Componente Livewire -->
                    <livewire:productos-table />
                </div>
            </div>
        </div>
    </div>
@endsection
```

---

## 📋 Configuración de Columnas

### **Tipos de Columnas Soportadas:**

#### **1. Campo Simple**
```php
['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true]
```

#### **2. Campo con Relación Simple**
```php
['name' => 'categoria', 'label' => 'Categoría', 'sortable' => true, 'searchable' => true, 
 'relationship' => 'categoria', 'search_field' => 'nombre']
```

#### **3. Campo con Relación Anidada**
```php
['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true,
 'relationship' => 'productoCodigoBarra.sku']
```

#### **4. Campo No Buscable**
```php
['name' => 'created_at', 'label' => 'Fecha', 'sortable' => true, 'searchable' => false]
```

### **Propiedades de Columna:**

| Propiedad | Tipo | Descripción |
|-----------|------|-------------|
| `name` | string | Nombre del campo (debe coincidir con el campo del modelo) |
| `label` | string | Etiqueta que se muestra en la tabla |
| `sortable` | boolean | Si la columna se puede ordenar |
| `searchable` | boolean | Si la columna se puede buscar |
| `relationship` | string | Nombre de la relación Eloquent |
| `search_field` | string | Campo específico a buscar en la relación |

---

## 🔍 Funcionalidades del Trait

### **Búsquedas Automáticas:**

1. **Campos de Texto**: Usa `LIKE %valor%`
2. **Campos Numéricos**: Usa `= valor` (detección automática)
3. **Relaciones Simples**: Busca en el campo especificado por `search_field`
4. **Relaciones Anidadas**: Maneja automáticamente relaciones como `modelo.campo`

### **Ordenamiento:**
- Click en encabezados para ordenar
- Indicadores visuales de dirección
- Soporte para ordenamiento en relaciones

### **Paginación:**
- Selector de registros por página
- Navegación automática
- Preserva filtros y búsquedas

---

## 🎨 Formateo de Datos

### **En el método `getColumnValue`:**

```php
public function getColumnValue($modelo, $columna)
{
    // 1. Manejo de relaciones
    if (isset($columna['relationship'])) {
        if ($columna['name'] === 'categoria') {
            return $modelo->categoria->nombre ?? '-';
        }
    }

    // 2. Formateo de campos especiales
    $campo = $columna['name'];
    if ($campo === 'created_at') {
        return $modelo->created_at ? $modelo->created_at->format('d/m/Y') : '-';
    }
    if ($campo === 'precio') {
        return $modelo->precio ? '$' . number_format($modelo->precio, 2) : '-';
    }
    if ($campo === 'activo') {
        return $modelo->activo ? 
            '<span class="badge bg-success">Activo</span>' : 
            '<span class="badge bg-danger">Inactivo</span>';
    }

    // 3. Campo normal
    return $modelo->$campo ?? '-';
}
```

---

## ⚠️ Mejores Prácticas

### **1. Performance:**
```php
// ✅ CORRECTO: Usar eager loading
$query = Modelo::query()->with(['relacion1', 'relacion2']);

// ❌ INCORRECTO: Sin eager loading (N+1 queries)
$query = Modelo::query();
```

### **2. Seguridad:**
```php
// ✅ CORRECTO: Validar permisos en botones
@can('modelos-edit')
    <a href="{{ route('modelos.edit', $modelo) }}">Editar</a>
@endcan

// ✅ CORRECTO: Proteger eliminación
try {
    $modelo->delete();
    session()->flash('success', 'Eliminado correctamente.');
} catch (\Exception $e) {
    $this->errorMessage = 'Error: ' . $e->getMessage();
}
```

### **3. UX:**
```php
// ✅ CORRECTO: Mostrar valores por defecto
return $modelo->campo ?? '-';

// ✅ CORRECTO: Formatear datos apropiadamente
return $modelo->fecha ? $modelo->fecha->format('d/m/Y') : '-';
```

---

## 🐛 Solución de Problemas Comunes

### **1. Búsqueda no funciona en relaciones:**
```php
// Verificar que esté definido search_field
['name' => 'categoria', 'relationship' => 'categoria', 'search_field' => 'nombre']
```

### **2. Ordenamiento no funciona:**
```php
// Verificar que sortable esté en true
['name' => 'campo', 'sortable' => true]
```

### **3. Error N+1 queries:**
```php
// Agregar eager loading en render()
$query = Modelo::query()->with(['relacion']);
```

### **4. Campo no se muestra:**
```php
// Verificar en getColumnValue()
if ($columna['name'] === 'mi_campo') {
    return $modelo->mi_campo ?? '-';
}
```

---

## 📚 Ejemplo Completo

Ver implementaciones de referencia en:
- `app/Livewire/PrintCardsTable.php`
- `app/Livewire/PrintCardRevisionesTable.php`
- `resources/views/livewire/print-cards-table.blade.php`
- `resources/views/print-cards/index.blade.php`

---

## 🎯 Resumen

Este sistema te permite crear tablas completas y funcionales con:
- ✅ **Configuración declarativa** (solo arrays de columnas)
- ✅ **Búsquedas automáticas** en campos simples y relaciones
- ✅ **Ordenamiento inteligente** con indicadores visuales
- ✅ **Paginación dinámica** con selector de registros
- ✅ **Formateo flexible** de datos
- ✅ **Código reutilizable** y mantenible

¡Con este manual puedes crear nuevas tablas en pocos minutos! 🚀
