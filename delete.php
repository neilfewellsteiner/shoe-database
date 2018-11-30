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

$query = strval($_POST["id"]);

        $type   = strval($_POST["sexList"]);
        $brand  = strval($_POST['brandList']);
        $color  = strval($_POST["colorList"]);
        $size   = strval($_POST["sizeList"]);
        $store  = strval($_POST["storeList"]);
        $price  = strval($_POST["price"]);

        $sql = "delete from shoe where " . "$query" . " LIMIT 1";

        if (mysqli_query($conn, $sql)) {
		header('Location: index.html');
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);

?>

