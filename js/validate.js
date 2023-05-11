function validateEmail() {
    var email = document.getElementById("email").value;
    var emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    var validText = document.getElementById("valid-feedback-email");
    var invalidText = document.getElementById("invalid-feedback-email");
    if (emailRegex.test(email)) {
        validText.innerHTML = "Todo bien";
    } else if(email.length === 0){
        invalidText.innerHTML = "Campo Obligatorio";
    } else {
        invalidText.innerHTML = "Correo invalido";
    }
}

function validateEmail2() {
    var email = document.getElementById("email").value;
    var invalidText = document.getElementById("invalid-feedback-email");
    if (email.length === 0) {
        invalidText.innerHTML = "Campo Obligatorio";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var emailInput = document.getElementById("email");
    emailInput.addEventListener("input", validateEmail); 
});

function validateTel() {
    var telcelPorTi = document.getElementById("telefono").value;
    var pattern = /^[0-9]{10}$/;
    var validText = document.getElementById("valid-feedback-tel");
    var invalidText = document.getElementById("invalid-feedback-tel");
    if(pattern.test(telcelPorTi)) {
        validText.innerHTML = "Todo bien";
    } else if(telcelPorTi.length === 0){
        invalidText.innerHTML = "Campo Obligatorio";
    } else {
        invalidText.innerHTML = "Numero invalido";
    }
}

function validateTel2() {
    var tel = document.getElementById("telefono").value;
    var invalidText = document.getElementById("invalid-feedback-tel");
    if (tel.length === 0) {
        invalidText.innerHTML = "Campo Obligatorio";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var telInput = document.getElementById("telefono");
    telInput.addEventListener("input", validateTel); 
});


function evaluatePassword() {
  var validText = "";
  var invalidText = "";
  const passwordInput = document.getElementById('password');
  const strengthMeter = document.getElementById('strengthMeter');
  const password = passwordInput.value;
  validText = document.getElementById("valid-feedback-password");
  invalidText = document.getElementById("invalid-feedback-password");
  let score = 0;
  if (password.length >= 10) {
    score += 1;
  }

  if (/[A-Z]/.test(password)) {
    score += 1;
  }

  if (/[a-z]/.test(password)) {
    score += 1;
  }

  if (/\d/.test(password)) {
    score += 1;
  }

  if (/[\W_]/.test(password)) {
    score += 1;
  }

  if (score === 0){
    strengthMeter.style.width = '0%';
    invalidText.innerHTML = "Campo Obligatorio";
  } else if (score > 0 && score <= 2){
    strengthMeter.style.width = '10%';
    strengthMeter.style.background = '#f00';
    validText.innerHTML = "Contraseña debil";

  } else if (score >= 3 && score <= 4){
    strengthMeter.style.width = '66.66%';
    strengthMeter.style.background = '#ff8c00';
    validText.innerHTML = "Contraseña Mediana";
  } else {
    strengthMeter.style.width = '100%';
    strengthMeter.style.background = '#00a135';
    validText.innerHTML = "Todo bien";
  }
}

function evaluatePassword2() {
    var password = document.getElementById("password").value;
    var invalidText = document.getElementById("invalid-feedback-password");
    if (password.length === 0) {
        invalidText.innerHTML = "Campo Obligatorio";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var passwordInput = document.getElementById("password");
    passwordInput.style.width = '0%';
    passwordInput.addEventListener('input', evaluatePassword);
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