<?php
$servername = 'localhost:3306';
$username = 'team7';
$password = 'Team_7';
$dbname = 'shoes';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

	$type   = strval($_POST["sexList"]);
        $brand  = strval($_POST['brandList']);
        $color  = strval($_POST["colorList"]);
        $size   = strval($_POST["sizeList"]);
        $store  = strval($_POST["storeList"]);
	$price	= strval($_POST["price"]);

	$sql = "insert into shoe(brand_name, store_name, size, color, price, type) values('$brand', '$store', '$size', '$color', '$price', '$type')";

	if (mysqli_query($conn, $sql)) {
		header('Location: addShoeResult.html');
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

mysqli_close($conn);

?>
