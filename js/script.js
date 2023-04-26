/*//Almacenar el primer elemento con la clase ".menu"
const menu = document.querySelector('.menu');
const menuBtn = document.querySelector('.menu-btn');

//Modificar clase de la variable menuBtn por medio de una arrow function al hacer click sobre el elemento
menuBtn.addEventListener('click', () => {
    menu.classList.toggle('menu-open');
});*/

(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()