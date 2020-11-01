<?php
    session_start();
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

    <body class="subpage">

        <?php
            require 'menu.php';
        ?>

        <section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
            <div class="inner">
                <div class="box">
                <header>
                    <span class="image left">
                    <img src="<?php echo 'images/profileImages/profile0.png'; ?>" class="image-circle" class="img-responsive" height="200%"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
                    <h4><?php echo $_SESSION['UserID'];?></h4>
                    <br>
                    <form method="post" action="Profile/updatePic.php" enctype="multipart/form-data">
                        <input type="file" name="profilePic" id="profilePic">
                        <br>
                        <div class="12u$">
                            <input type="submit" class="button special small" name="upload" value="Upload" />
                            <input type="submit" class="button special small" name="remove" value="Remove" />
                        </div>
                    </form>
                </header>
                <form method="post" action="Profile/updateProfile.php">
                    <div class="row uniform">
                        <div class="8u 12u$(xsmall)">
                            <input type="text" name="Name" id="Name" value="<?php echo $_SESSION['Name'];?>" placeholder="Full Name" required />
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <input type="text" name="Mobile" id="Mobile" value="<?php echo $_SESSION['Mobile'];?>" placeholder="Mobile No" required/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="UserID" id="Login_ID" value="<?php echo $_SESSION['UserID'];?>" placeholder="Username" required/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="email" name="Email" id="Email" value="<?php echo $_SESSION['Email'];?>" placeholder="Email" required/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <div class="select-wrapper">
                              <select name="section" id="section">
                                    <option value="<?php echo "section";?>"><?php echo 'Section';?></option>
                                    <option value="Band">Band</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Drama">Poetry</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Decoration">Decoration</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="post" id="post"  placeholder="Post Name" required/>
                        </div>
                        
                        <p>
                            <b>Education: </b>
                        </p>
                        <div class="3u 12u$(small)">
                            <input type="radio" id="diploma" name="edu" value="Diploma" checked>
                            <label for="Diploma">Diploma</label>
                        </div>
                        <div class="3u 12u$(small)">
                            <input type="radio" id="btech" name="edu" value="B.TECH">
                            <label for="btech">B.TECH</label>
                        </div>
                        <div class="3u 12u$(small)">
                            <input type="radio" id="mtech" name="edu" value="M.TECH">
                            <label for="mtech">M.TECH</label>
                        </div>
                        <div class="4u 12u$(xsmall)">
                        	<input type="text" placeholder="University" required/>
                        </div>
                        <div class="4u 12u$(xsmall)">
                        	<input type="text"  placeholder="Percent" required/>
                        </div> 
                                    
                        <div class="12u$">
                        <center>
                            <input type="submit" class = "button special" value="Update Profile" />
                        </center>
                        </div>
                    </div>
                </form>
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
