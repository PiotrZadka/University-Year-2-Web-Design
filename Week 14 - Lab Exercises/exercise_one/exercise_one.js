// Look back at last week (Games on the Web I - HTML5 Graphics and Animation)
// for a reminder on how all the animation code here works

var fpsInterval;
var then;

function startAnimating(fps) {

	fpsInterval = 1000/fps;
	then = Date.now();
	animate();

}

var i = 0;
var j = 0;
var cells = 10;



function animate() {

	requestAnimationFrame(animate);

	var now = Date.now();
	var elapsed = now - then;

	if (elapsed > fpsInterval) {
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

$(document).ready(function(){

	// (1) What sort of event handler do we need? What can we attach it to?
	$( document ).keypress(function(event) {
  console.log("Keypressed: "+event.charCode);

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

	});
	startAnimating(30);

});
