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
  req1.open(
    "GET",
    "../templates/booking_check.php?in=" +
      check_in.value +
      "&house=" +
      house.value,
    true
  );
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
  req2.open(
    "GET",
    "../templates/booking_check.php?out=" +
      check_out.value +
      "&house=" +
      house.value,
    true
  );
  req2.send();
}

function check_dates() {
  if (
    !guests.checkValidity() ||
    !check_in.checkValidity() ||
    !check_out.checkValidity()
  ) {
    error.innerHTML = "Fill with valid information";
    return;
  }

  if (req3 != null) req3.abort();

  req3 = new XMLHttpRequest();
  req3.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText == "Valid") {
        form.submit();
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
  req3.open(
    "GET",
    "../templates/booking_check.php?in=" +
      check_in.value +
      "&out=" +
      check_out.value +
      "&guests=" +
      guests.value +
      "&house=" +
      house.value,
    true
  );
  req3.send();
}
