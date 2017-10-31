<?php

// Things to notice:
// The value stored in the PHP variable is inserted into the echo statement before it is sent back to the client
// Run the script, right-click in the browser and “view source” to check

// set up a PHP variable named $myText holding the value "This is a paragraph.": 
$myText = "This is a paragraph.";

echo <<<_END
<!DOCTYPE html>
<html>
<body>

<p>$myText</p>
<p>$myText</p>
<p>$myText</p>

</body>
</html> 
_END;
?>