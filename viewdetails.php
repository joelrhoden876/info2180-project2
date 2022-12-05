<?php

$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';

/* This is getting the id from the url. */
$id = $_GET["id"];


/* This is connecting to the database. */
$link = mysqli_connect($host, $username, $password, $dbname);
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

/* This is checking the database for the id that is passed in the url. */
else{
	$sql_check = "SELECT * FROM contacts WHERE id={$id}" ;
	$result = mysqli_query($link,$sql_check);
}

// function getContact($id){
//     $sql= "select * from contacts where id={$id}"
//     $stmt= 
// }


?>


<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>View Details</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<link rel="stylesheet" href="dashboard.css">
		</head>
	<body>
		<?php include 'header.php';?>
		<div class="container">
			<div class="back">
				<div class="buttons">
					<div><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcontact.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Contact</a></div>
					<div><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i>Users</a></div>
					<hr>
					<div><a href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
           
                <?php foreach ($result as $customer): ?>
                
                    <h1><?= $customer['firstname']." ".$customer['lastname']; ?></h1>
                    <!-- <td><?= $customer['email']; ?></td>
                    
                    <td><?= $customer['created_at']; ?></td> -->
                
                <?php endforeach; ?>
                
			</div>
		</div>
	</body>
</html>