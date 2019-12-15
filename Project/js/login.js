"use strict";

function login() {
  let user = document.getElementById("username_input");
  let pass = document.getElementById("password_input");
  let form = document.getElementById("login_form");
  let error_all = document.getElementById("error_all");


  let request1 = new XMLHttpRequest();
  request1.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText == "Valid") {
        form.submit();
      } else {
        error_all.innerHTML = "Invalid credentials";
      }
    } else {
      return false;
    }
  };
  request1.open("GET", "../templates/validate_login.php?username=" + user.value + "&password=" + pass.value, true);
  request1.send();
}
