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
                            {{ __('Crear Cliente') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/customer-create" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-name" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('customer.name')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="document_type">Tipo de Documento</label>
                                <select name="document_type" id="document_type" class="form-control" required>
                                    <option value="">Seleccione tipo de documento</option>
                                    <option value="CC">CC</option>
                                    <option value="NIT">NIT</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-document_number" class="form-control-label">{{ __('Numero de documento') }}</label>
                                <div class="@error('customer.document_number')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="document_number" name="document_number" id="document_number" aria-label="document_number" aria-describedby="document_number">
                                    @error('document_number')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-address" class="form-control-label">{{ __('Dirección') }}</label>
                                <div class="@error('customer.address')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="address" name="address" id="address" aria-label="address" aria-describedby="address">
                                    @error('address')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-phone" class="form-control-label">{{ __('Télefono') }}</label>
                                <div class="@error('customer.phone')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="phone" name="phone" id="phone" aria-label="phone" aria-describedby="phone">
                                    @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-email" class="form-control-label">{{ __('Correo') }}</label>
                                <div class="@error('customer.email')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="email" name="email" id="email" aria-label="email" aria-describedby="email">
                                    @error('email')
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
@endsection