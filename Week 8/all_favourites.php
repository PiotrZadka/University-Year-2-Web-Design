<?php

// Things to notice:
// The main job of this script is to execute a SELECT statement to get and ORDER all the favourite numbers 

// execute the header script:
require_once "header.php";

if (!isset($_SESSION['loggedInPD3']))
{
	// user isn't logged in, display a message saying they must be:
	echo "You must be logged in to view this page.<br>";
}
else
{
	// user is already logged in, read all the favourite numbers and display in a table:
	
	// connect directly to our database (notice 4th argument):
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// if the connection fails, we need to know, so allow this exit:
	if (!$connection)
	{
		die("Connection failed: " . $mysqli_connect_error);
	}
	
	// find all favourite numbers, ordered by their last update time (descending):
	$query = "SELECT value,updated FROM favourites ORDER BY updated DESC";
	
	// this query can return data ($result is an identifier):
	$result = mysqli_query($connection, $query);
			
	// how many rows came back?:
	$n = mysqli_num_rows($result);
		
	// if we got some results then show them in a table:
	if ($n > 0)
	{
		// just a bit of CSS to make the table clearly visible:
echo <<<_END
<style>
	table, th, td {border: 1px solid black; align: center;}
</style>
_END;
		echo "<table>";
		echo "<tr><th>Favourites</th><th>Updated</th></tr>";
		// loop over all rows, adding them into the table:
		for ($i=0; $i<$n; $i++)
		{
			// fetch one row as an associative array (elements named after columns):
			$row = mysqli_fetch_assoc($result);
			// add it as a row in our table:
			echo "<tr>";
			echo "<td>{$row['value']}</td><td>{$row['updated']}</td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}
	else
	{
		// no favourites found...:
		echo "no favourite numbers found<br>";
	}
	
	// we're finished with the database, close the connection:
	mysqli_close($connection);
}

// finish off the HTML for this page:
require_once "footer.php";

?>