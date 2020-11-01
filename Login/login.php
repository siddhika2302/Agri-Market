<?php
    session_start();

    $user = dataFilter($_POST['Login_ID']);
    $pass = $_POST['Password'];
    $category = dataFilter($_POST['category']);

    require '../db.php';

if($category == 1)
{
    $sql = "SELECT * FROM Farmer WHERE Farmer_ID='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

   
        $User = $result->fetch_assoc();

            $_SESSION['UserID'] = $User['Farmer_ID'];
            $_SESSION['Password'] = $User['password'];
            $_SESSION['Email'] = $User['Email_ID'];
            $_SESSION['Name'] = $User['Farmer_name'];
            $_SESSION['Mobile'] = $User['Mobile_no'];
            $_SESSION['City'] = $User['City'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 1;

            header("location: profile.php");
       
}

else
{
    $sql = "SELECT * FROM Customer WHERE Customer_ID='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

        $User = $result->fetch_assoc();

            $_SESSION['UserID'] = $User['Customer_ID'];
            $_SESSION['Password'] = $User['Password'];
            $_SESSION['Email'] = $User['Email_ID'];
            $_SESSION['Name'] = $User['Customer_name'];
            $_SESSION['Mobile'] = $User['Mobile_no'];
            $_SESSION['City'] = $User['City'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 0;


            header("location: profile.php");
}

    function dataFilter($data)
    {
    	$data = trim($data);
     	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
      	return $data;
    }

?>
