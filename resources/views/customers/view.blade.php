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
                            {{ __('Customer View') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-6 mt-4">
                <form action="/customer-update/{{$customer->id}}" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-name" class="form-control-label">{{ __('Name') }}</label>
                                <div class="@error('customer.name')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name', $customer->name) }}">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-contact" class="form-control-label">{{ __('Contact') }}</label>
                                <div class="@error('customer.contact')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="Contact" name="contact" id="contact" aria-label="contact" aria-describedby="contact" value="{{ old('contact', $customer->contact) }}">
                                    @error('contact')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-address" class="form-control-label">{{ __('Address') }}</label>
                                <div class="@error('customer.address')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="address" name="address" id="address" aria-label="address" aria-describedby="address" value="{{ old('address', $customer->address) }}">
                                    @error('address')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('customer.phone')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="phone" name="phone" id="phone" aria-label="phone" aria-describedby="phone" value="{{ old('phone', $customer->phone) }}">
                                    @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('customer.email')border border-danger rounded-3 @enderror">
                                    <input type="text" class="form-control" placeholder="email" name="email" id="email" aria-label="email" aria-describedby="email" value="{{ old('email', $customer->email) }}">
                                    @error('email')
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