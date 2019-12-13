function handleResultsResize(){
    let searchBarBottom = Number(document.getElementById("search_bar").style.top) + document.getElementById("search_bar").clientHeight + 30;
    if(searchBarBottom < 100) searchBarBottom = 100;
    document.getElementById("houses_list").style.marginTop = searchBarBottom + "px";
}

window.addEventListener("resize", handleResultsResize);