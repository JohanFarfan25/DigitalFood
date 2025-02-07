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
                    <!-- Datos de la tarjeta -->
                    <div class="col-md-12" style="margin-left: 30px;">
                        <h4>Card Information</h4>
                        <!-- Tarjeta Dinámica -->
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div class="credit-card mb-4">
                                    <div class="card-front">
                                        <div class="card-logo" style="text-align: right;">
                                            <svg width="140" height="70" viewBox="0 0 250 100" xmlns="http://www.w3.org/2000/svg">
                                                <text x="10" y="40" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#0dcaf0">
                                                    Digital
                                                </text>
                                                <text x="110" y="40" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#d63384">
                                                    Food
                                                </text>
                                                <text x="10" y="70" font-family="Arial, sans-serif" font-size="16" fill="#555">
                                                    Optimize, control and grow
                                                </text>
                                                <circle cx="100" cy="30" r="5" fill="#596cff" />
                                                <rect x="102" y="25" width="6" height="10" fill="#596cff" />
                                                <circle cx="180" cy="30" r="15" fill="none" stroke="#00cc66" stroke-width="3" />
                                                <line x1="172" y1="22" x2="188" y2="38" stroke="#00cc66" stroke-width="3" />
                                                <line x1="188" y1="22" x2="172" y2="38" stroke="#00cc66" stroke-width="3" />
                                            </svg>
                                        </div>
                                        <div class="card-number" id="card-number-display">●●●● ●●●● ●●●● ●●●●</div>
                                        <div class="card-holder">
                                            <label>NAME AND SURNAME OF THE OWNER</label>
                                            <div id="card-holder-display">******</div>
                                        </div>
                                        <div class="card-expiry">
                                            <label>Expiration date</label>
                                            <div id="card-expiry-display">●●/●●</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="number" class="form-control" id="cardNumber" name="card[number]" placeholder="0000000000" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="expMonth" class="form-label">Expiration Month</label>
                                        <input type="text" class="form-control" id="expMonth" name="card[exp_month]" placeholder="00" required
                                            maxlength="2" pattern="\d{2}" oninput="this.value = this.value.replace(/\D/g, '')">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="expYear" class="form-label">Expiration Year</label>
                                        <input type="text" class="form-control" id="expYear" name="card[exp_year]" placeholder="0000" required
                                            maxlength="4" pattern="\d{4}" oninput="this.value = this.value.replace(/\D/g, '')">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="cvc" class="form-label">CVC</label>
                                    <input type="text" class="form-control" id="cvc" name="card[cvc]" placeholder="000" required
                                        maxlength="3" pattern="\d{3}" oninput="this.value = this.value.replace(/\D/g, '')">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Información del pagador -->
                    <div class="col-md-12 mt-4">
                        <h4>Payer Data</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="dataPayer[name]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="dataPayer[lastName]" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="documentType" class="form-label">Document Type</label>
                                <select class="form-control" id="documentType" name="dataPayer[documentType]" required>
                                    <option value="">Selected Document Type</option>
                                    <option value="CC">CC</option>
                                    <option value="NIT">NIT</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="documentNumber" class="form-label">Document Number</label>
                                <input type="text" class="form-control" id="documentNumber" name="dataPayer[documentNumber]" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="dataPayer[email]" required>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="dataPayer[phone]" required>
                            </div>
                        </div>

                    </div>


                    <!-- Datos adicionales -->
                    <input type="hidden" name="transactionId" value="{{ $transactionId ?? '' }}">
                    
                    <div class="text-center mt-4">
                        <img src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/pagos_procesados_por_epayco_260px.png" width="300" alt="">
                        <button type="submit" class="btn btn-success btn-lg" id="pay-transaction">
                            <i class="fa fa-credit-card"></i> Pay
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Processing Payment</h5>
                </div>
                <div class="modal-body">
                    Please wait while we process your transaction...
                </div>
                <div class="modal-footer">
                    <svg width="140" height="70" viewBox="0 0 250 100" xmlns="http://www.w3.org/2000/svg">
                        <text x="10" y="40" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#0dcaf0">
                            Digital
                        </text>
                        <text x="110" y="40" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#d63384">
                            Food
                        </text>
                        <text x="10" y="70" font-family="Arial, sans-serif" font-size="16" fill="#555">
                            Optimize, control and grow
                        </text>
                        <circle cx="100" cy="30" r="5" fill="#596cff" />
                        <rect x="102" y="25" width="6" height="10" fill="#596cff" />
                        <circle cx="180" cy="30" r="15" fill="none" stroke="#00cc66" stroke-width="3" />
                        <line x1="172" y1="22" x2="188" y2="38" stroke="#00cc66" stroke-width="3" />
                        <line x1="188" y1="22" x2="172" y2="38" stroke="#00cc66" stroke-width="3" />
                    </svg>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- JavaScript para la Tarjeta Dinámica -->
<script>
    //Credit Card
    document.addEventListener('DOMContentLoaded', function() {

        // Validar que todos los campos estén llenos
        const inputs = document.querySelectorAll("#name, #lastName, #documentType, #documentNumber, #email, #phone");
        const payButton = document.getElementById("pay-transaction");

        function validateInputs() {
            let allFilled = Array.from(inputs).every(input => input.value.trim() !== "");
            payButton.disabled = !allFilled;
        }

        inputs.forEach(input => {
            input.addEventListener("input", validateInputs);
        });

        // Asegurarse de que el botón comience deshabilitado
        validateInputs();


        const cardNumberInput = document.getElementById('cardNumber');
        const expMonthInput = document.getElementById('expMonth');
        const expYearInput = document.getElementById('expYear');
        const cvcInput = document.getElementById('cvc');

        const cardNumberDisplay = document.getElementById('card-number-display');
        const cardHolderDisplay = document.getElementById('card-holder-display');
        const cardExpiryDisplay = document.getElementById('card-expiry-display');

        // Actualizar número de tarjeta
        cardNumberInput.addEventListener('input', function() {
            let value = cardNumberInput.value.replace(/\s/g, ''); // Eliminar espacios
            value = value.replace(/(\d{4})/g, '$1 ').trim(); // Formatear en grupos de 4
            cardNumberDisplay.textContent = value || '●●●● ●●●● ●●●● ●●●●';
        });

        // Actualizar nombre del titular
        document.getElementById('name').addEventListener('input', function() {
            const name = document.getElementById('name').value;
            const lastName = document.getElementById('lastName').value;
            cardHolderDisplay.textContent = `${name} ${lastName}` || 'NOMBRE';
        });

        document.getElementById('lastName').addEventListener('input', function() {
            const name = document.getElementById('name').value;
            const lastName = document.getElementById('lastName').value;
            cardHolderDisplay.textContent = `${name} ${lastName}` || 'NOMBRE';
        });

        // Actualizar fecha de expiración
        expMonthInput.addEventListener('input', function() {
            const expMonth = expMonthInput.value;
            const expYear = expYearInput.value;
            cardExpiryDisplay.textContent = `${expMonth || '●●'}/${expYear || '●●'}`;
        });

        expYearInput.addEventListener('input', function() {
            const expMonth = expMonthInput.value;
            const expYear = expYearInput.value;
            cardExpiryDisplay.textContent = `${expMonth || '●●'}/${expYear || '●●'}`;
        });

        //Modal de pago
        const payTransactionBtn = document.getElementById("pay-transaction");
        const btnClose = document.getElementById("btn-close");

        payTransactionBtn.addEventListener("click", function(event) {
            const modal = new bootstrap.Modal(document.getElementById("paymentModal"));
            modal.show();
            payTransactionBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            btnClose.disabled = true;
            btnClose.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
        });

    });
</script>

@section('srtyles')
<!-- Estilos para la Tarjeta Dinámica -->
<style>
    .credit-card {
        background: linear-gradient(800deg, #ff0080, #ffff);
        color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    .card-front {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .card-logo {
        font-size: 18px;
        font-weight: bold;
    }

    .card-number {
        font-size: 24px;
        letter-spacing: 2px;
    }

    .card-holder,
    .card-expiry {
        font-size: 14px;
    }

    .card-holder label,
    .card-expiry label {
        font-size: 12px;
        opacity: 0.8;
    }
</style>