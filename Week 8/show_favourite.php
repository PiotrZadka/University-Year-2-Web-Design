<?php

// execute the header script:
require_once "header.php";

$dbname  = 'pd3';
$tableName = 'favourites';
$username = $_SESSION['username'];

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$query = "SELECT value FROM $tableName WHERE username = '$username'" ;
$result = mysqli_query($connection, $query);

$n = mysqli_num_rows($result);
if ($n > 0)
	{
    $row = mysqli_fetch_assoc($result);
    $number = $row['value'];
    echo "Your number is $number ";
  }
else{
  echo "Favourite number wasn't set";
}


// finish off the HTML for this page:

mysqli_close($connection);
require_once "footer.php";
?>
