// Much of what you can see in this file is similar to that in exercise_one.js
// Make sure you compare this file to that file, to see what you can learn from it
// Some really crucial lines of code are missing - can you work out what they should be?

$(document).ready(function(){
	// (1) What needs to go in here?
});
		
var fpsInterval;
var then;
		
function startAnimating(fps)
{
	fpsInterval = 1000/fps;
	then = Date.now();
	animate();
}
		
var i = 0;
var j = 0;
var fps = 60;
var cells = 10;
		
function animate() {
		
	// (2) How do we ensure that the animate method is called repeatedly?


	var now = Date.now();
	var elapsed = now - then;
	
	if (elapsed > fpsInterval)
	{
		then = now - (elapsed % fpsInterval);
		
		var cvs = $("canvas").get(0);
		var ctx = cvs.getContext("2d");
					
		// (3) How do we clear the canvas?
					
		// ----
					
		// This is a really clever bit of code, that divides our large canvas (400x400 individual pixels) up
		// into a grid of 'cells' instead.  This makes it more manageable for us when we're working with graphics.
		
		// We can draw squares at any position of our grid using the i and j coordinates we stored earlier, and using this
		// simple calculation.  We stated in our cells variable that we want to have a 10x10 grid (each cell being 40x40 pixels)
		// and so we use this code to do that calculation.
		
		// Checking the value of the variables here, we know that:
		// cvs.width will be 400 (from the HTML)
		// cvs.height will be 400 (from the HTML)
		// cells is 10 (we can see that above)
		
		// Let's run through some examples...
		
		// If we draw a rectangle at i = 0, and j = 0, the rectangle will start at (0*(400/10),0*(400/10)), and be (400/10),(400/10)
		// Working that out, the rectangle will be drawn at (0, 0) and be (40, 40) in size.
		
		// If we draw a rectangle at i = 1, and j = 0, the rectangle will start at (1*(400/10),0*(400/10)), and be (400/10),(400/10)
		// Working that out, the recantgle will be drawn at (40, 0) and be (40, 40) in size - that's one position to the right in our grid.
		
		// If we make any changes to the size of the canvas, or the number of cells in our grid, this drawing code does not need to change.
		// It will always adapt.
		
		// Similarly, we can draw rectangles (or squares) at any position in our grid (from 0 to 9) simply by using the same code below,
		// and changing what the values of i and j are.
		
		ctx.fillRect(	i*(cvs.width/cells),
						j*(cvs.height/cells),
						cvs.width/cells,
						cvs.height/cells);				
						
		// You might find this a tricky concept at first, but it's really important to get to grips with this for the assignment.
		// Follow it through carefully, tracking the variables, and try changing the values a few times, until you can see what
		// is going on.
					
		// ----			
					
		// (4) How do we update our variables to create the animation we want?
		
	}			
		
}