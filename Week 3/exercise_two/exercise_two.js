
$(document).ready(function(){
  /* select all divs in document */
  $('div').each(function(){
    /*On click do something*/
    $(this).click(function(){
      /*this - means current selected elements (div)*/
      $(this)
        .animate({
          'width': '100%'
        }, 1000, function(){
          var bgColor = $(this).css("background-color");
          $('body').css('background-color',bgColor);
          /* .event().event() chain*/
        }).animate({
          'width': '16%'
        }, 1000);
    });
  });
});
