"use strict";

function check_form() {
  let name      = document.getElementById("username").value;
  let email     = document.getElementById("email").value;
  let password  = document.getElementById("password").value;
  let repeat    = document.getElementById("repeat").value;
  let error_all = document.getElementById("error_all");

  if (name == "" || password == "" || email == "" || repeat == "") {
    error_all.innerHTML = "Fill all fields";
  } else {
    let error_username  = document.getElementById("error_username");
    let error_email     = document.getElementById("error_email");
    let error_password  = document.getElementById("error_password");
    let error_repeat    = document.getElementById("error_repeat");

    if (error_username.innerHTML != "Valid" || error_email.innerHTML != "Valid" || error_password.innerHTML != "Valid" || error_repeat.innerHTML != "Valid") {
      error_all.innerHTML = "Fill with valid information";
    } else {
      document.getElementById("register").submit();
    }
  }
}

function validate(field, query) {
  let error_field = 'error_' + field;
  let xmlhttp;
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
      document.getElementById(error_field).innerHTML = "Validating..";
    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(error_field).innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "templates/user/process_register.php?field=" + field + "&query=" + query, false);
  xmlhttp.send();
}

function validate_password(){
  let password = document.getElementById("password").value;
  let error_password = document.getElementById("error_password");

  if(length(password) < 8){
    error_password.innerHTML = 'Must be 8+ characters long';
  }else{
    error_password.innerHTML = 'Valid';
  }
}

function validate_repeat(){
    let password  = document.getElementById("password").value;
    let repeat  = document.getElementById("repeat").value;
    let error_repeat = document.getElementById("error_repeat");

    if(repeat == password){
      error_repeat.innerHTML = 'Passwords must be the same';
    }else{
      error_repeat.innerHTML = 'Valid';
    }
  }
