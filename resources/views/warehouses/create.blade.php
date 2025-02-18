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
                            {{ __('Creación de Almacen') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/warehouse-create" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="warehouse-name" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('warehouse.name')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="warehouse-location" class="form-control-label">{{ __('Ubicación') }}</label>
                                <div class="@error('warehouse.location')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="location" name="location" id="location" aria-label="location" aria-describedby="location">
                                    @error('location')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="warehouse-max_capacity" class="form-control-label">{{ __('Capacidad Máxima') }}</label>
                                <div class="@error('warehouse.max_capacity')border border-danger rounded-3 @enderror">
                                    <input type="number" class="form-control" placeholder="max_capacity" name="max_capacity" id="max_capacity" aria-label="max_capacity" aria-describedby="max_capacity">
                                    @error('max_capacity')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="warehouse-temperature_controlled" class="form-control-label">{{ __('Temperatura controlada') }}</label>
                                <div class="@error('temperature_controlled') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para temperatura controlada -->
                                    <select
                                        name="temperature_controlled"
                                        id="temperature_controlled"
                                        class="form-control"
                                        aria-label="temperature_controlled"
                                        aria-describedby="temperature_controlled">
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('temperature_controlled')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
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
@endsection