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
                            {{ __('Transaction Create') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/transaction-create" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="transactions-batch_id" class="form-control-label">{{ __('Batch') }}</label>
                                <div class="@error('transactions.batch_id') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para proveedores -->
                                    <select
                                        name="batch_id"
                                        id="batch_id"
                                        class="form-control"
                                        aria-label="batch_id"
                                        aria-describedby="batch_id">
                                        <option value="">Seleccione un lote</option>
                                        @foreach ($batches as $batch)
                                        <option
                                            value="{{ $batch->id }}">
                                            {{ 'Product: '.$batch->product->name . ' - Production Date: ' . $batch->production_date. ' - Expiration Date: ' . $batch->expiration_date . ' - Total Quantity: ' . $batch->total_quantity. ' - Location: ' . $batch->location }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('batch_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-type" class="form-control-label">{{ __('Type') }}</label>
                                <div class="@error('transactions.type') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para temperatura controlada -->
                                    <select
                                        name="type"
                                        id="type"
                                        class="form-control"
                                        aria-label="type"
                                        aria-describedby="type">
                                        <option value="">Seleccione una opción</option>
                                        <option value="purchase">Purchase</option>
                                        <option value="sale">Sale</option>
                                        <option value="adjustment">Adjustment</option>
                                    </select>
                                    @error('type')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-date" class="form-control-label">{{ __('Date') }}</label>
                                <div class="@error('transactions.date') border border-danger rounded-3 @enderror">
                                    <!-- Campo de fecha con Flatpickr -->
                                    <input
                                        type="date"
                                        class="form-control"
                                        placeholder="Seleccione la fecha de expiración"
                                        name="date"
                                        id="date"
                                        aria-label="date"
                                        aria-describedby="date">
                                    @error('date')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-quantity" class="form-control-label">{{ __('Quantity') }}</label>
                                <div class="@error('transactions.quantity')border border-danger rounded-3 @enderror">
                                    <input type="number" class="form-control" placeholder="quantity" name="quantity" id="quantity" aria-label="quantity" aria-describedby="quantity">
                                    @error('quantity')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-price" class="form-control-label">{{ __('Price') }}</label>
                                <div class="@error('transactions.price')border border-danger rounded-3 @enderror">
                                    <input type="number" class="form-control" placeholder="price" name="price" id="price" aria-label="price" aria-describedby="price">
                                    @error('price')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-warehouse_id" class="form-control-label">{{ __('Warehouse') }}</label>
                                <div class="@error('warehouse_id') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para proveedores -->
                                    <select
                                        name="warehouse_id"
                                        id="warehouse_id"
                                        class="form-control"
                                        aria-label="warehouse_id"
                                        aria-describedby="warehouse_id">
                                        <option value="">Seleccione un Warehouse</option>
                                        @foreach ($warehouses as $warehouse)
                                        <option
                                            value="{{ $warehouse->id }}">
                                            {{ $warehouse->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('warehouse_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-supplier_id" class="form-control-label">{{ __('Supplier') }}</label>
                                <div class="@error('supplier_id') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para proveedores -->
                                    <select
                                        name="supplier_id"
                                        id="supplier_id"
                                        class="form-control"
                                        aria-label="supplier_id"
                                        aria-describedby="supplier_id">
                                        <option value="">Seleccione un Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                        <option
                                            value="{{ $supplier->id }}">
                                            {{ $supplier->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="transactions-customer_id" class="form-control-label">{{ __('Customer') }}</label>
                                <div class="@error('customer_id') border border-danger rounded-3 @enderror">
                                    <!-- Select dropdown para proveedores -->
                                    <select
                                        name="customer_id"
                                        id="customer_id"
                                        class="form-control"
                                        aria-label="customer_id"
                                        aria-describedby="customer_id">
                                        <option value="">Seleccione un customer</option>
                                        @foreach ($customers as $customer)
                                        <option
                                            value="{{ $customer->id }}">
                                            {{ $customer->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
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