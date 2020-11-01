<?php

	session_start();
    	require 'db.php';
    	require 'menu.php';
echo "<h2>Fertilizer Table</h2>";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Fertilizer_ID</th><th>Fertilizer_name</th><th>Component</th><th>price</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
} 

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT Fertilizer_ID,Fertilizer_name,Component,price FROM Fertilizer");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
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
	
	<form action="fertilizer_t.php" method="post">
	Fertilizer_ID: <input type="text" name="Fertilizer_ID"><br>
	Customer_ID: <input type="text" name="Customer_ID"><br>
	Transaction_ID: <input type="text" name="Transaction_ID"><br>
	<input type="submit">
	
	</form>
</body>	
</html>


