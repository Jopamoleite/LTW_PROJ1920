"use strict";

let current_user_request = null;
let current_mail_request = null;
let current_user = document.getElementById("username").value;
let current_mail = document.getElementById("email").value;

function validate_username() {
  let user = document.getElementById("username");
  let error_user = document.getElementById("error_username");
  let regex = /[\w]+/;

  if(user.value == current_user){
    error_user.innerHTML = "";
    user.setCustomValidity("");
    return;
  }

  if (user.value.length < 4) {
    error_user.innerHTML = "Must be 4+ characters long";
    user.setCustomValidity("Invalid field.");
  } else if (user.value.length > 20) {
    error_user.innerHTML = "Must be less than 20 characters long";
    user.setCustomValidity("Invalid field.");
  } else if (!regex.test(user.value)) {
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
    current_user_request.open("GET", "../templates/register_check.php?type=user&value=" + user.value, true);
    current_user_request.send();
  }
}

function validate_name() {
  let name = document.getElementById("name");
  let error_name = document.getElementById("error_name");
  let regex = /^[a-zA-Z\s]+$/;

  if (name.value.length > 35) {
    error_name.innerHTML = "Must be less than 35 characters long";
    name.setCustomValidity("Invalid field.");
  } else if (!regex.test(name.value)) {
    error_name.innerHTML = "Must not contain special characters";
    name.setCustomValidity("Invalid field.");
  } else {
    error_name.innerHTML = "Valid";
    name.setCustomValidity("");
  }
}

function validate_location() {
  let location = document.getElementById("location");
  let error_location = document.getElementById("error_location");
  let regex = /^[,a-zA-Z\s]+$/;

  if (location.value.length > 35) {
    error_location.innerHTML = "Must be less than 35 characters long";
    location.setCustomValidity("Invalid field.");
  } else if (!regex.test(location.value)) {
    error_location.innerHTML = "Must not contain special characters";
    location.setCustomValidity("Invalid field.");
  } else {
    error_location.innerHTML = "Valid";
    location.setCustomValidity("");
  }
}

function validate_phone() {
  let phone = document.getElementById("phone");
  let error_phone = document.getElementById("error_phone");
  let regex = /\+[0-9]{3}[ -][0-9]{3}[ -][0-9]{3}[ -][0-9]{3}/;

  if (phone.value.length > 16) {
    error_phone.innerHTML = "Use the format +XXX XXX XXX XXX";
    phone.setCustomValidity("Invalid field.");
  } else if (!regex.test(phone.value)) {
    error_phone.innerHTML = "Use the format +XXX XXX XXX XXX";
    phone.setCustomValidity("Invalid field.");
  } else {
    error_phone.innerHTML = "Valid";
    phone.setCustomValidity("");
  }
}

function validate_email() {
  let email = document.getElementById("email");
  let error_email = document.getElementById("error_email");
  let regex = /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\.){1,126})+(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))]))$/i;

  if(email.value == current_mail){
    error_email.innerHTML = "";
    email.setCustomValidity("");
    return;
  }

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
    current_mail_request.open("GET", "../templates/register_check.php?type=email&value=" + email.value, true);
    current_mail_request.send();
  }
}

function validate_bio() {
  let bio = document.getElementById("bio");
  let error_bio = document.getElementById("error_bio");

  if (bio.value.length > 100) {
    error_bio.innerHTML = "Must be less than 100 characters long";
    bio.setCustomValidity("Invalid field.");
  } else {
    error_bio.innerHTML = "Valid";
    bio.setCustomValidity("");
  }
}

function validate_form() {
  let error_array = [];
  error_array.push(document.getElementById("error_username"));
  error_array.push(document.getElementById("error_name"));
  error_array.push(document.getElementById("error_location"));
  error_array.push(document.getElementById("error_phone"));
  error_array.push(document.getElementById("error_email"));
  error_array.push(document.getElementById("error_bio"));

  let form = document.getElementById("form");
  let error_all = document.getElementById("error_all");

  /* Check if any field invalid */
  error_all.innerHTML = "";
  for(const error of error_array){
    if(error != "Valid" && error != ""){
      error_all.innerHTML = "Fill valid information";
      return;
    }
  }

  /* If all fields valid */
  form.submit();

}
