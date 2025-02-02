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
                            {{ __('Transaction View') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Batch') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->batch->product->name ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Type') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->type ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Date') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->date->format('d/m/Y')  ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Quantity') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->quantity ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Price') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->price ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Warehouse') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->warehouse->name ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Supplier') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->supplier->name ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Customer') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->customer->name ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Creation Date') }}</label>
                            <input type="text" class="form-control" value="{{ $transaction->created_at->format('d/m/Y') ?? '' }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection