// Look back at last week (Games on the Web I - HTML5 Graphics and Animation)
// for a reminder on how all the animation code here works
var fpsInterval;
var then;
var cells = 10;
var adjustment = 20;
var keyCode = ["100","97","119","115"];
//array to store circle objects with location
var circleArray = [];
//circle object with default values
var circle = {
	i:0,
	j:0,
	radius:20
};

// add first circle object to spawn on canvas
addLocationtoArray(circle.i,circle.j,circle.radius);

//function to add object to array
function addLocationtoArray(x,y,radius){
		circleArray.push({
			x: circle.i,
			y: circle.j,
			r: circle.radius
		});

		// if there are 20 circles in array remove the first one [0]
		// and clear canvas "clearRect()";
		if(circleArray.length > 20){
			circleArray.shift();
//			refreshScreen();
		}
}

function startAnimating(fps)
{
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}

function controlls() {
	$( document ).keypress(function(event) {
		movingBlock(event.charCode);
		scaleDown(event.charCode);
		wallDetection();
	});
}

// check for key pressed
function movingBlock(code){
		if(code == "100"){
			circle.i = circle.i + 1;
		}
		if(code == "97"){
			circle.i = circle.i - 1;
		}

		if(code == "119"){
			circle.j = circle.j - 1;
		}
		if(code == "115"){
			circle.j = circle.j + 1;
		}
		addLocationtoArray(circle.i,circle.j,circle.radius);
}

//check array if it contains controlls code
function scaleDown(code){
	for (var i = 0; i < keyCode.length ; i++){
		if(keyCode[i] == code){
			circle.radius = circle.radius - 1;
			if(circle.radius == 0){
				circle.radius = 20;
			}
		}
	}
}

//check if limit
function wallDetection(){
	if(circle.i>9){
		circle.i = 9;
	}
	if(circle.i<0){
		circle.i = 0;
	}
	if(circle.j>9){
		circle.j = 9;
	}
	if(circle.j<0){
		circle.j = 0;
	}
}

function drawCircle(x,y,r){
	var cvs = $("canvas").get(0);
	var ctx = cvs.getContext("2d");
	ctx.beginPath();
	ctx.arc(
		x*cvs.width/cells+adjustment, // Circle Grid Location X
		y*cvs.height/cells+adjustment, // Circle Grid Location Y
		r, // Circle Radius
		0, // Starting angle (Radians) of circle.
		2*Math.PI // End angle (Radians) of circle.
	);
	ctx.fillStyle = 'black';
	ctx.fill();
	ctx.stroke();
}

function refreshScreen(){
	var cvs = $("canvas").get(0);
	var ctx = cvs.getContext("2d");
	ctx.clearRect(0, 0, cvs.width, cvs.height);
}

function animate() {
	requestAnimationFrame(animate);
	var now = Date.now();
	var elapsed = now - then;
	if (elapsed > fpsInterval){
		then = now - (elapsed % fpsInterval);
		refreshScreen();
		for(var i = 0; i < circleArray.length; i++){
			drawCircle(circleArray[i].x,circleArray[i].y,circleArray[i].r);
		}
	}
}

$(document).ready(function(){
	controlls();
	startAnimating(30);
});
