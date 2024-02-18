$(document).ready(function(){
    animate_home();
});



function animate_home()
{
    $("#cover-head-bar").fadeIn(1000,function(){
        $("#cover-navbar").slideDown(500);
    });
    $("#home-text").fadeIn(1200);
}

setInterval(()=>{
    DisplayCurrentTime();
});

function DisplayCurrentTime() 
{
    var date = new Date();
    var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
    var am_pm = date.getHours() >= 12 ? "PM" : "AM";
    hours = hours < 10 ? "0" + hours : hours;
    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
    time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
    var lblTime = document.getElementById("time");
    lblTime.innerHTML = time;
}


