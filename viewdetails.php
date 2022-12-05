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
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                    <div class="cust_Name">
                        <ul>
                            <li>
                                <i class='fas fa-user-circle' style='font-size:40px; position:relative;'> <?= $customer['title']." ".$customer['firstname']." ".$customer['lastname']; ?> </i>
                            </li>
                        </ul>
                        <p>
                            Created on  <?= $customer['created_at']; ?> by  <?= $customer['created_by']; ?> <br>
                            Updated on  <?= $customer['updated_at']; ?>
                        </p>
                    </div>
                    
                    <div class="grid-container">
                        <div class="grid-item">
                            <p class="grid-item-txt">Email</p>
                            <p><?= $customer['email']; ?></p>
                        </div>
                        <div class="grid-item">
                            <p class="grid-item-txt">Telephone</p>
                            <p><?= $customer['telephone']; ?></p>
                        </div>
                        <div class="grid-item">
                            <p class="grid-item-txt">Company</p>
                            <p><?= $customer['company']; ?></p>
                        </div>
                        <div class="grid-item">
                            <p class="grid-item-txt">Assigned To</p>
                            <p><?= $customer['assigned_to']; ?></p>
                    </div>
        </div>
                <?php endforeach; ?>
                
			</div>
		</div>
	</body>
</html>