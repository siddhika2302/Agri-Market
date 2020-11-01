<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
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

    <body>

        <?php
            require 'menu.php';
        ?>

        <section id="one" class="wrapper style1 align">
            <div class="inner">
                <div class="box">
                <header>
                    <center>
                    <span><img src="<?php echo 'images/profileImages/profile0.png'; ?>" class="image-circle" class="img-responsive" height="200%"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
                    
                    <div>
                            <b><font size="+2" color="black">Login ID : </font></b>
                            <font size="+2" style="color: black;"><?php echo $_SESSION['UserID'];?></font>
                    </div>
                   </br>
                   </br> 
                </center>
                </header>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <b><font size="+2" color="black">Email ID : </font></b>
                            <font size="+2"><?php echo $_SESSION['Email'];?></font>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <b><font size="+2" color="black">Mobile No : </font></b>
                            <font size="+2"><?php echo $_SESSION['Mobile'];?></font>
                        </div>
                        <div class="col-sm-3">
                            <b><font size="+2" color="black">City : </font></b>
                            <font size="+2"><?php echo $_SESSION['City'];?></font>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                        <div class="12u$">
                            <center>
                                <div class="row uniform">
                                    <div class="2u 12u$(large)">
                                        <a href="profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a>
                                    </div>
                                    <div class="2u 12u$(large)">
					 <a href="uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">Upload Product</a>
            			     </div>
            			     <div class="2u 12u$(large)">
                                        <a href="machine.php" class="btn btn-danger" style="text-decoration: none;">Buy Machines</a>
                                    </div>
                                    <div class="2u 12u$(large)">
                                        <a href="fertilizer.php" class="btn btn-danger" style="text-decoration: none;">Buy Fertilizers</a>
                                    </div>
                                    <div class="2u 12u$(large)">
                                        <a href="Login/logout.php" class="btn btn-danger" style="text-decoration: none;">LOG OUT</a>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>



    </body>
</html>
