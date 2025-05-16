@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            Productos de la Familia: {{ $familia->nombre }}
        </h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Productos</div>
                <div>
                    <a href="{{ route('familias.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Volver a Familias</a>
                </div>
            </div>
            <div class="box-body">
                @livewire('familia-productos-table', ['familia_id' => $familia->id])
            </div>
        </div>
    </div>
</div>
@endsection
