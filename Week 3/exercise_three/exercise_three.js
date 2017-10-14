$(document).ready(function(){
  $("body").append("<p>");
  $("body").keypress(function(event){
    if(event.keyCode == 13){
      /*Removes keyCode default name and set it to blank "" */
      $(this).val("");
      $("p:last").after("<p></p>");
    }
    else{
      $("p:last").append(event.key);
    }
  });
});
