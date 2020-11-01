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
	<?php 

    	
    	$conn = mysqli_connect($serverName, $userName, $password, $dbName);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
	$Bill_ID = mysqli_real_escape_string($conn, $_REQUEST['Bill_ID']);
	$Customer_ID = mysqli_real_escape_string($conn, $_REQUEST['Customer_ID']);
	$amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);
	$Card_No  = mysqli_real_escape_string($conn, $_REQUEST['Card_No']);
	$Card_Name = mysqli_real_escape_string($conn, $_REQUEST['Card_Name']);
	$Expiry_date = mysqli_real_escape_string($conn, $_REQUEST['Expiry_date']);
	$CVV = mysqli_real_escape_string($conn, $_REQUEST['CVV']);
	
	$sql = "INSERT INTO billing (Bill_ID,Customer_ID,amount,card_no,card_name,expiry,CVV) VALUES ('$Bill_ID', '$Customer_ID','$amount','$Card_No', '$Card_Name', '$Expiry_date', '$CVV')";
	
if(mysqli_query($conn, $sql)){
    echo "Transaction is successfull!!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>

<h2>Your Data has been stored successfully</h2>
<h2>Expect Delivery in 10-15 days</h2>
