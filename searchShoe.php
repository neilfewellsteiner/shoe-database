<?php
	$sexL = $_POST['sexList'] .",";
	$brandL = $_POST['brandList'] . ",";
	$colorL = $_POST['colorList'] . ",";
	$sizeL = $_POST['sizeL'] . ",";
	$storeL = $_POST['storeL'] . ",";

	// Open the text file
	$file = fopen("searchResult.html", "w+");
	ftruncate($file, 0); //Clear the file to 0bit

	$content = $sexL. $brandL. $colorL. $sizeL. $storeL;
	// Write text

	// Close the text file
	fwrite($file , $content); //Now lets write it in there
	fclose($file );

    die(header("Location: ".$_SERVER["HTTP_REFERER"]));
?>