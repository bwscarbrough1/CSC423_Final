<?php
if (isset($_POST['submit']))
{
	$vendorName = $_POST['vendorName'];
	$vendorItemName = $_POST['vendorItemName'];
	$vendorCurrentPrice = $_POST['vendorCurrentPrice'];
	$priceUnitIndicator = $_POST['priceUnitIndicator'];
	$vendorDescription = $_POST['vendorDescription'];
	$vendorItemNumber = $_POST['vendorItemNumber'];
	$preferredVendor = $_POST['preferredVendor'];
	$date = (new \DateTime())->format('Y-m-d H:i:s');

	$config = include('./inc/config.php');
	$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
	if($conn->connect_errno)
	{
		echo "Error: Failed to make a MySQL connection, here is why: \n";
		echo "Errno: " . $conn->connect_errno . "\n";
		echo "Error: " . $conn->connect_error . "\n";
		exit;
	}

	$query =    "Insert into VendorInventoryItemType (VendorName, InventoryItemTypeName, VendorsDescription, 
			CurrentPrice, PriceUnitIndicator, DateOfLastUpdate, VendorsItemNumber, PreferredVendor) ".
                    "values ('$vendorName', '$vendorItemName', '$vendorDescription', '$vendorCurrentPrice', 
			'$priceUnitIndicator', '$date', ' $vendorItemNumber', '$preferredVendor')";
	
	$result = $conn->query($query);
	if(!$result)
	{
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $query . "\n";
		echo "Errno: " . $conn->errno . "\n";
		echo "Error: " . $conn->error . "\n";
		exit;
	}
	else
	{
		echo "<h3 align='center'> Data for item type: $vendorItemName inserted successfully. </h3> ";
	};		

		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
		echo "<a href='$url'>Back to previous page</a> ";	

	$conn->close();
}
?>
