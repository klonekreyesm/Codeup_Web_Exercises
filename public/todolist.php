
<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db','mkr', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if(isset($_POST['submit'])){
	try{
		if(strlen($_POST['additem'])==0) {
        	throw new Exception('Please enter in an item.');
	        	} elseif(strlen($_POST['additem']) > 240) {
	            	throw new Exception('That item is too big! Please add an item less than 240 characters.');
	    			}


				$stmt = $dbc->prepare('INSERT INTO todo(item) VALUES (:item)'); 

				$stmt->bindValue(':item', $_POST['additem'], PDO::PARAM_STR);
				$stmt->execute();
			} catch(Exception $e) {
		        $error= $e->getMessage();
		     	}
		}
	


if(isset($_POST['done'])){
	$checkbox = $_POST['checkbox'];
	
		for($i=0;$i<count($_POST['checkbox']);$i++){

		$del_id = $checkbox[$i];
		$stmt = $dbc->prepare("DELETE FROM todo WHERE id='$del_id'");
		$stmt->bindValue(':id', $del_id, PDO::PARAM_INT);

		$stmt->execute();
	
	}

}


$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$stmt = $dbc->prepare("SELECT * FROM todo LIMIT 10 OFFSET :offset");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$items =$stmt->fetchAll(PDO::FETCH_ASSOC);

//query to count the number of national parks by fetchColumn()
$count = (int) $dbc->query('SELECT count(id) FROM todo')->fetchColumn();

	$empty_error = "You've got things to do! To get started, please add item to the list!";



?>



<html>
    <head>
    <meta charset="utf-8">
    
    <title>To Do List</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet" media="all">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/todolist_style.css"/>
    </head>

    <body>
       <span> <h1><i class="fa fa-pencil"></i> </span>Things to Do</h1>
       	
       	<div id = "Content">
   		
        <form action="todolist.php" method="POST">
            <div class="checkbox" >
                <!--loop through array $items and output key => value pairs-, refactor to alternate syntax-->
                <ul>
               	<?php foreach ($items as $item) : ?>
                    <label><li class = "pulse-shrink"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $item['id']; ?>"><?= $item['item'] ?>
                </li></label><br><?php endforeach;?>
            	</ul>
           		</div>
            

            <!--error message -->
                <? if($count ==0) : ?>
                    <p><div class="alert alert-success" role="alert">
                        <?= "{$empty_error}" ?>    
                    </p></div>
                <? endif; ?>
                <!--end of error message -->

                <button class="btn btn-warning btn-small" id="donebutton" name="done" value="done">done</button>
        </form>
      </div></div>

      <!-- run fetchColumn to get total parks -->
                <div id="total" ><?php echo "total # of items to complete : ". $count?></div>

                <!--previous button -->
                <?php if($offset != 0):?>
                <a href='?offset=<?=($offset-10);?>'> prev </a>
                <?endif;?>

                <!-- next button -->
                <?if(($offset+10)<$count):?>
                <a href='?offset=<?=$offset+10;?>'> next </a>
                <?endif;?>







            <!--Form to allow items to be added --> 
  		<div id ="addform">
        <h4><label for ="newitem">Add Item to the List</label></h4>
        <form method="POST" action="todolist.php" >
            
            <input type="text" id="newitem" name="additem" placeholder="What needs to be done?">
            <button id="button" class="btn btn-primary" name="submit" value="submit"> + </button>

            <!--error message -->
                <? if(isset($error)): ?>
                    <p><div class="alert alert-danger" role="alert">
                        <?= "{$error}" ?>

                    </p></div>
                <? endif; ?>
                <!--end of error message -->
            </form>
            </p>
         </p></div>
        </div>
            



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
            
    </body>
    </html>



