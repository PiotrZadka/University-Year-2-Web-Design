$(document).ready(function(){
	startAnimating(60);
});

//Global Variables
var fpsInterval;
var then;
var shift = 0;
var frameWidth = 300;
var frameHeight = 300;
var canvasX = 0;
var canvasY = 0;
var myImage = new Image();
var totalFrames = 24;
var currentFrame = 0;
//Loading image
myImage.src = "sprites.png";
myImage.addEventListener("load", loadImage, false);
//Function to begin animation with set fps
function startAnimating(fps)
{
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}

function animate() {

	var now = Date.now();
	var elapsed = now - then;

	if (elapsed > fpsInterval)
	{
		then = now - (elapsed % fpsInterval);
		var cvs = $("canvas").get(0);
		var ctx = cvs.getContext("2d");

		//clear background
		ctx.clearRect(0, 0, cvs.width, cvs.height);
		//draw each frame and place in middle of canvas
		/*
		drawImage(
		"Image object",
		"X coordinate next sprite in png (Location of sprite?)",
		"Y coorinate next sprite in png",
		"Width of sprite in png (How big is sprite?)",
		"Height of sprite in png"
		"X coordinate on canvas (Where to draw it?)"
		"Y coordinate on canvas"
		"Sprite width to use (How you want it to look?)"
		"Sprite height to use"
		)
		*/
		//(sprite.png,0,0,300,300,0,0,300,300)
		ctx.drawImage(myImage, shift, 0, frameWidth, frameHeight, canvasX, canvasY, frameWidth, frameHeight);
		shift += frameWidth + 1;
	}

	if (currentFrame == totalFrames) {
		shift = 0;
		currentFrame = 0;
	}
	currentFrame++;
	requestAnimationFrame(animate);
}
