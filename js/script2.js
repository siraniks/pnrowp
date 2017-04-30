$(document).ready(function() {

});

function openNav() {
//    document.getElementById("mySidenav").style.width = "250px";
//    document.body.style.backgroundColor = "rgba(0,0,0,0.8)";
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementsByClassName("sidenav-overlay").style.backgroundColor = "rgba(0,0,0,0.8)";
}

function closeNav() {
//    document.getElementById("mySidenav").style.width = "0";
//    document.body.style.backgroundColor = "white";
    document.getElementById("mySidenav").style.width = "0";
    document.getElementsByClassName("sidenav-overlay").style.backgroundColor = "rgba(0,0,0,0)";
}