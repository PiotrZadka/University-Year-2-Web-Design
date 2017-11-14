<?php

// Things to notice:
// All visitors can see their own favourite number
// That number is stored between visits (in a database table on the server)
// The user must enter a correct username and password in order to "log in" and see their number
// Successfully logging in causes the script to store some data in the session (have a look below)
// The script checks for this data to decide if the user is already logged in
// This code includes a way to manually delete the session data and destroy the session ID cookie
// Otherwise the user is logged out when the session data and/or session cookie expire

// default database details for Xampp:
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';

// (see also create_data.php):
// the database we've created to hold data for our site
$dbname  = 'FavouriteNumbers';
// the table we've created to hold users' favourite number data:
$tableName = 'UsersNumbers';

// should we show the login form?:
$show_login_form = false;
// should we show a favourite number?:
$show_number = false;
// should we show a logout option?:
$show_logout = false;
// variable to hold the user's favourite number:
$number = -99;
// variable to hold the user's username:
$user = "";

// start the session:
session_start();

if (isset($_GET['clear']))
{
	// user just clicked to logout, so destroy the session data:
    // first clear the session superglobal array:
	$_SESSION = array();
	// then the cookie that holds the session ID (note the cookie is for the whole domain by default):
	setcookie(session_name(), "", time() - 2592000, '/');
	// then the session data on the server:
	session_destroy();

	// show login form:
	$show_login_form = true;
}
elseif (isset($_POST['username']))
{
	// user just tried to log in, check against database and only display favourite if there's a match:

	// take copies of the credentials the user submitted:
	$username = $_POST['username'];
	$password = $_POST['password'];

	// connect directly to our database (notice 4th argument):
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// if the connection fails, print an error and exit the script:
	if (!$connection)
	{
		die("Connection failed: " . $mysqli_connect_error);
	}

	// check for a row in our table with a matching username and password:
	$query = "SELECT user,favourite FROM $tableName WHERE user='$username' AND password='$password'";
	$result = mysqli_query($connection, $query);

	// how many rows came back? (can only be 1 or 0 because usernames are the primary key in our table):
	$n = mysqli_num_rows($result);

	// if there was a match then set the session variables and show the user their number:
	if ($n > 0)
	{
		// fetch one row as an associative array (elements named after columns):
		$row = mysqli_fetch_assoc($result);
		// extract their username and favourite number for use in the HTML:
		$user = $row['user'];
		$number = $row['favourite'];
		// set a session variable to record that this user has successfully logged in:
		$_SESSION['loggedInPD2'] = true;
		// and copy their name and number into the session for easy future access:
		$_SESSION['user'] = $user;
		$_SESSION['favourite'] = $number;

		// show number:
		$show_number = true;
	}
	else
	{
		// no matching credentials found so just redisplay the login form:
		$show_login_form = true;
	}

	// we're finished with the database, close the connection:
	mysqli_close($connection);

}
elseif (isset($_SESSION['loggedInPD2']))
{
	// a user is logged in, so display their favourite number:

	// show number:
	$show_number = true;
	// extract their details from the session:
	$user = $_SESSION['user'];
	$number = $_SESSION['favourite'];
	// show log out option:
	$show_logout = true;
}
else
{
	// user has arrived at the page for the first time, ask them to log in:

	// show login form:
	$show_login_form = true;
}

// start off the page:
echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href='favourite_database.php'>Favourite Login</a>
<a href='signup.php'>Favourite Registration</a>
<br><br>
_END;

if ($show_login_form)
{
// show the form that allows users to log in
// Note we use an HTTP POST request to avoid their password appearing in the URL:
echo <<<_END
<form action="favourite_database.php" method="post">
  Log in to see your favourite number:<br>
  <input type="text" name="username">
  <br>
  <input type="text" name="password">
  <br><br>
  <input type="submit" value="Submit">
</form>
_END;
}
if ($show_number)
{
	// show a simple greeting and the favourite number:
	echo "<h1>Hi, $user. HERE IT IS: $number</h1>";
}

// show a link that allows logout in case someone else is now using the client machine:
if ($show_logout)
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
