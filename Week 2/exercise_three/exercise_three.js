$(document).ready(function() {

/* Adds border to a "table"*/
$("table").css("border","1px solid black");
/* Each table row that is even add class */
$("tr:even").addClass("evenRow");
/* Each table row that is odd add class */
$("tr:odd").addClass("oddRow");

/* Each table cell (table data) that is odd and is within evenRow class add class */
$("td:odd",".evenRow").addClass("b")
/* Each table cell (table data) that is even and is within oddRow class add class */
$("td:even",".oddRow").addClass("b")

/* ALL table cells with class .b set these parameters*/
$("td.b")
.css("width","50px")
.css("height","50px")
.css("background-color","black");

});
