<?php
// default values for Xampp:
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';

// name of a database to hold our tables (we'll create it if it doesn't exist)
$dbname  = 'FavouriteNumbers';

// We'll use the procedural (rather than object oriented) mysqli calls in this example

// connect to the host:
$connection = mysqli_connect($dbhost, $dbuser, $dbpass);

// exit the script with a useful message if there was an error:
if (!$connection)
{
	die("Connection failed: " . $mysqli_connect_error);
}

// build a statement to create a new database:
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

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

// name of the table we're going to make:
$tableName = 'UsersNumbers';

// if there's an old version of our table, then drop it:
$sql = "DROP TABLE IF EXISTS " . $tableName;
if (mysqli_query($connection, $sql))
{
	echo "Dropped existing table: " . $tableName . "<br>";
}
else
{
	die("Error checking for existing table: " . mysqli_error($connection));
}

// make our table:
$sql = "CREATE TABLE " . $tableName . " (user VARCHAR(16), password VARCHAR(16), favourite INT(11), PRIMARY KEY(user))";
if (mysqli_query($connection, $sql))
{
	echo "Table created successfully: " . $tableName . "<br>";
}
else
{
	die("Error creating table: " . mysqli_error($connection));
}

// put some data in our table:
$sql = "INSERT INTO " . $tableName . " (user, password, favourite) VALUES ('barryg', 'letmein', '13');" .
"INSERT INTO " . $tableName . " (user, password, favourite) VALUES ('mandyb', 'abc123', '101');" .
"INSERT INTO " . $tableName . " (user, password, favourite) VALUES ('mathman', 'secret95', '975');";

// this function lets us execute multiple queries:
if (mysqli_multi_query($connection, $sql))
{
	echo "New records inserted successfully<br>";
}
else
{
	die("Error: " . $sql . "<br>" . mysqli_error($connection));
}

// we're finished, close the connection:
mysqli_close($connection);
?>
