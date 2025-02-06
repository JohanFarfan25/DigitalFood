@extends('layouts.user_type.auth')

@section('content')
<div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <div class="container-fluid">
        <div class="page-header min-height-100 border-radius-xl mt-2" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n5">
            <div class="row gx-4">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mt-2">
                            Billing
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid py-2">
        <div class="card">
            <div class="card-body">
                <form id="payment-form" method="POST" action="{{ route('payment.pay') }}">
                    @csrf
                    <div class="row">
                        <!-- Información del pagador -->
                        <div class="col-md-6">
                            <h4>Datos del Pagador</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="dataPayer[name]" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="lastName" name="dataPayer[lastName]" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="dataPayer[email]" required>
                            </div>
                            <div class="mb-3">
                                <label for="documentType" class="form-label">Tipo de Documento</label>
                                <select class="form-control" id="documentType" name="dataPayer[documentType]" required>
                                    <option value="CC">Cédula</option>
                                    <option value="CE">Cédula Extranjera</option>
                                    <option value="NIT">NIT</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="PP">Pasaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="documentNumber" class="form-label">Número de Documento</label>
                                <input type="text" class="form-control" id="documentNumber" name="dataPayer[documentNumber]" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="dataPayer[phone]" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="address" name="dataPayer[address]" required>
                            </div>
                        </div>

                        <!-- Datos de la tarjeta -->
                        <div class="col-md-6">
                            <h4>Información de la Tarjeta</h4>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Número de Tarjeta</label>
                                <input type="text" class="form-control" id="cardNumber" name="card[number]" required>
                            </div>
                            <div class="mb-3">
                                <label for="expMonth" class="form-label">Mes de Expiración</label>
                                <input type="text" class="form-control" id="expMonth" name="card[exp_month]" required>
                            </div>
                            <div class="mb-3">
                                <label for="expYear" class="form-label">Año de Expiración</label>
                                <input type="text" class="form-control" id="expYear" name="card[exp_year]" required>
                            </div>
                            <div class="mb-3">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="text" class="form-control" id="cvc" name="card[cvc]" required>
                            </div>
                        </div>
                    </div>

                    <!-- Datos adicionales -->
                    <input type="hidden" name="transactionId" value="{{ $transactionId ?? '' }}">

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa fa-credit-card"></i> Pagar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection