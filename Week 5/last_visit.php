<?php

// Things to notice:
// Use of a heredoc for long echo statements
// All code inside the heredoc goes back to the browser, including whitespace
// It looks just like normal HTML and there is nothing stopping us using JavaScript and jQuery too

//Format date
$current = date("l, d-M-y G:i:s e");

//check if date from last visit cookie has been set
if (isset($_COOKIE["lastVisit"]))
{
  //if so set $last value to value of cookie variable
  $last = $_COOKIE["lastVisit"];
  //Update cookie to a new value of current time
  setcookie("lastVisit", $current);
}
//if cookie is not set
else
{
  //Show Welcome Message
  $last = "Welcome, This is the first time you are here";
  //Update cookie to a current date
  setcookie("lastVisit", $current);
}

//Reset date button
if(isset($_POST["reset"])){
  //reset cookie
  setcookie("lastVisit", "", time() - 2592000);
  $last = "Welcome, This is the first time you are here";
}


echo <<<_END
<!DOCTYPE html>
<html>
<body>

<a href="favourite_cookies.php">myfavouritenumber.com</a>
<h1> My Shopping List </h1>

<ul>
  <li>7x Apples</li>
    <ul>
      <li>Cox</li>
      <li>Gala</li>
    </ul>
  <li>3x Bananas</li>
  <li>10x Carrots</li>
  <li>4x Dates</li>
  <li>6x Eggs</li>
    <ul>
      <li>Mediums</li>
      <li>Free-range</li>
    </ul>
</ul>

<p>Last Visited: $last</p>

<form action ='' method='post'>
  <input type="submit" name="reset" value="Reset Visit"></button>
</form>


</body>
</html>
_END;



?>
