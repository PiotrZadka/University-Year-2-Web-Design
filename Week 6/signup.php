<?php
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';
$dbname  = 'FavouriteNumbers';
$tableName = 'UsersNumbers';

if (isset($_POST['username'])){

$username = $_POST['username'];
$password = $_POST['password'];
$favourite = $_POST['favourite'];

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$query = "INSERT INTO " . $tableName . " (user, password, favourite) VALUES ('$username','$password','$favourite');" ;


if (mysqli_query($connection, $query))
{
	echo "Account created! You may now log in <br>";
}
else
{
	echo "Account creation failed: <br>" . mysqli_error($connection);
}

}
mysqli_close($connection);

echo <<<_END
<!DOCTYPE html>
<html>
<body>
  <a href='favourite_database.php'>Favourite Login</a>
  <a href='signup.php'>Favourite Registration</a>
  <form action="signup.php" method="post">
    <p>Register new account for Favourite Number</p>
    Username <input type="text" name="username">
    <br>
    Password <input type="text" name="password">
    <br>
    Favourite <input type="text" name="favourite">
    <br>
    <input type="submit" value="Submit">
  </form>

</body>
</html>
_END;





 ?>
