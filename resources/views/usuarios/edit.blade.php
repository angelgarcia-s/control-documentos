@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Roles de Usuario</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Editar Roles de {{ $user->name }}</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" disabled>
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" value="{{ $user->email }}" class="form-control" disabled>
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label class="form-label">Roles</label>
                            <select name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('roles') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('users.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
