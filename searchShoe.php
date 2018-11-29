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

	$whereVal = " where ";
	$brandVal = "brand_name='$brand' ";
	$storeVal = "AND store_name='$store' ";
	$sizeVal  = "AND size='$size' ";
	$colorVal = "AND color='$color' ";
	$typeVal  = "AND type='$type' ";

	if($brand=="blank"){$brandVal = ""; $storeVal = "store_name='$store' ";};
	if($store=="blank"){$storeVal = ""; $sizeVal = "size='$size' ";};
	if($size=="blank"){$sizeVal = ""; $colorVal = "color='$color' ";};
	if($color=="blank"){$colorVal = ""; $typeVal = "type='$type' ";};
	if($type=="blank"){$typeVal = "";};

	if($brand=="blank" && $store=="blank" && $size=="blank" && $color=="blank" && $type=="blank")
	{$whereVal = "";};

	$sql = "select * from shoe" . $whereVal . $brandVal . $storeVal . $sizeVal . $colorVal . $typeVal;

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "size: " . $row["size"]. " - Brand: " . $row["brand_name"].   " - Store: " . $row["store_name"].  " - color: " . $row["color"]. " - Sex: " . $row["type"]. " - Price: ". $row["price"] . "<br>";
    }
} else {
    echo $sql;
}

mysqli_close($conn);

?>
