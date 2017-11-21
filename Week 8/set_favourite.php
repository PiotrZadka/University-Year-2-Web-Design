<?php

// execute the header script:
require_once "header.php";

$dbname  = 'pd3';
$tableName = 'favourites';
$username = $_SESSION['username'];

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query2 = "SELECT value FROM $tableName WHERE username='$username'";
$result2 = mysqli_query($connection, $query2);
$n = mysqli_num_rows($result2);

if(isset($_POST['favNumber'])){
  if ($n != 1){
    $number = $_POST['favNumber'];
    $query = "INSERT INTO " . $tableName . " (username, value) VALUES ('$username', '$number');";

    if (mysqli_multi_query($connection, $query))
    {
    	echo "Favourite number added successfuly <br>";
    }
    else
    {
    	die("Error: " . $sql . "<br>" . mysqli_error($connection));
    }
      mysqli_close($connection);
  }
  else
  {
    $number = $_POST['favNumber'];
    $query = "UPDATE $tableName SET value='$number' WHERE username = '$username'";

    if (mysqli_multi_query($connection, $query))
    {
    	echo "Favourite number updated successfuly <br>";
    }
    else
    {
    	die("Error: " . $sql . "<br>" . mysqli_error($connection));
    }
      mysqli_close($connection);
  }
}


echo <<<_END
<form action="set_favourite.php" method="post">
  Please set your favourite number:<br>
  Favourite number: <input type="text" name="favNumber">
  <input type="submit" value="Submit">
</form>
_END;



// finish of the HTML for this page:
require_once "footer.php";
?>
