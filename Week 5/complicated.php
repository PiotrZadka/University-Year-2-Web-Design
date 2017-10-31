<?php

// Things to notice:
// The code in this heredoc uses both JavaScript and jQuery
// It's reletively complicated - don't worry if you don't understand it all...
// The point is only that you can put _any_ client-side code into a heredoc...
// including client-side code containing complicated JavaScript and/or jQuery

$radius = 10;
$bColor = "#ffff00";

//if cookie has been found do this (this person has submitted the form BEFORE)
if(isset($_COOKIE["Settings"])){
		$settings = unserialize($_COOKIE["Settings"]);
		$radius = $settings[0];
		$bColor = $settings[1];
// don't destroy
		//setcookie("lastVisit", "", time() - 2592000);
}
elseif (isset($_GET["ballColor"])){
  // this person has JUST submitted the form
	//Should execute on first visit
	// ballSize and ballColor are the names of inputs in the form
		$radius = $_GET["ballSize"];
		$bColor = $_GET["ballColor"];
		$parameters = array($radius,$bColor);
		//converting into text
		$settings = serialize($parameters);
		setCookie("Settings", $settings);
}



echo <<<_END
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script>

		var ball = {

			x: 200,
			y: 200,
			dx: 2,
			dy: 4

		};

		var radius = $radius;
		var time;
		var fps = 60;

		function draw()
		{
			setTimeout(function() {
				var cvs = $("canvas").get(0);
				var ctx = cvs.getContext("2d");

				ctx.clearRect(0, 0, cvs.width, cvs.height);

				ctx.lineWidth = 3;
				ctx.strokeStyle = "#000000";
				ctx.fillStyle="$bColor";
				ctx.beginPath();
				ctx.arc(ball.x, ball.y, radius, 0, 2*Math.PI);
				ctx.closePath();
				ctx.stroke();
				ctx.fill();

				ball.x += ball.dx;
				ball.y += ball.dy;

				if (ball.x + radius >= cvs.width)
				{
					ball.dx *= -1;
				}
				if (ball.x - radius <= 0)
				{
					ball.dx *= -1;
				}
				if (ball.y + radius >= cvs.height)
				{
					ball.dy *= -1;
				}
				if (ball.y - radius <= 0)
				{
					ball.dy *= -1;
				}

				requestAnimationFrame(draw);
			}, 1000/fps);
		}

		$(document).ready(function(){

			requestAnimationFrame(draw);

		});

	</script>
</head>
<body>
	<a href="favourite_cookies.php">myfavouritenumber.com</a><br>
	<form>
	Ball color <input type="color" name="ballColor" value="$bColor"><br>
	Ball radius <input type="number" name="ballSize" value="$radius"><br>
	<input type="submit" name = "set" value="Set Settings">
	</form>

	<canvas width="400" height="400" style="border: solid black 1px">
		Sorry, no canvas support!
	</canvas>
</body>
</html>
_END;


?>
