"use strict";

function check_form() {
  let name = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let repeat = document.getElementById("repeat").value;
  let error_all = document.getElementById("error_all");

  if (name == "" || password == "" || email == "" || repeat == "") {
    error_all.innerHTML = "Fill all fields";
  } else {
    let error_username = document.getElementById("error_username");
    let error_email = document.getElementById("error_email");
    let error_password = document.getElementById("error_password");
    let error_repeat = document.getElementById("error_repeat");

    if (error_username.innerHTML != "Valid" || error_email.innerHTML != "Valid" || error_password.innerHTML != "Valid" || error_repeat.innerHTML != "Valid"
    ) {
      error_all.innerHTML = "Fill with valid information";
    } else {
      document.getElementById("register").submit();
    }
  }
}

function validate_user() {
  let user = document.getElementById("username");
  let error_user = document.getElementById("error_username");

  if (!user.checkValidity()) {
    error_user.innerHTML = "Not valid user";
  } else {
    error_user.innerHTML = "Valid";
  }
}

function validate_email() {
  let email = document.getElementById("email");
  let error_email = document.getElementById("error_email");

  if (!email.checkValidity()) {
    error_email.innerHTML = "Not valid e-mail";
  } else {
    error_email.innerHTML = "Valid";
  }
}

function validate_password() {
  let password = document.getElementById("password");
  let error_password = document.getElementById("error_password");

  if (password.value.length < 8) {
    error_password.innerHTML = "Must be 8+ characters long";
  } else {
    error_password.innerHTML = "Valid";
  }
}

function validate_repeat() {
  let password = document.getElementById("password");
  let repeat = document.getElementById("repeat");
  let error_repeat = document.getElementById("error_repeat");

  if (repeat.value != password.value) {
    error_repeat.innerHTML = "Passwords must be the same";
  } else {
    error_repeat.innerHTML = "Valid";
  }
}
