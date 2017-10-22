$(document).ready(function(){

$.get("exercise_two.xml",function(data){
  $(data).find("player").each(function(){
    var className = $(this).attr("class");
    var avatar = $(this).attr("avatar");
    var id = $(this).find("id").text();
    var name = $(this).find("name").text();
    var score = $(this).find("score").text();
    var email = $(this).find("email").text();

    $("#players").append("<tr id='player"+id+"'></tr>");
    $("tr#player"+id).append("<td>" + id + "</td>");
    $("tr#player"+id).append("<td>" + className + "</td>");
    $("tr#player"+id).append("<td>" + name + "</td>");
    $("tr#player"+id).append("<td>" + score + "</td>");
    $("tr#player"+id).append("<td>" + email + "</td>");
    $("tr#player"+id).append("<td><img src ='"+avatar+"'></img></td>");

  });
});


});
