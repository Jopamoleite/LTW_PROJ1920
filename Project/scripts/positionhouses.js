window.onresize = function(){
    let searchBarBottom = Number(document.getElementById("search_bar").style.top) + document.getElementById("search_bar").clientHeight + 30;
    console.log(searchBarBottom);
    if(searchBarBottom < 100) searchBarBottom = 100;
    document.getElementById("houses_list").style.marginTop = searchBarBottom + "px";
    console.log(document.getElementById("houses_list").style.marginTop);
}