<!DOCTYPE html>
 <!-- This HTML file serves as the result page from adding a shoe to the inventory-->
<html>
    <head>
        <title>CWRU Shoes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/searchShoeResultStyle.css"/>
    </head>   
    <body>
        <div class="grid">
            <div class="title">
                <h1>CWRU Shoes</h1><br><br>
                <p>Est. 2018, CWRU Shoes is the premier search method for finding shoe deals around Case Western's campus</p>
            </div>
            <div class="nav1">
                <button onclick="location.href='searchShoe.html'" type="browseButton">Browse The Inventory</button>
            </div>
            <div class="nav2">
                <button onclick="location.href='index.html'" type="homeButton">Go To Home</button>
            </div>
            <div class="nav3">
                <button onclick="location.href='addShoe.html'" type="addButton">Add To The Inventory</button>
            </div>
            <div class="content">
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

	if (mysqli_num_rows($result) > 0) 
?>
<table id = "shoeList"">
        <thead>
            <tr>
                <th style="padding-right:40px;">Size</th>
                <th style="padding-right:40px;">Brand</th>
                <th style="padding-right:40px;">Store</th>
                <th style="padding-right:40px;">Color</th>
		<th style="padding-right:40px;">Sex</th>
		<th style="padding-right:40px;">Price</th>
  		<th style="padding-right:40px;">Delete</th>
		<th style="padding-right:40px;">Update</th>

            </tr>
        </thead>
        <tbody>
<?php
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) : ?>


            <tr>
                <td class="updateSize" style="padding-right:40px;"><?php echo $row["size"]; ?></td>
                <td class="updateBrand" style="padding-right:40px;"><?php echo $row["brand_name"]; ?></td>
                <td class="updateStore" style="padding-right:40px;"><?php echo $row["store_name"]; ?></td>
                <td class="updateColor" style="padding-right:40px;"><?php echo $row["color"]; ?></td>
		<td class="updateSex" style="padding-right:40px;"><?php echo $row['type']; ?></td>
                <td class="updatePrice" style="padding-right:40px;"><?php echo $row["price"]; ?></td>
		<?php
			$ec = " AND brand_name='$row[brand_name]' AND store_name='$row[store_name]' AND color='$row[color]' AND type='$row[type]' AND price='$row[price]'"; ?>
                <td class="deleteRow" style="padding-right:40px;">
			<form action="delete.php" method="post">
				<input type="hidden" name="id" value="<?php echo 'size =' . $row['size'] . $ec; ?>">
        			<input type="submit" name="submit" value="Delete">
			</form></td>

		<td class="updateRow" style="padding-right:40px;">
			<input type="submit" name="submit" value="Update">
		</td>

</tr>

        <?php endwhile; ?>

        </tbody>
    </table>
</div>
            <div class="footer">
                <p>Copyright by Cwalina, Kao, Krishna, Steiner 2018</p>
            </div>
        </div>
    </body>
</html>
