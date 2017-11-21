<?php

// Things to notice:
// This script is called by every other script (via include_once)
// It starts the session and displays a different set of menu links depending on whether the user is logged in or not
// It also reads in the credentials for our database connection from credentials.php

// database connection details:
require_once "credentials.php";

// start/restart the session:
session_start();

if (isset($_SESSION['loggedInPD3']))
{
	// THIS PERSON IS LOGGED IN
	// show the logged in menu options:

echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href='about.php'>about</a> ||
<a href='show_favourite.php'>show favourite</a> ||
<a href='set_favourite.php'>set favourite</a> ||
<a href='all_favourites.php'>all favourites</a> ||
<a href='sign_out.php'>sign out ({$_SESSION['username']})</a>
<br><br>
_END;
}
else
{
	// THIS PERSON IS NOT LOGGED IN
	// show the logged out menu options:
	
echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href='about.php'>about</a> ||
<a href='sign_up.php'>sign up</a> ||
<a href='sign_in.php'>sign in</a>
<br><br>
_END;
}
?>