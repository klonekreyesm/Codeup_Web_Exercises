<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db','mkr', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

//create query to select which information in the database you would like to use
$stmt = $dbc->query("SELECT name, location, area_in_acres, date_established, id FROM national_parks LIMIT 4 OFFSET $offset");

$parks =$stmt->fetchAll(PDO::FETCH_ASSOC);

//query to count the number of national parks by fetchColumn()
$count = (int) $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();

//query to hold total number of national parks in database 
$total_parks = $dbc->query('SELECT count(*) FROM national_parks');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>National Parks</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style = "padding: 30px">
    <h1>National Parks</h1>
        <div>
            <table class ="table table-bordered">
            <th>Park Name</th>
            <th>Location</th>
            <th>Area(acres)</th>
            <th>Date</th>
                <!--foreach loop to iterate through query and create table -->
                <?php foreach ($parks as $parkinfo) : ?>
                <tr>
                    <td><?= $parkinfo['name']; ?></td>
                    <td><?= $parkinfo['location']; ?></td>
                    <td><?= $parkinfo['area_in_acres'];?></td>
                    <td><?= $parkinfo['date_established'];?></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
                <!-- run fetchColumn to get total parks -->
                <?php echo "Total # of national parks ". $total_parks->fetchColumn()?>

                <!--previous button -->
                <?php if($offset != 0):?>
                <a href='?offset=<?=($offset-4);?>'> prev </a>
                <?endif;?>
                <!-- next button -->
                <?if(($offset+4)<$count):?>
                <a href='?offset=<?=$offset+4;?>'> next </a>
                <?endif;?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
 
