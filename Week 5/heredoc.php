<?php 

// Things to notice:
// Use of a heredoc for long echo statements
// All code inside the heredoc goes back to the browser, including whitespace
// It looks just like normal HTML and there is nothing stopping us using JavaScript and jQuery too

echo <<<_END
<!DOCTYPE html>
<html>
<body>

<p>This is a paragraph.</p>
<p>This is a paragraph.</p>
<p>This is a paragraph.</p>

</body>
</html> 
_END;
?>