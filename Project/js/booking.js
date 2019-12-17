"use strict";

let form      = document.getElementById('booking_form');
let error     = document.getElementById('error_all');
let check_in  = document.getElementById('checkin');
let check_out = document.getElementById('checkout');
let guests    = document.getElementById('guests');
let house     = document.getElementById('houseID');
let req1 = null;
let req2 = null;
let req3 = null;

function checkin(){
  if(req1 != null)  req1.abort();

  req1 = new XMLHttpRequest();
  req1.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      if(this.responseText == "Valid"){
        check_in.setCustomValidity("");
      } else {
        check_in.setCustomValidity("Invalid field.");
      }
    }
  };
  req1.open("POST", "../templates/action_booking.php", true);
  req1.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  req1.send("checkin="  + check_in.value + "&checkout=" + check_out.value + "&guests="   + guests.value + "&houseID="  + house.value);
}

function checkout(){
  if(req2 != null)  req2.abort();

  req2 = new XMLHttpRequest();
  req2.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      if(this.responseText == "Valid"){
        check_out.setCustomValidity("");
      } else {
        check_out.setCustomValidity("Invalid field.");
      }
    }
  };
  req2.open("POST", "../templates/action_booking.php", true);
  req2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  req2.send("checkin="  + check_in.value + "&checkout=" + check_out.value + "&guests="   + guests.value + "&houseID="  + house.value);
}

function check_dates(){
  if(req3 != null)  req3.abort();

  req3 = new XMLHttpRequest();
  req3.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      if(this.responseText == "Valid"){
        form.submit();
      } else {
        error.innerHTML = this.responseText;
      }
    }
  };
  req3.open("POST", "../templates/action_booking.php", true);
  req3.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  req3.send("checkin="  + check_in.value + "&checkout=" + check_out.value + "&guests="   + guests.value + "&houseID="  + house.value);
}
