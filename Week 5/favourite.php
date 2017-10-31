<?php  

// Things to notice:
// All visitors can see their own favourite number
// But we have no way of remembering their preferences between visits

// Storing favourite numbers on the server (e.g., in a text file) might
// seem easy, but actually it's quite complicated... See lecture slides

// start off the html for this page:
echo <<<_END
<!DOCTYPE html>
<html>
<body>
<a href="favourite.php">myfavouritenumber.com</a>
<br><br>
_END;

// see if the user has just submitted a number via the form:
if (isset($_GET["favourite"]))
{
	// if so, then show them their favourite number:
	echo "<h1>HERE IT IS: {$_GET['favourite']}</h1>";
}
else
{
	// if not, ask them to tell us their favourite number:
	// show the form that allows input of the new number:
echo <<<_END
<form action="favourite.php">
  Let us know your favourite number:<br>
  <input type="text" name="favourite">
  <br><br>
  <input type="submit" value="Submit">
</form>	
_END;

}

// finish outputting the html for this page:
echo <<<_END
</body>
</html>
_END;
?>