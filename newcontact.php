<?php session_start();
	//require("customer_class.php");

	if (isset($_POST['title']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['company']) && isset($_POST['assigned-to']) && isset($_POST['type'])){
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$company = $_POST['company'];
		$type = $_POST['type'];
		$assignedUser = $_POST['assigned-to'];

		$link = mysqli_connect('localhost', 'admin', 'password123', 'dolphin_crm');
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		$sql = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to) VALUES
            ('$title', '$fname', '$lname', '$email', '$telephone', '$company', '$type', '$assignedUser')";

		if(mysqli_query($link, $sql)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	
	mysqli_close($link);
	}

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dolphin CRM</title>
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
				<div class="records">
					<h1>New Contact</h1>
					<div class="record2">
						<!-- <form method="post" id="form" onsubmit="popup()" action="addcontact.php">  -->
							<form method = "post" action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							<div class="cell">	
								<label for="title">Title</label><br>
								<select id="title" name="title">
									<option value="Mr.">Mr</option>
									<option value="Mrs.">Mrs</option>
									<option value="Ms.">Ms</option>
								</select>
							</div>
							<div class="table">
								<div class="cell">
									<label for="fname">First Name</label>
									<input type="text" name="fname" id="fname" required/>
								</div>
								<div class="cell">
									<label for="lname">Last Name</label>
									<input type="text" name="lname" id="lname" required/>
								</div>
							</div>
							<div class="table">
								<div class="cell">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" required/>
								</div>
								<div class="cell">
									<label>Telephone</label>
									<input type="text" name="telephone" id="telephone" required/>
								</div>
							</div>
                            <div class="table">
								<div class="cell">
									<label>Company</label>
									<input type="text" name="company" id="company" required/>
								</div>
								<div class="cell">
								<label for="type"> Type</label><br>
								<select id="type" name="type">
									<option value="Sales Lead">Sales Lead</option>
									<option value="Sales Support">Sales Support</option>
								</select>
							</div><br>
							</div>
							<div class="cell">
								<label for="assigned-to">Assigned To</label><br>
								<select id="assigned-to" name="assigned-to">
									<option value="Joel Rhoden">Joel Rhoden</option>
									<option value="Rohena Black"> Rohena Black</option>
								</select>
							</div><br>
							<div class="save-button">
								<button type="submit" id="save">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
