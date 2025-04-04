import './bootstrap';

import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();


// Codigo JavaScript Front


document.addEventListener('DOMContentLoaded',function (){
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        if(passwordInput.type === 'password'){ //Validamos si el input cumplira su labor es decir ser un Input de tipo password
            passwordInput.type = 'text'; // Convertimos Input a texto
            eyeIcon.src = eyeIcon.getAttribute('data-eye'); // Capturamos la imagen que nombramos en el boton
        }else {
            passwordInput.type = 'password'; // Cambia el input a password
            eyeIcon.src = eyeIcon.getAttribute('data-eye-crossed'); // Capturamos la imagen que nombramos en el boton
        }
    });

    passwordInput.focus();

});


