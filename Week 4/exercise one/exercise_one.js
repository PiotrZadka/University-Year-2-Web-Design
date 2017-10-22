$(document).ready(function(){
  $("#outermenu").load("menu.html",function(){
    
    $("#news").click(function(){
      $("#content").load("news.html");
    });
    $("#aboutus").click(function(){
      $("#content").load("aboutus.html")
    });
    $("#contactus").click(function(){
      $("#content").load("contactus.html")
    });
  });

});
