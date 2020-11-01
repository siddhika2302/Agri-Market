<?php
	session_start();
    	require 'db.php';
    	require 'menu.php';
?>
<!DOCTYPE HTML>

<html lang="en">
<body>

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
	
	<h2>Welcome to your Crops transaction page..!</h2>
	<h2><?php echo $_POST["Customer_ID"]; ?></h2>
	<h2>The ID of the product that you are buying is given below please verify:</h2>
	<h2><?php echo $_POST["Crop_ID"]; ?></h2><br>
	<?php 


$conn = mysqli_connect($serverName, $userName, $password, $dbName);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

	$trans_IDc = mysqli_real_escape_string($conn, $_REQUEST['Transaction_ID']);
	$Crop_ID = mysqli_real_escape_string($conn, $_REQUEST['Crop_ID']);
	$Farmer_ID = mysqli_real_escape_string($conn, $_REQUEST['Farmer_ID']);
	$Customer_ID = mysqli_real_escape_string($conn, $_REQUEST['Customer_ID']);
	
	$sql = "INSERT INTO crop_transaction (trans_IDc,Customer_ID,Crop_ID,Farmer_ID) VALUES ('$trans_IDc','$Customer_ID', '$Crop_ID','$Farmer_ID' )";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>

	<form action="bill.php" method="post">
	<h2 Please proceed to the payment gateway </h2>
	Bill_ID: <input type="text" name="Bill_ID"><br>
	<input type="submit" value="Send" name="button1" 

                     onclick="return OnButton1();">
	</form>
	
	<script language=javascript>
		function OnButton1()
		{
		    document.Form1.action = "bill.php"    // First target
		    document.Form1.target = "iframe1";    // Open in a iframe
		    document.Form1.submit();        // Submit the page
		    document.Form1.action = "end.php"    // Second target
		    document.Form1.target = "iframe2";    // Open in a iframe
		    document.Form1.submit();        // Submit the page
		    return true;
		}
	</script>
<div style="visibility:hidden">
<iframe NAME="iframe1" WIDTH="40" HEIGHT="40"></iframe>
<iframe NAME="iframe2" WIDTH="40" HEIGHT="40"></iframe>
</div>
</body>
</html>


	
	
	
	
	
