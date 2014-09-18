<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=national_parks','mkr', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create the query and assign to var
$query = 'CREATE TABLE national_parks(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    location VARCHAR(240) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres INT NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($query);

	
?>
