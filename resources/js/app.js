import './bootstrap';

// resources/js/app.js

require('./bootstrap');

window.toastr = require('toastr');

// You can customize toastr options here if needed
toastr.options = {
    "closeButton": true,
    "positionClass": "toast-top-right",
    "progressBar": true,
};