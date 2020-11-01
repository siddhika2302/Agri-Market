<?php
    session_start();
    require '../db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = dataFilter($_POST['Name']);
        $mobile = dataFilter($_POST['Mobile']);
        $user = dataFilter($_POST['Login_ID']);
        $email = dataFilter($_POST['Email']);

        $_SESSION['Email'] = $email;
        $_SESSION['Name'] = $name;
        $_SESSION['Login_ID'] = $user;
        $_SESSION['Mobile'] = $mobile;

    }
    $id = $_SESSION['Login_ID'];

    $sql = "UPDATE Farmer SET Farmer_name='$name', Mobile_no='$mobile', Email_ID='$email' WHERE Farmer_ID='$id';";

    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $_SESSION['message'] = "Profile Updated successfully !!!";
        header("Location: ../profileView.php");
    }
    else
    {
        $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
        header("Location: ../Login/error.php");
    }

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
