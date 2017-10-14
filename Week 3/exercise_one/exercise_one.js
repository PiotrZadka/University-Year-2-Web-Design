// We understand what this code from last week means now!
// $(document) is a selector which selects the root of the DOM
// ready is a type of event - it occurs once the element is 'ready'
// (i.e. the browser has created it and it is displayed)

// This code ensures that our jQuery only runs once the browser has created
// and rendered the page

// This ensures that any elements we want to select exist
$(document).ready(function() {
	// Add your jQuery here
  $("div#news").hide();
  $("div#aboutus").hide();
  $("div#contactus").hide();
  $(".menu").hide();

  $("#outermenu").mouseenter(function(){
    $(".menu").slideDown();
  })
  .mouseleave(function(){
    $(".menu").slideUp();
  });

  $("li#news").click(function(){
    $("div#news").toggle();
  });

  $("li#aboutus").click(function(){
    $("div#aboutus").toggle();
  });

  $("li#contactus").click(function(){
    $("div#contactus").toggle();
  });


});
