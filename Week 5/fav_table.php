<?php


echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href="favourite_cookies.php">myfavouritenumber.com</a>
<br>
_END;

  if (isset($_COOKIE["favourite"])){
    
    $number = $_COOKIE["favourite"];

    for ($x = 0; $x <= 10; $x++) {
    echo "$number multiplied by $x  = ";
    echo $number * $x;
    echo "<br>";
    }
  }
else{
  echo "Number is not specified";
}

?>
