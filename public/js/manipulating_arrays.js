

// Create an array holding the names of the planets of our solar system
//starting closest to the sun
var planets = ["Mercury",
				"Venus", 
				"Earth", 
				"Mars", 
				"Jupiter", 
				"Saturn", 
				"Uranus", 
				"Neptune"];

// function for logging the planets array
function logPlanets() {
    console.log('Here is the list of planets:');
    console.log(planets);
}

console.log('Adding "The Sun" to the beginning of the planets array.');
	planets.unshift("THE ALMIGHTY SUN");
	console.log(planets);

console.log('Adding "Pluto" to the end of the planets array.');
	planets.push("Pluto");
	console.log(planets);

console.log('Removing "The Sun" from the beginning of the planets array.');
	planets.shift();
	console.log(planets);

console.log('Removing "Pluto" from the end of the planets array.');
	planets.pop();
	console.log(planets);

console.log('Finding and logging the index of "Earth" in the planets array.');
	var Earthindex = planets.indexOf("Earth");
	console.log("The index of Earth is " + index);

console.log('Using splice to remove the planet after Earth.');
	var afterEarth = planets.splice(planets.indexOf("Earth")+1,1);
	console.log(planets);
	

console.log('Using splice to add back the planet after Earth.');
	planets.splice(earthIndex+1,0,afterEarth[0]);
	console.log(planets);
	

console.log('Reversing the order of the planets array.');
	planets.reverse();
	console.log(planets);
	

console.log('Sorting the planets array.');
	planets.sort();
	console.log(planets);
	