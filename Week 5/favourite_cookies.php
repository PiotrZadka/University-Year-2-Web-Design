<?php

// Things to notice:
// All visitors can see their own favourite number
// That number is stored between visits (in a cookie on their computer)
// You can view the cookie that gets stored on your own machine through the browser options
// If someone else uses your computer to open the page, they will see your favourite number
// This code includes a way to clear the cookie

// should we show the form input?:
$show_input_box = false;
// should we show a favourite number?:
$show_number = false;
// should we show a reset option?:
$show_reset = false;
// variable to hold the user's favourite number:
$number = -99;

if (isset($_GET["clear"]))
{
	// user just clicked to reset, so destroy the cookie:
	// set the expiry date to a month in the past to be sure!:
    setcookie("favourite", "", time() - 2592000);

	// show input box so they can set a new favourite number:
	$show_input_box = true;
}
elseif (isset($_GET["favourite"]))
{
	// user just submitted a new favourite number, so store it in a cookie
	// named "favourite", that expires in 30 days from now:
	setcookie("favourite", $_GET["favourite"], time() + 60 * 60 * 24 * 30);

	// show them their favourite number:
	$show_number = true;
	$number = $_GET["favourite"];
}
elseif (isset($_COOKIE["favourite"]))
{
	// a "favourite" cookie has been returned from the user's machine

	// show them their favourite number:
	$show_number = true;
	$number = $_COOKIE["favourite"];
	// show reset:
	$show_reset = true;
}
else
{
	// user has arrived at the page for the first time, ask them to tell us their favourite number:

	// show input box:
	$show_input_box = true;
}

// start off the html for this page:
echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href="favourite_cookies.php">myfavouritenumber.com</a>
<a href="fav_table.php">Multiply Table</a>
<a href="last_visit.php">Last Visit</a>
<a href="complicated.php">Bouncing Ball</a>
<br><br>
_END;

if ($show_input_box)
{
// show the form that allows input of the new number:
echo <<<_END
<form action="favourite_cookies.php">
  Let us know your favourite number:<br>
  <input type="text" name="favourite">
  <br><br>
  <input type="submit" value="Submit">
</form>
_END;
}
if ($show_number)
{
	// show the favourite number:
	echo "<h1>HERE IT IS: $number</h1>";
}

// show a link that allows the favourite number to be reset in case
// someone else is now using the client machine:
if ($show_reset)
{
	// send a GET request to this same page:
	echo "<br><br><a href='?clear=y'>not mine!</a>";
}

// finish outputting the html for this page:
echo <<<_END
</body>
</html>
_END;
?>
