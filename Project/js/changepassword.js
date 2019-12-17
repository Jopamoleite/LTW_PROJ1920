"use strict";

function validate_old() {
  let old = document.getElementById("old");

  if(old.value.length < 8){
    error_new.innerHTML = "Must be 8+ characters long";
    old.setCustomValidity("Invalid field.");
  } else {
    error_old.innerHTML = "";
    old.setCustomValidity("");
  }
}

function validate_new() {
  let new_ = document.getElementById("new");
  let error_new = document.getElementById("error_new");

  if (new_.value.length < 8) {
    error_new.innerHTML = "Must be 8+ characters long";
    new_.setCustomValidity("Invalid field.");
  } else {
    error_new.innerHTML = "Valid";
    new_.setCustomValidity("");
  }
}

function validate_cnf() {
  let new_ = document.getElementById("new");
  let cnf = document.getElementById("cnf");
  let error_cnf = document.getElementById("error_cnf");

  if (cnf.value != new_.value) {
    error_cnf.innerHTML = "Passwords must be the same";
    cnf.setCustomValidity("Invalid field.");
  } else {
    error_cnf.innerHTML = "Valid";
    cnf.setCustomValidity("");
  }
}

function validate_form() {
  let req = new XMLHttpRequest();
  req.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      let old = document.getElementById("old");
      let error_old = document.getElementById("error_old");
      error_old.innerHTML = this.responseText;
      if (this.responseText == "Valid") {
        old.setCustomValidity("");
        validate_form_();
      } else {
        old.setCustomValidity("Invalid field.");
        return;
      }
    }
  };
  req.open("GET", "../templates/register_check.php?type=pass&value=" + old.value, true);
  req.send();
}

function validate_form_(){
  let error_array = [];
  error_array.push(document.getElementById("error_old"));
  error_array.push(document.getElementById("error_new"));
  error_array.push(document.getElementById("error_cnf"));

  let form = document.getElementById("form");
  let error_all = document.getElementById("error_all");

  /* Check if any field invalid */
  error_all.innerHTML = "";
  for(const error of error_array){
    if(error != "Valid" && error != "" ) {
      error_all.innerHTML = "Fill valid information";
      return;
    }
  }

  /* If all fields valid */
  form.submit();
}
