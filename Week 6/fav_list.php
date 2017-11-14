<?php


session_start();
echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href='favourite_sessions.php'>myfavouritenumber.com</a>

</body>
</html>
_END;

if(isset($_SESSION['favourite'])){
  
  $fav = $_SESSION['favourite'];

  for($i = 0; $i<= 10; $i++){
    $res = $i * $fav;
    echo "<br>$i multiplied by $fav = $res";
  }
}
else{
  echo "<br>Favourite number is not set";
}



?>
