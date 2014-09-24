<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db','mkr', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// // Create the query and assign to var
// $query = 'CREATE TABLE national_parks(
//     id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//     name VARCHAR(50) NOT NULL,
//     location VARCHAR(240) NOT NULL,
//     date_established DATE NOT NULL,
//     area_in_acres INT NOT NULL,
//     park_description TEXT NOT NULL,
//     PRIMARY KEY (id)
// )';

//$dbc->exec($query);

 	$parks= [
 	    ['name' => 'Acadia', 'location' => 'Maine' , 'date_established' => 19190226, 'area_in_acres' => 47389, 'park_description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.'],
 	    ['name' => 'American Samoa', 'location' => 'American Samoa' , 'date_established' => 19881031, 'area_in_acres' => 9000, 'park_description' => 'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish.'],
 	    ['name' => 'Arches', 'location' => 'Utah' , 'date_established' => 19711112, 'area_in_acres' => 76518, 'park_description' =>'The parks Waterpocket Fold is a 100-mile (160 km) monocline that exhibits the Earths diverse geologic layers. Other natural features are monoliths, sandstone domes, and cliffs shaped like the United States Capitol.'],
 	    ['name' => 'Badlands', 'location' => 'South Dakota' , 'date_established' => 19781110, 'area_in_acres' => 242755, 'park_description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.'],
 	    ['name' => 'Big Bend', 'location' => 'Texas' , 'date_established' => 19440612, 'area_in_acres' => 801163, 'park_description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the worlds richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.'],
 	    ['name' => 'Biscayne', 'location' => 'Florida' , 'date_established' => 19800628, 'area_in_acres' => 172924, 'park_description' =>'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders'],
 	    ['name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado' , 'date_established' => 19991021, 'area_in_acres' => 32950, 'park_description' => 'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian Manatee, American crocodile, various sea turtles, and peregrine falcon.'],
 	    ['name' => 'Bryce Canyon', 'location' => 'Utah' , 'date_established' => 19280225, 'area_in_acres' => 35835, 'park_description' => 'The park protects a quarter of the Gunnison River, which slices sheer canyon walls from dark Precambrian-era rock. The canyon features incredibly steep descents, and is a popular site for river rafting and rock climbing. The deep, narrow canyon, made of gneiss and schist, is often in shadow and therefore appears black.'],
 	    ['name' => 'Capitol Reef', 'location' => 'Utah' , 'date_established' => 19711218, 'area_in_acres' => 241904, 'park_description' => 'Bryce Canyon is a giant geological amphitheater on the Paunsaugunt Plateau. The unique area has hundreds of tall sandstone hoodoos formed by erosion. The region was originally settled by Native Americans and later by Mormon pioneers.'],
 	    ['name' => 'Carlsbad Caverns', 'location' => 'New Mexico' , 'date_established' => 19300514, 'area_in_acres' => 38856, 'park_description' =>'This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples.'],
 	    ];
	  
 		$stmt = $dbc->prepare('INSERT INTO national_parks(name, location, date_established, area_in_acres, park_description) VALUES (
 			:name, :location, :date_established, :area_in_acres, :park_description)');

		foreach ($parks as $parkinfo) {
		    $stmt->bindValue(':name', $parkinfo['name'], PDO::PARAM_STR);
		    $stmt->bindValue(':location', $parkinfo['location'], PDO::PARAM_STR);
		    $stmt->bindValue(':date_established', $parkinfo['date_established'], PDO::PARAM_STR);
		    $stmt->bindValue('area_in_acres', $parkinfo['area_in_acres'], PDO::PARAM_INT);
		    $stmt->bindValue('park_description', $parkinfo['park_description'], PDO::PARAM_STR);

		    $stmt->execute();
		  
		}
 	   

 ?>
