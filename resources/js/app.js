require('./bootstrap');
import 'bootstrap-switch-button/dist/css/bootstrap-switch-button.min.css';
import 'bootstrap-switch-button';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css"; // Importa el CSS de Flatpickr

// Inicializar Flatpickr en el campo de fecha
document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#expiration_date", {
        dateFormat: "Y-m-d", // Formato de fecha
        minDate: "today", // Fecha mínima seleccionable (hoy)
        allowInput: true, // Permite la entrada manual de fecha
    });
});