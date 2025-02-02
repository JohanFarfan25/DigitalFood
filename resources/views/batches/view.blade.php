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
                            {{ __('Batches View') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/batch-update/{{$batch->id}}" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch-product_id" class="form-control-label">{{ __('Product') }}</label>
                                <div class="@error('product_id') border border-danger rounded-3 @enderror">
                                    <select
                                        name="product_id"
                                        id="product_id"
                                        class="form-control"
                                        aria-label="product_id"
                                        aria-describedby="product_id">
                                        <option value="">Seleccione un producto</option> <!-- Opción por defecto -->
                                        @foreach ($products as $product)
                                        <option
                                            value="{{ $product->id }}"
                                            {{ old('product_id', $batch->product_id) == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch-production_date" class="form-control-label">{{ __('Production Date') }}</label>
                                <div class="@error('production_date') border border-danger rounded-3 @enderror">
                                    <!-- Campo de fecha con Flatpickr -->
                                    <input
                                        type="date"
                                        class="form-control"
                                        placeholder="Seleccione la fecha de expiración"
                                        name="production_date"
                                        id="production_date"
                                        aria-label="production_date"
                                        aria-describedby="production_date"
                                        value="{{ old('production_date', $batch->production_date ? $batch->production_date->format('Y-m-d') : '') }}"
                                        min="{{ now()->format('Y-m-d') }}">
                                    @error('production_date')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch-expiration_date" class="form-control-label">{{ __('Expiration Date') }}</label>
                                <div class="@error('expiration_date') border border-danger rounded-3 @enderror">
                                    <!-- Campo de fecha con Flatpickr -->
                                    <input
                                        type="date"
                                        class="form-control"
                                        placeholder="Seleccione la fecha de expiración"
                                        name="expiration_date"
                                        id="expiration_date"
                                        aria-label="expiration_date"
                                        aria-describedby="expiration_date"
                                        value="{{ old('expiration_date', $batch->expiration_date ? $batch->expiration_date->format('Y-m-d') : '') }}"
                                        min="{{ now()->format('Y-m-d') }}">
                                    @error('expiration_date')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch-total_quantity" class="form-control-label">{{ __('Total Quantity') }}</label>
                                <div class="@error('batch.total_quantity')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="total_quantity" name="total_quantity" id="total_quantity" aria-label="total_quantity" aria-describedby="total_quantity" value="{{ old('total_quantity', $batch->total_quantity) }}">
                                    @error('total_quantity')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch-location" class="form-control-label">{{ __('Location') }}</label>
                                <div class="@error('batch.location')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="location" name="location" id="location" aria-label="location" aria-describedby="location" value="{{ old('location', $batch->location) }}">
                                    @error('location')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection