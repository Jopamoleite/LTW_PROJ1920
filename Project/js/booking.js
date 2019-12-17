"use strict";

let form = document.getElementById("booking_form");
let error = document.getElementById("error_all");
let check_in = document.getElementById("checkin");
let check_out = document.getElementById("checkout");
let guests = document.getElementById("guests");
let house = document.getElementById("houseID");
let req1 = null;
let req2 = null;
let req3 = null;

function valid_in() {
  if (req1 != null) req1.abort();

  req1 = new XMLHttpRequest();
  req1.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText == "Valid") {
        check_in.setCustomValidity("");
      } else {
        check_in.setCustomValidity("Invalid field.");
      }
    }
  };
  req1.open("GET", "../templates/booking_check.php?in=" + check_in.value + "&house=" + house.value, true);
  req1.send();
}

function valid_out() {
  if (req2 != null) req2.abort();

  req2 = new XMLHttpRequest();
  req2.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText == "Valid") {
        check_out.setCustomValidity("");
      } else {
        check_out.setCustomValidity("Invalid field.");
      }
    }
  };
  req2.open("GET", "../templates/booking_check.php?out=" + check_out.value + "&house=" + house.value, true);
  req2.send();
}

function check_dates() {
  if (!guests.value || !check_in.value || !check_out.value) {
    error.innerHTML = "Fill all inputs";
    return;
  }

  if(check_in.value > check_out.value){
    error.innerHTML = "Dates are switched";
    return;
  }

  let today = new Date();
  let check_in_date = new Date(check_in.value);
  let check_out_date = new Date(check_out.value);

  if(check_in_date.getTime() < today.getTime()){
    error.innerHTML = "Check-in too early";
    return;
  }

  if(check_out_date.getTime() < today.getTime()){
    error.innerHTML = "Check-out too early";
    return;
  }

  if (!guests.checkValidity() || !check_in.checkValidity() || !check_out.checkValidity()) {
    error.innerHTML = "Fill with valid information";
    return;
  }

  if (req3 != null) req3.abort();

  req3 = new XMLHttpRequest();
  req3.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText == "Valid") {
        confirmation();
      } else if (this.responseText == "Guests over capacity") {
        error.innerHTML = this.responseText;
        guests.setCustomValidity("Invalid field.");
      } else {
        error.innerHTML = this.responseText;
        check_in.setCustomValidity("Invalid field.");
        check_out.setCustomValidity("Invalid field.");
      }
    }
  };
  req3.open("GET", "../templates/booking_check.php?in=" + check_in.value + "&out=" + check_out.value + "&guests=" + guests.value + "&house=" + house.value, true);
  req3.send();
}

function confirmation() {
  let overlay = document.getElementById("overlay");
  let overlayb = document.getElementById("overlay_black");
  let confirm_in = document.getElementById("confirm_in");
  let confirm_out = document.getElementById("confirm_out");
  let confirm_guest = document.getElementById("confirm_guest");
  let confirm_price = document.getElementById("confirm_price");

  if (req3 != null) req3.abort();
  req3 = new XMLHttpRequest();
  req3.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      let price = parseFloat(this.responseText);
      if (!isNaN(price)) {
        let in_ = new Date(check_in.value);
        let out = new Date(check_out.value);
        let price_final = ((out.getTime() - in_.getTime()) / (1000 * 3600 * 24)) * price;

        confirm_in.innerHTML = in_;
        confirm_out.innerHTML = out;
        confirm_guest.innerHTML = parseInt(guests.value);
        confirm_price.innerHTML = price_final + "€";

      } else {
        error.innerHTML = this.responseText;
        check_in.setCustomValidity("Invalid field.");
        check_out.setCustomValidity("Invalid field.");
      }
    }
  };
  req3.open("GET", "../templates/booking_check.php?price=1&house=" + house.value, true);
  req3.send();

  overlayb.style.display = 'block';
  overlay.style.display = 'block';
}

function confirmed() {
  let overlay = document.getElementById("overlay");
  let overlayb = document.getElementById("overlay_black");
  overlayb.style.display = 'none';
  overlay.style.display = 'none';
  form.submit();
}
