<?php

// Things to notice:
// All visitors can see their own favourite number
// That number is stored between visits (in a session on the server)
// A cookie is stored on the user's machine, holding the unique ID of their session
// You can view the "SESSID" cookie that gets stored on your own machine through the browser options
// By default, the cookie will expire on the next browser close
// By default, the session data will be marked ready for deletion (garbage collection) after 24mins
// This code includes a way to manually delete the session data and destroy the session ID cookie

// should we show the form input?:
$show_input_box = false;
// should we show a favourite number?:
$show_number = false;
// should we show a reset option?:
$show_reset = false;
// variable to hold the user's favourite number:
$number = -99;

// start/resume the session:
session_start();

if (isset($_GET['clear']))
{
	// user just clicked to reset, so destroy the session data:
    // first clear the session superglobal array:
	$_SESSION = array();
	// then the cookie that holds the session ID (note the cookie is all server directories by default):
	setcookie(session_name(), "", time() - 2592000, '/');
	// then the session data on the server:
	session_destroy();

	// show input box:
	$show_input_box = true;
}
elseif (isset($_GET['favourite']))
{
	// user just set a new favourite number, so store it in the session:
	$_SESSION['favourite'] = $_GET['favourite'];

	// show number:
	$show_number = true;
	$number = $_GET['favourite'];
}
elseif (isset($_SESSION['favourite']))
{
	// there is already a favourite number in session data, so display it:

	// show number:
	$show_number = true;
	$number = $_SESSION['favourite'];
	// show reset:
	$show_reset = true;
}
else
{
	// user has arrived at the page for the first time, ask them to tell us their favourite number:

	// show input box:
	$show_input_box = true;
}

// start off the page:
echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href='favourite_sessions.php'>myfavouritenumber.com</a>
<a href='fav_list.php'>fav list.com</a>
<br><br>
_END;

if ($show_input_box)
{
// show the form that allows input of the new number:
echo <<<_END
<form action="favourite_sessions.php">
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

// finish outputting the page:
echo <<<_END
</body>
</html>
_END;
?>
