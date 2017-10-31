<?php 

// Things to notice:
// We can refer to the elements of an array by a name, instead of by a numeric index
// This kind of array is called an “associative array”
// We need curly braces to refer to an associative array from within a heredoc

// Create an array of values using a 0-based index to reference individual elements: 
$player1[0] = "goalkeeper"; 
$player1[1] = "Brown"; 
$player1[2] = "Mulchester"; 
$player1[3] = "twenty-four"; 

// create an array of values using helpfully named strings to reference each element:
$player2["position"] = "fullback";
$player2["surname"] = "Smith";
$player2["club"] = "Mulchester";
$player2["age"] = "twenty-seven";

echo <<<_END
<!DOCTYPE html>
<html>
<body>

<p>$player1[1] is $player1[3] and plays $player1[0]</p>
<p>{$player2["surname"]} is {$player2["age"]} and plays {$player2["position"]}</p>

</body>
</html> 
_END;
?>