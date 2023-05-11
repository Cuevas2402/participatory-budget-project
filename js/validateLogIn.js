function validateEmail() {
    var email = document.getElementById("email").value;
    var emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    var invalidText = document.getElementById("invalid-feedback-email");
    if (emailRegex.test(email)) {
    } else if(email.length === 0){
        invalidText.innerHTML = "Ingrese correo electronico";
    } else {
        invalidText.innerHTML = "Correo invalido";
    }
}

function validateEmail2() {
    var email = document.getElementById("email").value;
    var invalidText = document.getElementById("invalid-feedback-email");
    if (email.length === 0) {
        invalidText.innerHTML = "Ingrese correo electronico";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var emailInput = document.getElementById("email");
    emailInput.addEventListener("input", validateEmail); 
});

function evaluatePassword2() {
    var password = document.getElementById("password").value;
    var invalidText = document.getElementById("invalid-feedback-password");
    if (password.length === 0) {
        invalidText.innerHTML = "Ingrese contraseña";
    }
}

document.addEventListener("DOMContentLoaded", function() {
  var passwordInput = document.getElementById("password");
  passwordInput.addEventListener('input', evaluatePassword2);
});

function showPassword(){
    var passwordInput = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("show-password");
    showPasswordCheckbox.addEventListener("change", function() {
        if (showPasswordCheckbox.checked) {
            passwordInput.setAttribute("type", "text");
          } else {
            passwordInput.setAttribute("type", "password");
          }
    });
    
}