// We haven't met this yet, but don't panic!
// jQuery code in this function will run once the document has correctly loaded
// This ensures we don't run into problems calling elements that have not yet been created
// as some of you encountered last week in the Christmas Countdown websites
$(document).ready(function() {
	// Add your jQuery here
    $(".shopping")
    .append("<li> 7 x Apples </li>")
      .append("<ul id='applelist'></ul>")
    .append("<li>2x Bannanas</li>")
    .append("<li>3x Cox</li>")
    .append("<li>10x Carrots</li>")
    .append("<li>4x Dates</li>")
      .append("<ul id='egglist'></ul>");

    $("#applelist")
    .append("<li>2x Cox</li>")
    .append("<li>5x Gala</li>");

    $("#egglist")
    .append("<li>Medium</li>")
    .append("<li>Free-Range</li>");
});
