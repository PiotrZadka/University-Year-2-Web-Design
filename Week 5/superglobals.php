<?php

// Things to notice:
// PHP makes a number of "superglobal" arrays available to us when we program
// they are all named with capital letters and begin with an underscore.

// Can you make an educated guess about what is outputted by the
// following code based on the name of the superglobal, the names of the 
// elements we access, and what you see when you run the script?

// The REQUEST_TIME is measured in "Unix time": the number of seconds that
// have elapsed since midnight on Thursday the 1st of Jan 1970! We'll use
// Unix time again in the later examples.

echo <<<_END
<!DOCTYPE html>
<html>
<body>
<p>{$_SERVER["SERVER_NAME"]}</p>
<p>{$_SERVER["SCRIPT_FILENAME"]}</p>
<p>{$_SERVER["REQUEST_TIME"]}</p>
<p>{$_SERVER["REMOTE_ADDR"]}</p>
</body>
</html>
_END;
?>