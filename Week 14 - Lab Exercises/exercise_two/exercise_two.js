
// (1) We will need a (global) array - how do we declare one? What should it be called?

var fpsInterval;
var then;
		
function startAnimating(fps)
{
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}
		
function animate() {
		
	requestAnimationFrame(animate);
	
	var now = Date.now();
	var elapsed = now - then;
	
	if (elapsed > fpsInterval) {
		then = now - (elapsed % fpsInterval);
		
		var cvs = $("canvas").get(0);
		var ctx = cvs.getContext("2d");
		ctx.clearRect(0, 0, cvs.width, cvs.height);

		// (4) What do we need to draw?
		
	}
	
				
}

$(document).ready(function(){

	// (2) What sort of events do we need? What do we need to do in each different event?

			
	// (3) What do we need to do when the event is triggered?
		
		
	startAnimating(30);
		
});
