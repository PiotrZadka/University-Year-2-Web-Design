<?php  

// Things to notice:

// The form data is submitted to the next script via a GET 
// request (look at the address bar after you submit data)

// There are lots of other HTML5 elements that help us get different kinds 
// of data from the user and return them to the server via GET requests
// (e.g., text, numbers, email addresses, dates, even colours)

// Chances to try in labs!

echo <<<_END
<!DOCTYPE html>
<html>
<body>

<form action="form.php">
  First name:<br>
  <input type="text" name="firstname">
  <br>
  Last name:<br>
  <input type="text" name="lastname">
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
_END;
?>