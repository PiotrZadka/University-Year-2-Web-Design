// we create a ball object to group up some useful variables into a set
// each of these variables is related to one logical object (our moving ball)
// x and y relate to the ball's position in space (x - horizontal, y - vertical)
// dx and dy are the velocities (amounts to move the ball) at each time step
// in the respective directions
var ball = {

	x: 200,
	y: 200,
	dx: 2,
	dy: 4

};

// the radius variable controls how big we should draw the ball
var radius = 10;
var bgColor = "white";
var text = '';
// these variables are all used to control the animation
// fpsInterval is how many milliseconds must pass before we draw the next frame of our animation
// then holds the time of the last draw update
var fpsInterval;
var then;

function startAnimating(fps) {
	// we convert a number of frames per seconds into how long (in milliseconds) to wait between each frame
	fpsInterval = 1000/fps;
	// and record the time of the first frame
	then = Date.now();
	// finally, we call the animate method for the first time
	animate();
}


function animate() {
	// the animate method has a self-reference, so that once it's started, we always call it again
	// we use requestAnimationFrame as described in the lecture so that it only runs when necessary
	requestAnimationFrame(animate);

	// we calculate how long (in milliseconds) has elapsed since the last time the animate() method was called
	var now = Date.now();
	var elapsed = now - then;

	// if there have been enough milliseconds (i.e. more than the fpsInterval), then we do some drawing
	if (elapsed > fpsInterval) {
		// reset 'then' to the time at the start of the last fpsInterval
		// to help ensure a smoother animation
		then = now - (elapsed % fpsInterval);

		// retrieve a canvas using jQuery
		// Note that the selector returns an array of jQuery objects, and what we need here is the actual DOM Canvas object
		// We can retrieve the DOM Object itself from the jQuery array by using either square bracket notation ([0])
		// or, the preferred method, .get(0) as shown below
		$( "p" ).text( text );
		var cvs = $("canvas").get(0);
		var ctx = cvs.getContext("2d");


		// carry out some simple drawing using the drawing methods we met in the lecture
		//ctx.beginPath();
		ctx.fillStyle = bgColor;
		ctx.fillRect(0, 0, cvs.width, cvs.height);
		//ctx.closePath();

		ctx.lineWidth = 3;
		ctx.strokeStyle = "#000000";
		ctx.fillStyle = "#ffff00";
		ctx.beginPath();
		ctx.arc(ball.x, ball.y, radius, 0, 2*Math.PI);
		ctx.closePath();
		ctx.stroke();
		ctx.fill();



		// update the position of the ball object
		ball.x += ball.dx;
		ball.y += ball.dy;

		// check if the ball has reached the edge of the canvas
		// and change direction if we have

		if (ball.x + radius >= cvs.width) {
			bgColor = 'blue';
			text = "Bounce: "+ball.x+", "+ball.y+" ";
			ball.dx *= -1;
		}

		if (ball.x - radius <= 0) {
			bgColor = 'red';
			text = "Bounce: "+ball.x+", "+ball.y+" ";
			ball.dx *= -1;
		}

		if (ball.y + radius >= cvs.height) {
			bgColor = 'green';
			text = "Bounce: "+ball.x+", "+ball.y+" ";
			ball.dy *= -1;
		}

		if (ball.y - radius <= 0) {
			bgColor = 'orange';
			text = "Bounce: "+ball.x+", "+ball.y+" ";
			ball.dy *= -1;
		}
	}

}

// Remember this? We use jQuery's ready event to start the animation once
// the page has fully loaded (once the Canvas element is properly prepared, etc.)
// The number passed to startAnimating() is the maximum fps - try changing this!
$(document).ready(function() {


	startAnimating(30);

});
