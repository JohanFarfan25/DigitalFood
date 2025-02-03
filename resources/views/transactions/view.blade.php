@extends('layouts.user_type.auth')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<div class="container-fluid">
    <div class="page-header min-height-100 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n5">
        <div class="row gx-4">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mt-2">
                        Order {{$transaction->type}} information Nº {{$transaction->id}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Billing Information</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2"></i>
                            <small style="font-weight: 600;">{{$transaction->date->format('d/m/Y')}}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-credit-card"></i> <!-- Ícono de tarjeta de crédito -->
                                </button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Type</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                {{$transaction->type}}
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-barcode"></i> <!-- Ícono de código de barras -->
                                </button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Number</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                {{$transaction->id}}
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-cogs"></i> <!-- Ícono de cantidad -->
                                </button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Quantity</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                {{$transaction->quantity}}
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-warehouse"></i> <!-- Ícono de almacén -->
                                </button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Warehouse</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                {{$transaction->warehouse->name}}
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-truck"></i> <!-- Ícono de camión -->
                                </button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Supplier</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                {{$transaction->supplier->name}}
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-user"></i> <!-- Ícono de usuario -->
                                </button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Customer</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                {{$transaction->customer->name}}
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <br>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                <div class="text-dark p-3">
                                    <b>Total:</b>
                                </div>
                                <div class="ms-sm-2 text-success">
                                    <b>${{$transaction->price}}</b>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Items</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @foreach ($items as $item)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg justify-content-between">
                            <div class="d-flex flex-column w-50">
                                <span class="mb-2 text-xs text-dark"><b>Batch:</b>
                                    <span class="text-dark ms-sm-2"><br>
                                        {{'id: '.$item->batch->id.', Total Quantity: '.$item->batch->total_quantity.' ,location: '.$item->batch->location}}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs text-dark"><b>Product:</b>
                                    <span class="text-dark ms-sm-2">{{$item->batch->product->name}}</span>
                                </span>
                                <span class="mb-2 text-xs text-dark"><b>Quantity:</b>
                                    <span class="text-dark ms-sm-2">{{$item->quantity}}</span>
                                </span>
                            </div>
                            <div class="d-flex flex-column w-50">
                                <span class="mb-2 text-m text-dark"><b>Price:</b>
                                    <span class="ms-sm-2 text-success"><b>${{$item->price}}</b></span>
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection