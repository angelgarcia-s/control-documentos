@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex mb-4">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Revisiones de PrintCards</h3>
    </div>
    <x-breadcrumbs />
</div>
<livewire:print-card-revisiones-table />
@endsection
