@extends('layouts.user_type.auth')

@section('content')

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
                            {{ __('Crear Usuario') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/user-create" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Contenedor para la vista previa -->
                            <div class="form-group text-center">
                                <div id="image-preview" class="border p-2 rounded d-inline-block" style="width: 200px; height: 200px; overflow: hidden;">
                                    <img id="preview-image" src="" alt="Preview" class="img-fluid" style="display: none; max-width: 100%; max-height: 100%;">
                                </div>
                            </div>
                            <!-- Input para cargar imagen -->
                            <div class="form-group">
                                <label for="profile_picture" class="form-control-label">{{ __('Cargar Imagen') }}</label>
                                <div class="@error('user.profile_picture') border border-danger rounded-3 @enderror">
                                    <input type="file" id="profile_picture" class="form-control" name="profile_picture" accept="image/*">
                                    @error('profile_picture')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about">{{ 'Description' }}</label>
                                <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                    <textarea class="form-control" id="about" rows="3" placeholder="Say something about yourself" name="about_me" style="min-height: 260px;"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Correo') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon">
                                    @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('Teléfono') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="000-000-0000" id="number" name="phone">
                                    @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">{{ __('Dirección') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Location" id="name" name="location">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.rol_id" class="form-control-label">{{ __('Rol') }}</label>
                                <div class="@error('user.rol_id')border border-danger rounded-3 @enderror">
                                    <select
                                        class="form-control"
                                        name="roles[]"
                                        id="roles"
                                        multiple
                                        data-mdb-select-init
                                        aria-label="roles">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ (isset($user) && $user->hasAnyRole($role->id)) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('rol_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.password" class="form-control-label">{{ __('Contraseña') }}</label>
                                <div class="@error('user.password')border border-danger rounded-3 @enderror">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                                    @error('password')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
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