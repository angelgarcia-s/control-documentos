@props([
    'columns' => [],
    'route' => '',
    'paginated' => null,
])

@section('styles')
    <link rel="stylesheet" href="{{ asset('build/assets/libs/tabulator-tables/css/tabulator.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
@endsection

<div class="overflow-auto table-bordered">
    <div class="ti-custom-table ti-striped-table ti-custom-table-hover">
        <table class="w-full bg-white table-auto whitespace-nowrap">
            <thead>
                <tr>
                    <th class="py-3 px-6 text-left">Acciones</th>
                    @foreach ($columns as $column)
                        <th class="py-3 px-6 text-left">
                            {{ $column['label'] }}
                            @if (isset($column['sortable']) && $column['sortable'])
                                <a href="{{ route($route, array_merge(request()->query(), ['sort' => $column['name'], 'direction' => request('sort') === $column['name'] && request('direction') === 'asc' ? 'desc' : 'asc'])) }}"
                                   class="text-gray-300 hover:text-gray-700 ml-2" title="Ordenar por {{ $column['label'] }}">
                                    <i class="ti {{ request('sort') === $column['name'] && request('direction') === 'desc' ? 'ti-sort-descending' : 'ti-sort-ascending' }} text-sm"></i>
                                </a>
                            @endif
                        </th>
                    @endforeach
                </tr>
                <tr>
                    <th class="py-2 px-6"></th>
                    @foreach ($columns as $index => $column)
                        <th class="py-2 px-6">
                            @if (isset($column['searchable']) && $column['searchable'])
                                <div class="relative">
                                    <input type="text" class="ti-form-input w-full pr-8" placeholder="Buscar {{ $column['label'] }}"
                                           name="search[{{ $column['name'] }}]" value="{{ request('search.' . $column['name']) }}"
                                           onchange="this.form.submit()">
                                    @if (request('search.' . $column['name']))
                                        <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-300 hover:text-gray-700"
                                                onclick="event.preventDefault(); this.previousElementSibling.value = ''; window.location.href = '{{ route($route) }}';">
                                            <i class="ti ti-x text-sm"></i>
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>

    <div class="m-4 tabulator-footer flex items-center justify-end">
        {{ $paginated->links('vendor.pagination.tailwind') }}
    </div>
</div>

<!-- Modal para confirmar borrado -->
<div id="delete-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Confirmar eliminación</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-6">¿Estás seguro de que quieres borrar este producto?</p>
        <form id="delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-2">
                <button type="button" id="cancel-delete" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500">Cancelar</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">Confirmar</button>
            </div>
        </form>
    </div>
</div>

<!-- Script para manejar el formulario y el modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            // Eliminar campos vacíos antes de enviar
            const inputs = form.querySelectorAll('input[name^="search["]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.removeAttribute('name'); // Quita el atributo name para no enviarlo
                }
            });
        });

        document.querySelectorAll('.action-select').forEach(select => {
            select.addEventListener('change', function() {
                const action = this.value;
                const productoId = this.getAttribute('data-producto-id');

                if (action === 'editar') {
                    window.location.href = `/productos/${productoId}/edit`;
                } else if (action === 'borrar') {
                    const modal = document.getElementById('delete-modal');
                    const form = document.getElementById('delete-form');
                    form.action = `/productos/${productoId}`;
                    modal.classList.remove('hidden');
                } else if (action === 'print') {
                    window.location.href = `/productos/${productoId}/print-cards`;
                } else if (action === 'codigos') {
                    window.location.href = `/productos/${productoId}/codigos`;
                }

                this.value = '';
            });
        });

        document.getElementById('cancel-delete').addEventListener('click', function() {
            document.getElementById('delete-modal').classList.add('hidden');
        });
    });
</script>