"use strict";

function login(){
  let user = document.getElementById('username_input');
  let pass = document.getElementById('password_input');
  let form = document.getElementById('login_form');

  let request1 = new XMLHttpRequest();
  request1.onreadystatechange = function(){
    if (this.readyState === 4 && this.status === 200) {
      if(this.responseText == "Valid"){
        form.submit();
      }
    } else {
      return false;
    }
  };
  request1.open('GET', 'templates/user/validate_login.php?username=' + user.value + '&password=' + pass.value, true);
  request1.send();

}
