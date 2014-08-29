// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'orange'; // todo, change this to your favorite color from the list
var message, myfavorite;
// todo: Create a block of if/else statements to check for every color except indigo and violet.

// todo: When a color is encountered log a message that tells the color, and an object of that color.
	if(color =='red'){
		message = color + " is the color of an apple.";
		
		}else if(color=='orange'){
			message = color + " is the color of a tiger. rawr.";
			
		}else if (color =='yellow'){
			message = color + " is the color of a banana.";
			
		}else if (color =='green'){
			message = color + " is the color of a kiwi.";
			
		}else if (color =='blue'){
			message = color + " is the color of the sky.";
// todo: Have a final else that will catch indigo and violet.
// todo: In the else, log: I do not know anything by that color.
	}else{
		message = "I do not know anything about the color " + color + ".";
		console.log(message);
	}

	console.log(message);
	// todo: Using the ternary operator, conditionally log a statement that
	//       says whether the random color matches your favorite color.
	myfavorite=(color==favorite) ? "OH-EM-GEE, THIS COLOR IS MY FAVORITE!!":"";
	console.log(myfavorite);






