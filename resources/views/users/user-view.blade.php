@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid">
        <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ !empty($user->profile_picture) ? asset( $user->profile_picture) : '../assets/img/team-2.jpg' }}" alt="Profile Picture" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            User Information
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                          {{ $user->getRoleNames()->first()}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-5">
                <form action="/user-view/{{$user->id}}" method="POST" role="form text-left" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Contenedor para la vista previa -->
                            <div class="form-group text-center">
                                <div id="image-preview" class="border p-2 rounded d-inline-block" style="width: 200px; height: 200px; overflow: hidden;">
                                    @if(!empty($user->profile_picture))
                                    <img id="preview-image" src="{{ asset( $user->profile_picture) }}" alt="Preview" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                                    @else
                                    <img id="preview-image" src="" alt="Preview" class="img-fluid" style="display: none; max-width: 100%; max-height: 100%;">
                                    @endif
                                </div>
                            </div>
                            <!-- Input para cargar imagen -->
                            <div class="form-group">
                                <label for="profile_picture" class="form-control-label">{{ __('Upload Image') }}</label>
                                <div class="@error('profile_picture') border border-danger rounded-3 @enderror">
                                    <input type="file" id="profile_picture" class="form-control" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                                    @error('profile_picture')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Otros campos de formulario -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about">{{ 'About Me' }}</label>
                                <div class="@error('about_me') border border-danger rounded-3 @enderror">
                                    <textarea class="form-control" id="about" rows="3" placeholder="Say something about yourself" name="about_me" style="min-height: 260px;">{{ old('about_me', $user->about_me) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                <div class="@error('name') border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('name', $user->name) }}" type="text" placeholder="Name" id="user-name" name="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('email') border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('email', $user->email) }}" type="email" placeholder="@example.com" id="user-email" name="email">
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
                                <label for="user-phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('phone') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="000-000-0000" id="user-phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-location" class="form-control-label">{{ __('Address') }}</label>
                                <div class="@error('location') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Location" id="user-location" name="location" value="{{ old('location', $user->location) }}">
                                </div>
                            </div>
                        </div>
                        <!-- @role('Super Admin') -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roles" class="form-control-label">{{ __('Roles') }}</label>
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
                                @error('roles')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                                <small class="text-muted">{{ __('Hold Ctrl/Command to select multiple options.') }}</small>
                            </div>
                        </div>
                        <!-- @endrole -->
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ __('Save Changes') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const preview = document.getElementById('preview-image');
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection