"use strict";

let current_user_request = null;
let current_mail_request = null;

function check_form() {
  let user = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let repeat = document.getElementById("repeat").value;
  let error_all = document.getElementById("error_all");

  if (user == "" || password == "" || email == "" || repeat == "") {
    error_all.innerHTML = "Fill all fields";
  } else {
    let error_username = document.getElementById("error_username");
    let error_email = document.getElementById("error_email");
    let error_password = document.getElementById("error_password");
    let error_repeat = document.getElementById("error_repeat");

    if (
      error_username.innerHTML != "Valid" ||
      error_email.innerHTML != "Valid" ||
      error_password.innerHTML != "Valid" ||
      error_repeat.innerHTML != "Valid"
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
  let regex = /[\W]+/;

  if (user.value.length < 4) {
    error_user.innerHTML = "Must be 4+ characters long";
    user.setCustomValidity("Invalid field.");
  } else if (user.value.length > 20) {
    error_user.innerHTML = "Must be less than 20 characters long";
    user.setCustomValidity("Invalid field.");
  } else if (regex.test(user.value)) {
    error_user.innerHTML = "Must not contain special characters";
    user.setCustomValidity("Invalid field.");
  } else {
    if (current_user_request != null) {
      current_user_request.abort();
    }

    current_user_request = new XMLHttpRequest();
    current_user_request.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        let user = document.getElementById("username");
        let error_user = document.getElementById("error_username");
        error_user.innerHTML = this.responseText;
        if (this.responseText == "Valid") {
          user.setCustomValidity("");
        } else {
          user.setCustomValidity("Invalid field.");
        }
      }
    };
    current_user_request.open(
      "GET",
      "../templates/register_check.php?type=user&value=" + user.value,
      true
    );
    current_user_request.send();
  }
}

function validate_email() {
  let email = document.getElementById("email");
  let error_email = document.getElementById("error_email");
  let regex = /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\.){1,126})+(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))]))$/i;

  if(email.value.length > 35){
    error_email.innerHTML = "Must be less than 35 characters long";
    email.setCustomValidity("Invalid field.");
  } else if (!regex.test(email.value)) {
    error_email.innerHTML = "Not valid e-mail";
    email.setCustomValidity("Invalid field.");
  } else {
    if (current_mail_request != null) {
      current_mail_request.abort();
    }

    current_mail_request = new XMLHttpRequest();
    current_mail_request.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        let email = document.getElementById("email");
        let error_email = document.getElementById("error_email");
        error_email.innerHTML = this.responseText;
        if (this.responseText == "Valid") {
          email.setCustomValidity("");
        } else {
          email.setCustomValidity("Invalid field.");
        }
      }
    };
    current_mail_request.open(
      "GET",
      "../templates/register_check.php?type=email&value=" + email.value,
      true
    );
    current_mail_request.send();
  }
}

function validate_password() {
  let password = document.getElementById("password");
  let error_password = document.getElementById("error_password");

  if (password.value.length < 8) {
    error_password.innerHTML = "Must be 8+ characters long";
    password.setCustomValidity("Invalid field.");
  } else {
    error_password.innerHTML = "Valid";
    password.setCustomValidity("");
  }
}

function validate_repeat() {
  let password = document.getElementById("password");
  let repeat = document.getElementById("repeat");
  let error_repeat = document.getElementById("error_repeat");

  if (repeat.value != password.value) {
    error_repeat.innerHTML = "Passwords must be the same";
    repeat.setCustomValidity("Invalid field.");
  } else {
    error_repeat.innerHTML = "Valid";
    repeat.setCustomValidity("");
  }
}
