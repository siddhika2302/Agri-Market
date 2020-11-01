<?php
 	session_start();
	require 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$Cropname = $_POST['Crop_name'];
		$CropID = $_POST['Crop_ID'];
		$Quantity = $_POST['Quantity_in_kgs'];
		$Price = $_POST['Price'];
		$Farmer_ID = $_POST['UserID'];

		$sql = "INSERT INTO Crop (Crop_ID, Crop_name, Quantity_in_kgs)
			   VALUES ('$CropID', '$Cropname', '$Quantity')";
		$sql2 = "INSERT INTO sell_crop (Crop_ID, Farmer_ID, Price)
			   VALUES ('$CropID', '$Farmer_ID', '$Price')";
		$result = mysqli_query($conn, $sql);
		$result2 = mysqli_query($conn, $sql2);
		if(!$result)
		{
			$_SESSION['message'] = "Unable to upload Product !!!";
			header("Location: uploadProduct.php");
		}
		else {
			$_SESSION['message'] = "successfull !!!";
		}
	}

	function dataFilter($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agri-Market</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<link rel="stylesheet" href="login.css"/>
		<link rel="stylesheet" type="text/css" href="indexFooter.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
	</head>
	<body>

		<?php require 'menu.php'; ?>

		<!-- One -->

			<section id="one" class="wrapper style1 align-center">
				<div class="container">
					<form method="POST" action="uploadProduct.php" enctype="multipart/form-data">
						<h2>Enter the Product Information here..!!</h2>
						<br>
				<center>
					<input type="file" name="productPic"></input>
					<br />
				</center>
				<div class="row">
					  <div class="col-sm-6">
						  <div class="select-wrapper" style="width: auto" >
							  <select name="type" id="type" required style="background-color:white;color: black;">
								  <option value="" style="color: black;">- Category -</option>
								  <option value="Fruit" style="color: black;">Fruit</option>
								  <option value="Vegetable" style="color: black;">Vegetable</option>
								  <option value="Grains" style="color: black;">Grains</option>
							  </select>
						</div>
					  </div>
					  <div class="col-sm-6">
						<input type="text" name="Crop_name" id="Crop_name" placeholder="Crop Name" style="background-color:white;color: black;" />
					  </div>
				</div>
				<br>
				<div>
					<textarea  name="pinfo" id="pinfo" rows="12"></textarea>
				</div>
				
			<br>
			<div class="row">
				<div class="col-sm-6">
					  <input type="text" name="Crop_ID" id="Crop_ID" value="" placeholder="CropID" style="background-color:white;color: black;" />
				</div>
				<div class="col-sm-6">
					  <input type="text" name="Quantity_in_kgs" id="Quantity" value="" placeholder="Quantity" style="background-color:white;color: black;" />
				</div>
				<div class="col-sm-6">
					  <input type="text" name="Price" id="price" value="" placeholder="Price" style="background-color:white;color: black;" />
				</div>
				<div class="col-sm-6">
					  <input type="text" name="UserID" id="Farmer_ID" value="" placeholder="Your ID" style="background-color:white;color: black;" />
				</div>
				<div class="col-sm-6">
					<button class="button fit" style="width:auto; color:black;">Submit</button>
				</div>
			</div>
			</form>
		</div>
	</section>

		<script>
			 CKEDITOR.replace( 'pinfo' );
		</script>
	</body>
</html>
