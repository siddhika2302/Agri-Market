<?php 

	session_start();
    	require 'db.php';
    	require 'menu.php';
    	
    	
?>
<!DOCTYPE HTML>

<html lang="en">
<body >

	 <head>
        <title>Profile: <?php echo $_SESSION['Name']; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
        <meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</head>
	
	<h2>Welcome To your payment gateway</h2><br>
	<h3>Your Bill_ID is <?php echo $_POST["Bill_ID"]; ?></h3><br>
	<p>Please fill in the below details</p><br>
	
	
	<form action="end.php" method="post">
	<p>To proceed further fill the form below.</p>
	Bill_ID: <input type="text" name="Bill_ID"><br>
	Customer_ID: <input type="text" name="Customer_ID"><br>
	Amount: <input type="text" name="amount"><br>
	Card_No: <input type="text" name="Card_No"><br>
	Card_Name: <input type="text" name="Card_Name"><br>
	Expiry_date: <input type="text" name="Expiry_date"><br>
	CVV: <input type="text" name="CVV"><br>
	<input type="submit" name="Pay">  
	
</body>
</html>
	
	
