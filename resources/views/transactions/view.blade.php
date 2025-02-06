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
                        <hr>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex align-items-center text-danger text-dark text-sm">
                                @php
                                // Definir la variable antes del switch
                                $colorTheme = "#82d616"; // Valor por defecto
                                @endphp

                                @switch ($transaction->transaction_status)
                                @case('pending')
                                @php $colorTheme = "#ff8d72"; @endphp
                                @break
                                @case('authorized')
                                @php $colorTheme = "#82d616"; @endphp
                                @break
                                @case('failed')
                                @php $colorTheme = "#ea0606"; @endphp
                                @break
                                @case('cancelled')
                                @php $colorTheme = "#fd7e14"; @endphp
                                @break
                                @case('expired')
                                @php $colorTheme = "#D63381"; @endphp
                                @break
                                @default
                                @php $colorTheme = "#82d616"; @endphp
                                @endswitch

                                <div class="text-dark p-3">
                                    <b>Status:</b>
                                </div>
                                <div class="ms-sm-2" style="color: {{ $colorTheme }};">
                                    <b>{{ $transaction->transaction_status }}</b>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-dark text-sm ">
                                <div class="text-dark p-3  text-sm">
                                    <b>Total:</b>
                                </div>
                                <div class="d-flex align-items-center ms-sm-2 text-success text-sm">
                                    <b>${{$transaction->price}}</b>
                                </div>
                            </div>
                        </li>
                        @if($transaction->transaction_status == 'pending')
                        <a href="/payment-process/{{ $transaction->id }}" class="mx-3 mt-2" data-bs-toggle="tooltip" data-bs-original-title="Pay">
                            <span class="badge badge-sm bg-gradient-success">Pay transaction</span>
                        </a>
                        @endif
                    </ul>
                    <hr>
                    @if(isset($paymentmethod))
                    <div class="list-group mb-4">
                        <span class="mb-2 text-xs text-dark"><b>Payment Method</b>
                            <span class="text-dark ms-sm-2">
                                <p style="line-height: 1.1; font-size: 13px; margin-top:1.5rem;">Franchise: {{$paymentmethod->account_type}}</p>
                                <p style="line-height: 0.0; font-size: 13px;">Account Number: {{$paymentmethod->account_number}}</p>
                                <p style="line-height: 0.0; font-size: 13px; margin-top:1.5rem;">Expiration Date: {{$paymentmethod->expiration_date}}</p>
                                <p style="line-height: 0.0; font-size: 13px; margin-top:1.5rem;">Invoice: {{$transaction->fact}}</p>
                            </span>
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">( {{count($items)}} ) - Items</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @foreach ($items as $item)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg justify-content-between">
                            <div class="d-flex flex-column w-50">
                                @if(isset($item->batch->id) && !is_null($item->batch->id))
                                <span class="mb-2 text-xs text-dark"><b>Batch Nº:</b> {{$item->batch->id}}
                                    <span class="text-dark ms-sm-2">
                                        <p style="line-height: 0.0; font-size: 13px; margin-top:1.5rem;">Product Name: {{$item->batch->product->name}}</p>
                                        <p style="line-height: 1.1; font-size: 13px;">Total Quantity: {{$item->batch->total_quantity}}</p>
                                        <p style="line-height: 0.0; font-size: 13px;">Location: {{$item->batch->location}}</p>
                                    </span>
                                </span>
                                @else
                                <span class="mb-2 text-xs text-dark"><b>Product Name: </b>{{$item->product->name}}
                                    <span class="text-dark ms-sm-2">
                                        <p style="line-height: 0.0; font-size: 13px; margin-top:1.5rem; ">Price V/U: {{$item->product->sale_price}}</p>
                                        <p style="line-height: 1.1; font-size: 13px; ">Quantity: {{$item->quantity}}</p>
                                        <p style="line-height: 0.0; font-size: 13px;">Location: {{$transaction->warehouse->name}}</p>
                                    </span>
                                </span>
                                @endif
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