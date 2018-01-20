var fpsInterval;
var then;
// store mouse X,Y position for green circle
var mouseXY = [];
// spawn red circle outside canvas
var circle = {
	x: -30,
	y: -30
};

// keep refreshing canvas
function startAnimating(fps)
{
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}

// draw green circle
function drawGreenCircle(x,y){
	var cvs = $("canvas").get(0);
	var ctx = cvs.getContext("2d");
	ctx.beginPath();
	ctx.arc(x,y,30,0,2*Math.PI);
	ctx.fillStyle = 'green';
	ctx.fill();
	ctx.stroke();
}

// record mouse X,Y position when mouse is clicked on canvas
function mouseClick(){
	$("canvas").click(function(event){
		var mouseX = event.pageX;
		var mouseY = event.pageY;

		// add new mouse position to array
		mouseXY.push({
			x: mouseX,
			y: mouseY
		});

		// if array is bigger than 5 remove first element
		if(mouseXY.length > 5){
			mouseXY.shift();
		}
		console.log(mouseXY.length);
	});
}

// draw red circle
function moveRedCircle(x,y){
	var cvs = $("canvas").get(0);
	var ctx = cvs.getContext("2d");
	ctx.clearRect(0, 0, cvs.width, cvs.height);
	ctx.beginPath();
	ctx.arc(x,y,30,0,2*Math.PI);
	ctx.fillStyle = 'red';
	ctx.fill();
	ctx.stroke();
}

// keep track on mouse x,y position on canvas
function mouseMove(){
	$( "canvas" ).mousemove(function(event){
		circle.x = event.pageX;
		circle.y = event.pageY;
	});
}

//
function animate() {
	requestAnimationFrame(animate);
	var now = Date.now();
	var elapsed = now - then;
	if (elapsed > fpsInterval) {
		then = now - (elapsed % fpsInterval);
		// draw red circle on current mouse X,Y position
		moveRedCircle(circle.x,circle.y);
		// keep drawing green circle as long as there is new X,Y value in array
		for(i = 0; i < mouseXY.length; i++){
			drawGreenCircle(mouseXY[i].x, mouseXY[i].y);
		}
	}
}

// RUN
$(document).ready(function(){
	mouseClick();
	mouseMove();
	startAnimating(30);
});
