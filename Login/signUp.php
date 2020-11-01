<?php
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = dataFilter($_POST['Name']);
	$mobile = dataFilter($_POST['Mobile']);
	$user = dataFilter($_POST['Login_ID']);
	$email = dataFilter($_POST['Email']);
	$password = dataFilter(password_hash($_POST['Password'], PASSWORD_BCRYPT));
	$category = dataFilter($_POST['category']);
	$city = dataFilter($_POST['City']);

	$_SESSION['Email'] = $email;
	$_SESSION['Name'] = $name;
	$_SESSION['Password'] = $password;
	$_SESSION['UserID'] = $user;
	$_SESSION['Mobile'] = $mobile;
	$_SESSION['Category'] = $category;
	$_SESSION['City'] = $city;
}


require '../db.php';

if($category == 1)
{
    $sql = "SELECT * FROM Farmer WHERE Email_ID='$email'";

    $result = mysqli_query($conn, "SELECT * FROM Farmer WHERE Email_ID='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else
    {
    	$sql = "INSERT INTO Farmer(Farmer_ID, Farmer_name ,Mobile_no, Email_ID, City, Password)
    			VALUES ('$user','$name','$mobile','$email','$city','$password')";

    	if (mysqli_query($conn, $sql))
    	{
            $_SESSION['logged_in'] = true;
            
            $sql = "SELECT * FROM Farmer WHERE Farmer_ID='$user'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['Farmer_ID'];


            $_SESSION['message'] =

                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $message_body = "
            Hello '.$user.',

            Thank you for signing up!";
            
            header("location: profile.php");


    	}
    	else
    	{
    	    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	    $_SESSION['message'] = "Registration failed!";
            header("location: error.php");
    	}
    }
}

else
{
    $sql = "SELECT * FROM Customer WHERE Email_ID='$email'";

    $result = mysqli_query($conn, "SELECT * FROM Customer WHERE Email_ID='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        //echo $_SESSION['message'];
        header("location: error.php");
    }
    else
    {
    	$sql = "INSERT INTO Customer(customer_ID,Customer_name,mobile_no,email_ID,city,password)
    			VALUES ('$user','$name','$mobile','$email','$city', '$password')";

    	if (mysqli_query($conn, $sql))
    	{
            $_SESSION['logged_in'] = true;

            $sql = "SELECT * FROM buyer WHERE busername='$user'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['Customer_ID'];

            $_SESSION['message'] =

                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $message_body = "
            Hello '.$user.',

            Thank you for signing up!";
            
            header("location: profile.php");
    	}
    	else
    	{
    	    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	    $_SESSION['message'] = "Registration not successfull!";
            header("location: error.php");
    	}
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
