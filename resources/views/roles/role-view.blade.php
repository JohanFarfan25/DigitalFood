@extends('layouts.user_type.auth')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>


<div>
    <div class="container-fluid">
        <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n5">
            <div class="row gx-4">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mt-2">
                            {{ __('Vista de Rol') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/role-update/{{$role->id}}" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role-name" class="form-control-label">{{ __('Rol') }}</label>
                                <div class="@error('role.name')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" value="{{ old('name', $role->name) }}" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permissions" class="form-control-label">{{ __('Permisos') }}</label>
                                <select
                                    class="form-control"
                                    name="permissions[]"
                                    id="permissions"
                                    multiple
                                    data-mdb-select-init
                                    aria-label="Permissions">
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}"
                                        {{ (isset($role) && $role->permissions->contains($permission->id)) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                                <small class="text-muted">{{ __('Hold Ctrl/Command to select multiple options.') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ 'Guardar' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#permissions').select2({
            placeholder: "Select permissions",
            allowClear: true
        });
    });
    document.getElementById('profile_picture').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewImage = document.getElementById('preview-image');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Establecer la URL de la imagen
                previewImage.style.display = 'block'; // Mostrar la imagen
            };
            reader.readAsDataURL(file); // Leer el archivo seleccionado
        } else {
            previewImage.src = '';
            previewImage.style.display = 'none'; // Ocultar la imagen si no hay archivo seleccionado
        }
    });
</script>

@endsection