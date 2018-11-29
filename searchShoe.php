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

	$sql = "select * from shoe where brand_name='$brand' AND store_name='$store' AND size='$size' AND color='$color' AND type='$type'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "size: " . $row["size"]. " - Brand: " . $row["brand_name"].   " - Store: " . $row["store_name"].  " - color: " . $row["color"]. " - Sex: " . $row["type"].  "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
