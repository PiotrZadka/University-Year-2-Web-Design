<?php

// Things to notice:
// Testing our PHP scripts work as we expect is very difficult without some data
// This file generates some fake user data that we can use for testing
// You will need something similar to test your 2CWK50 solution
// This file is the first one we will run when we mark your submission

// read in the details of our MySQL server:
require_once "credentials.php";

// We'll use the procedural (rather than object oriented) mysqli calls

// connect to the host:
$connection = mysqli_connect($dbhost, $dbuser, $dbpass);

// exit the script with a useful message if there was an error:
if (!$connection)
{
	die("Connection failed: " . $mysqli_connect_error);
}
  
// build a statement to create a new database:
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

// no data returned, we just test for true(success)/false(failure):
if (mysqli_query($connection, $sql)) 
{
	echo "Database created successfully, or already exists<br>";
} 
else
{
	die("Error creating database: " . mysqli_error($connection));
}

// connect to our database:
mysqli_select_db($connection, $dbname);

///////////////////////////////////////////
////////////// MEMBERS TABLE //////////////
///////////////////////////////////////////

// if there's an old version of our table, then drop it:
$sql = "DROP TABLE IF EXISTS members";

// no data returned, we just test for true(success)/false(failure):
if (mysqli_query($connection, $sql)) 
{
	echo "Dropped existing table: members<br>";
} 
else 
{	
	die("Error checking for existing table: " . mysqli_error($connection));
}

// make our table:
$sql = "CREATE TABLE members (username VARCHAR(16), password VARCHAR(16), PRIMARY KEY(username))";

// no data returned, we just test for true(success)/false(failure):
if (mysqli_query($connection, $sql)) 
{
	echo "Table created successfully: members<br>";
}
else 
{
	die("Error creating table: " . mysqli_error($connection));
}

// put some data in our table:
$usernames[] = 'barryg'; $passwords[] = 'letmein';
$usernames[] = 'mandyb'; $passwords[] = 'abc123';
$usernames[] = 'mathman'; $passwords[] = 'secret95';
$usernames[] = 'brianm'; $passwords[] = 'test';

// loop through the arrays above and add rows to the table:
for ($i=0; $i<count($usernames); $i++)
{
	$sql = "INSERT INTO members (username, password) VALUES ('$usernames[$i]', '$passwords[$i]')";
	
	// no data returned, we just test for true(success)/false(failure):
	if (mysqli_query($connection, $sql)) 
	{
		echo "row inserted<br>";
	}
	else 
	{
		die("Error inserting row: " . mysqli_error($connection));
	}
}

//////////////////////////////////////////////
////////////// FAVOURITES TABLE //////////////
//////////////////////////////////////////////

// if there's an old version of our table, then drop it:
$sql = "DROP TABLE IF EXISTS favourites";

// no data returned, we just test for true(success)/false(failure):
if (mysqli_query($connection, $sql))
{
	echo "Dropped existing table: favourites<br>";
} 
else 
{	
	die("Error checking for existing table: " . mysqli_error($connection));
}

// make our table:
$sql = "CREATE TABLE favourites (username VARCHAR(16), value BIGINT, updated DATETIME, PRIMARY KEY(username))";

// no data returned, we just test for true(success)/false(failure):
if (mysqli_query($connection, $sql)) 
{
	echo "Table created successfully: favourites<br>";
}
else 
{
	die("Error creating table: " . mysqli_error($connection));
}

// put some data in our table:
$usernames = array(); // clear this array (as we already used it above)
$usernames[] = 'barryg'; $values[] = 77; $updates[] = '2016-02-15 16:23:12';
$usernames[] = 'mandyb'; $values[] = 888; $updates[] = '2016-11-05 07:13:52';
$usernames[] = 'mathman'; $values[] = 66; $updates[] = '2016-07-23 11:32:21';

// loop through the arrays above and add rows to the table:
for ($i=0; $i<count($usernames); $i++)
{
	$sql = "INSERT INTO favourites (username, value, updated) VALUES ('$usernames[$i]', $values[$i], '$updates[$i]')";
	
	// no data returned, we just test for true(success)/false(failure):
	if (mysqli_query($connection, $sql)) 
	{
		echo "row inserted<br>";
	}
	else 
	{
		die("Error inserting row: " . mysqli_error($connection));
	}
}

// we're finished, close the connection:
mysqli_close($connection);
?>