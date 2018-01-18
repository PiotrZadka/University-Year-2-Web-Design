// Look back at last week (Games on the Web I - HTML5 Graphics and Animation)
// for a reminder on how all the animation code here works

var fpsInterval;
var then;
var i = 0;
var j = 0;
var cells = 10;

function startAnimating(fps){
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}

function controlls() {
	movingBlock();
	wallDetection();
}

function movingBlock(){
		if(event.charCode == "100"){
			i = i + 1;
		}
		if(event.charCode == "97"){
			i = i - 1;
		}

	if(event.charCode == "119"){
		j = j - 1;
	}
	if(event.charCode == "115"){
		j = j + 1;
	}
}

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

		ctx.clearRect(0, 0, cvs.width, cvs.height);

		// Look back at last week's exercise 2
		// for a reminder of how this works
		ctx.fillRect(	i*cvs.width/cells,
						j*cvs.height/cells,
						cvs.width/cells,
						cvs.height/cells);
	}
}

$(document).ready(function(){
// (1) What sort of event handler do we need? What can we attach it to?
	$( document ).keypress(function(event) {
  console.log("Keypressed: "+event.charCode);
	controlls();
});
	startAnimating(30);
});
