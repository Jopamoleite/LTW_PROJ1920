let previousScrollPos = window.pageYOffset;
window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  if (currentScrollPos < 20){
    document.getElementById("search_bar").style.top = "70px";
  }
  else if (previousScrollPos > currentScrollPos) {
    document.getElementById("search_bar").style.top = "20px";
  } else {
    document.getElementById("search_bar").style.top = "-210px";
  }
  previousScrollPos = currentScrollPos;
} 