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
	 $query=$_POST['updateId'];
	 $init_price=$_POST['priceVal'];
	 $priceUpdate=$_POST['updatePrice'];

	$sql = "UPDATE shoe SET price= '$priceUpdate' WHERE " . $query;

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

if (mysqli_query($conn, $sql)) {
		echo "<h1>Shoe Updated Successfully!!</h1>";
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>

            <div class="footer">
                <p>Copyright by Cwalina, Kao, Krishna, Steiner 2018</p>
            </div>
        </div>
    </body>
</html>
