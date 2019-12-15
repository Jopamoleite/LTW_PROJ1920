let previousScrollPos;

function handleSearchBarScroll() {
  let currentScrollPos = window.pageYOffset;
  if (currentScrollPos < 20){
    document.getElementById("search_bar").style.top = "70px";
  }
  else if (previousScrollPos > currentScrollPos) {
    document.getElementById("search_bar").style.top = "20px";
  } else {
    document.getElementById("search_bar").style.top = "-214px";
  }
  previousScrollPos = currentScrollPos;
}

window.addEventListener("scroll", handleSearchBarScroll);
