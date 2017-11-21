<?php

// Things to notice:
// The main job of this script is to execute an INSERT statement to add the submitted username and password

// execute the header script:
require_once "header.php";

// should we show the signup form?:
$show_signup_form = false;
// message to output to user:
$message = "";

if (isset($_SESSION['loggedInPD3']))
{
	// user is already logged in, just display a message:
	echo "You are already logged in, please log out first<br>";
	
}
elseif (isset($_POST['username']))
{
	// user just tried to sign up, try and insert these new details:
	
	// take copies of the credentials the user submitted:
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// connect directly to our database (notice 4th argument):
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// if the connection fails, we need to know, so allow this exit:
	if (!$connection)
	{
		die("Connection failed: " . $mysqli_connect_error);
	}
	
	// try to insert the new details:
	$query = "INSERT INTO members (username, password) VALUES ('$username', '$password');";
	$result = mysqli_query($connection, $query);
	
	// no data returned, we just test for true(success)/false(failure):
	if ($result) 
	{
		// show a successful signup message:
		$message = "Signup was successful, please sign in<br>";
	} 
	else 
	{
		// show the form:
		$show_signup_form = true;
		// show an unsuccessful signup message:
		$message = "Sign up failed, please try again<br>";
	}
		
	// we're finished with the database, close the connection:
	mysqli_close($connection);

}
else
{
	// just a normal visit to the page, show the signup form:
	$show_signup_form = true;
	
}

if ($show_signup_form)
{
// show the form that allows users to sign up
// Note we use an HTTP POST request to avoid their password appearing in the URL:
echo <<<_END
<form action="sign_up.php" method="post">
  Please choose a username and password:<br>
  Username: <input type="text" name="username">
  <br>
  Password: <input type="text" name="password">
  <br>
  <input type="submit" value="Submit">
</form>	
_END;
}

echo $message;

// finish off the HTML for this page:
require_once "footer.php";

?>