$(document).ready(function() {

/* Loop through each element of current document */
/* index - current value of element */
$("td").each(function(index){
  /* this - refering to this element that is being used */
  var bgColor = $(this).css("background-color");
  $(this).text(bgColor);
})

/* aligning to center */
$("td").css("text-align","center");

});
