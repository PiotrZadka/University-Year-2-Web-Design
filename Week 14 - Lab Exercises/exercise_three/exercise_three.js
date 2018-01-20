// Look back at last week (Games on the Web I - HTML5 Graphics and Animation)
// for a reminder on how all the animation code here works

var fpsInterval;
var then;
var i = 0;
var j = 0;
var cells = 10;
var adjustment = 20;
var radius = 20;
var keyCode = ["100","97","119","115"];
var circleArr = [];
circleArr.push{
	a:1
};
console.log(circle.Arr[1]);

function startAnimating(fps){
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}

function controlls() {
	$( document ).keypress(function(event) {
  console.log("Keypressed: "+event.charCode);
		movingBlock(event.charCode);
		wallDetection();
		scaleDown(event.charCode);
});
}

// check for key pressed
function movingBlock(code){
		if(code == "100"){
			i = i + 1;
		}
		if(code == "97"){
			i = i - 1;
		}

	if(code == "119"){
		j = j - 1;
	}
	if(code == "115"){
		j = j + 1;
	}
}

//check array if it contains controlls code
function scaleDown(code){
	for (var i = 0; i < keyCode.length ; i++){
		if(keyCode[i] == code){
			radius = radius -1;
			if(radius == 0){
				radius = 20;
			}
		}
	}
}

//check if limit
function wallDetection(){
	console.log("i:"+i);
	console.log("j:"+j);
	if(i>9){
		i = 9;
	}
	if(i<0){
		i = 0;
	}
	if(j>9){
		j = 9;
	}
	if(j<0){
		j = 0;
	}
}

function animate() {
	requestAnimationFrame(animate);
	var now = Date.now();
	var elapsed = now - then;

	if (elapsed > fpsInterval)
	{
		then = now - (elapsed % fpsInterval);

		var cvs = $("canvas").get(0);
		var ctx = cvs.getContext("2d");

		//ctx.clearRect(0, 0, cvs.width, cvs.height);

		// Look back at last week's exercise 2
		// for a reminder of how this works
		ctx.beginPath();
		ctx.arc(i*cvs.width/cells+adjustment,j*cvs.height/cells+adjustment,radius,0,2*Math.PI);
		ctx.fillStyle = 'black';
		ctx.fill();
		ctx.stroke();
	}
}

$(document).ready(function(){
// (1) What sort of event handler do we need? What can we attach it to?
	controlls();
	startAnimating(30);
});
