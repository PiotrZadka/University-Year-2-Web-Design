<?php

// Things to notice:
// Within the echo statements we are just writing normal HTML
// Everything inside the echo statement is sent back to the client and interpreted by the browser
// To see the code that comes back, run the script, right-click in the browser and “view source” 
// Notice that you can’t see the PHP code (only what is echoed)

echo "<!DOCTYPE html>";
echo "<html>";
echo "<body>";

echo "<p>This is a paragraph.</p>";
echo "<p>This is a paragraph.</p>";
echo "<p>This is a paragraph.</p>";

echo "</body>";
echo "</html>";
?>