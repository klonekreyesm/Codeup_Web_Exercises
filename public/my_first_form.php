<?php 

	var_dump($_POST);
	var_dump($_GET);

	?>

	<html>
	<head>
			<title>My First Form</title>
	</head>
	<body>


		<form method="POST">
			<p>
				<label for="first_name">First Name</label>
				<input type="text" name="first_name" id="first_name"/>
			</p>
			<p>
				<label for ="last_name">Last Name</label>
				<input type="text" name="last_name" id="last_name"/>
			</p>
				<input type ="submit"/>
		</form>


	</body>
	</html>


