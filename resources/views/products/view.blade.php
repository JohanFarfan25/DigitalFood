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
                            {{ __('Product View') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/product-update/{{$product->id}}" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-name" class="form-control-label">{{ __('Name') }}</label>
                                <div class="@error('product.name')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name', $product->name) }}">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-description" class="form-control-label">{{ __('Description') }}</label>
                                <div class="@error('product.description')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="description" name="description" id="description" aria-label="description" aria-describedby="description" value="{{ old('description', $product->description) }}">
                                    @error('description')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-category" class="form-control-label">{{ __('Category') }}</label>
                                <div class="@error('product.category')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="category" name="category" id="category" aria-label="category" aria-describedby="category" value="{{ old('category', $product->category) }}">
                                    @error('category')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-unit_of_measure" class="form-control-label">{{ __('Unit Of Measure') }}</label>
                                <div class="@error('product.unit_of_measure')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="unit_of_measure" name="unit_of_measure" id="unit_of_measure" aria-label="unit_of_measure" aria-describedby="unit_of_measure" value="{{ old('unit_of_measure', $product->unit_of_measure) }}">
                                    @error('unit_of_measure')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-expiration_date" class="form-control-label">{{ __('Expiration Date') }}</label>
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
                                        value="{{ old('expiration_date', $product->expiration_date ? $product->expiration_date->format('Y-m-d') : '') }}"
                                        min="{{ now()->format('Y-m-d') }}">
                                    @error('expiration_date')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-sale_price" class="form-control-label">{{ __('Purchase Price') }}</label>
                                <div class="@error('product.sale_price')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="purchase_price" name="purchase_price" id="purchase_price" aria-label="purchase_price" aria-describedby="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}">
                                    @error('purchase_price')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-sale_price" class="form-control-label">{{ __('Sale Price') }}</label>
                                <div class="@error('product.sale_price')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="sale_price" name="sale_price" id="sale_price" aria-label="sale_price" aria-describedby="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                                    @error('sale_price')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-supplier_id" class="form-control-label">{{ __('Supplier') }}</label>
                                <div class="@error('supplier_id') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para proveedores -->
                                    <select
                                        name="supplier_id"
                                        id="supplier_id"
                                        class="form-control"
                                        aria-label="supplier_id"
                                        aria-describedby="supplier_id">
                                        <option value="">Seleccione un proveedor</option> <!-- Opción por defecto -->
                                        @foreach ($suppliers as $supplier)
                                        <option
                                            value="{{ $supplier->id }}"
                                            {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }} <!-- Muestra el nombre del proveedor -->
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
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