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
                <form id="checkout-form">
                    @csrf

                    <!-- Selección de productos/lotes -->
                    <div class="card-body px-0 pt-0 pb-2 mt-3">
                        <div class="table-responsive p-1">
                            <h6>Products Selected</h6>
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Batch
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product/Batch
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Quantity
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Unit Price
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Subtotal
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="items-table">
                                    <!-- Aquí se agregarán dinámicamente los productos/lotes seleccionados -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <br>

                    <!-- Campos de la transacción -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Transaction Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Transaction Type</option>
                                    <option value="purchase">Buys</option>
                                    <option value="sale">Sale</option>
                                    <option value="adjustment">Adjustment</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="warehouse_id">Warehouse</label>
                                <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                                    <option value="">Select a warehouse</option>
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option value="">Select a supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    <option value="">Select a Customer</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_product">Product Type</label>
                                <select name="type_product" id="type_product" class="form-control" required onchange="updateProductSelect()">
                                    <option value="">Select Product Type</option>
                                    <option value="batch">Batch</option>
                                    <option value="unit">Unit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_id">Batch / Product</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <!-- Aquí se cargarán dinámicamente los lotes o productos -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="items" id="items-data">
                    <div style="margin-bottom: 2rem; margin-top: 2rem;">
                        <button type="button" class="btn btn-primary" onclick="addItem()">Add Product / Batch</button>
                    </div>

                    <!-- Total y botón de pago -->
                    <div class="row mt-3">
                        <div class="col-md-12 text-end">
                            <h5>Total: <span id="total-amount">$0.00</span></h5>
                            <button id="save" class="btn btn-success">Generate Purchase Order</button>
                            <!-- <button type="button" class="btn btn-primary" onclick="processPayment()">Pagar con Epayco</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        @endsection
        @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const saveButton = document.getElementById("save");
                const orderType = document.getElementById("type"); // Asegúrate de que este sea el ID del select

                function updateButtonText() {
                    switch (orderType.value) {
                        case "purchase":
                            saveButton.textContent = "Generate Purchase Order";
                            break;
                        case "sale":
                            saveButton.textContent = "Generate Sale Order";
                            break;
                        case "adjustment":
                            saveButton.textContent = "Generate Adjustment Order";
                            break;
                        default:
                            saveButton.textContent = "Generate Purchase Order"; // Valor por defecto
                    }
                }

                // Evento para detectar cambios en la selección
                orderType.addEventListener("change", updateButtonText);

                // Llamar la función al cargar para establecer el valor inicial
                updateButtonText();
            });

            // Datos de lotes y productos (puedes pasarlos desde el controlador)
            const batches = @json($batches);
            const products = @json($products);

            // Función para actualizar el select de productos/lotes
            function updateProductSelect() {

                const productType = document.getElementById('type_product').value;
                const productSelect = document.getElementById('product_id');
                productSelect.innerHTML = ''; // Limpiar el select

                if (productType === 'batch') {
                    // Cargar lotes
                    batches.forEach(batch => {
                        const option = document.createElement('option');
                        option.value = batch.id;
                        option.textContent = `${batch.product.name}, Total Quantity: ${batch.total_quantity}`;
                        option.setAttribute('data-price', batch.product.sale_price);
                        productSelect.appendChild(option);
                    });
                } else if (productType === 'unit') {
                    // Cargar productos
                    products.forEach(product => {
                        const option = document.createElement('option');
                        option.value = product.id;
                        option.textContent = product.name;
                        option.setAttribute('data-price', product.sale_price);
                        productSelect.appendChild(option);
                    });
                }
            }

            // Llamar a la función al cargar la página para establecer el valor inicial
            document.addEventListener('DOMContentLoaded', updateProductSelect);


            let items = []; // Almacena los productos/lotes seleccionados

            // Función para agregar un producto/lote
            function addItem() {

                const productSelect = document.getElementById('product_id');
                const selectedProduct = productSelect.options[productSelect.selectedIndex];
                const productType = document.getElementById('type_product').value;

                if (!selectedProduct.value) {
                    alert("Seleccione un lote/producto válido.");
                    return;
                }

                if (items?.length > 0) {
                    items.map((item) => {
                        if (item.productType != productType) {
                            alert("Solo puede agregar un solo tipo de producto Lotes o Productos.");
                            selectedProduct = '';
                            return;
                        } else if (item.productId == productSelect.value) {
                            alert("Este producto / lote ya fue agregado.");
                            selectedProduct = '';
                            return;

                        }
                    });
                }

                const productId = selectedProduct.value;
                const productName = selectedProduct.text;
                const price = parseFloat(selectedProduct.getAttribute('data-price')) || 0;
                const quantity = 1;

                const item = {
                    productType,
                    productId,
                    productName,
                    quantity,
                    price,
                    total: quantity * price
                };

                if (selectedProduct) {
                    items.push(item);
                }
                renderItemsTable();
                toggleSaveButton();
            }

            // Función para renderizar la tabla de productos/lotes
            function renderItemsTable() {
                const table = document.getElementById('items-table');
                table.innerHTML = '';
                let total = 0;

                items.forEach((item, index) => {
                    item.subtotal = item.quantity * item.price;
                    total += item.subtotal;

                    table.innerHTML += `
            <tr>
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">${item.productId}</p>
                </td>
                <td class="text-left">
                    <p class="text-xs font-weight-bold mb-0"><b>${item.productName}</b></p>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0"><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)" class="form-control"></p>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">$${item.price.toFixed(2)}</p>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">$${item.subtotal.toFixed(2)}</p>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm mb-2" onclick="removeItem(${index})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
                });

                document.getElementById('total-amount').textContent = `$${total.toFixed(2)}`;
            }

            // Función para actualizar la cantidad de un producto/lote
            function updateQuantity(index, quantity) {
                items[index].quantity = parseInt(quantity) || 1;
                renderItemsTable();
                toggleSaveButton();
            }

            // Función para eliminar un producto/lote
            function removeItem(index) {
                items.splice(index, 1);
                renderItemsTable();
                toggleSaveButton();
            }

            // Función para habilitar o deshabilitar el botón "Generate Purchase Order"
            function toggleSaveButton() {
                const saveButton = document.getElementById('save');
                if (items.length > 0) {
                    saveButton.disabled = false;
                    saveButton.classList.remove('btn-secondary'); // Elimina la clase gris
                    saveButton.classList.add('btn-success'); // Vuelve a agregar el color original
                } else {
                    saveButton.disabled = true;
                    saveButton.classList.remove('btn-success'); // Elimina la clase original
                    saveButton.classList.add('btn-secondary'); // Agrega la clase gris
                }
            }

            // Función para enviar los datos al backend

            $(document).ready(function() {
                toggleSaveButton();
                $(document).on("click", "#save", function(e) {
                    e.preventDefault(); // Evitar el envío normal del formulario

                    if (items.length === 0) {
                        alert("Debe agregar al menos un producto/lote.");
                        return;
                    }
                    let totalttc = 0;
                    items.forEach((item, index) => {
                        item.subtotal = item.quantity * item.price;
                        totalttc += item.subtotal;
                    });

                    const formData = new FormData(document.getElementById("checkout-form"));
                    formData.append("items", JSON.stringify(items));

                    fetch('/billing-store', {
                            method: "POST",
                            body: JSON.stringify({
                                items: items,
                                type: formData.get("type"),
                                date: formData.get("date"),
                                warehouse_id: formData.get("warehouse_id"),
                                supplier_id: formData.get("supplier_id"),
                                customer_id: formData.get("customer_id"),
                                price: totalttc,
                                quantity: items.length ?? 0,
                            }),
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            window.location.href = "/transactions";
                        })
                        .catch(error => console.error("Error:", error));
                });
            });



            // Función para procesar el pago con Epayco
            function processPayment() {
                const total = parseFloat(document.getElementById('total-amount').textContent.replace('$', ''));
                if (total <= 0) {
                    alert('Agregue productos/lotes para continuar.');
                    return;
                }

                // Integración con Epayco
                const handler = ePayco.checkout.configure({
                    key: 'TU_CLAVE_PÚBLICA_DE_EPAYCO',
                    test: true // Cambiar a false en producción
                });

                const paymentData = {
                    name: 'Compra en Digital Food',
                    description: 'Pago de productos/lotes',
                    invoice: 'INV-' + Date.now(),
                    currency: 'cop',
                    amount: total,
                    tax_base: '0',
                    tax: '0',
                    country: 'co',
                    lang: 'es',
                    external: 'false',
                    confirmation: 'https://tudominio.com/confirmacion',
                    response: 'https://tudominio.com/respuesta',
                };

                handler.open(paymentData);
            }
        </script>