<html>
	<head>
		<title> Final Exam Problem 3 </title>
	</head>

	<body>
	<table border="1px";>
	<tr>
		<td>
			<b>
			<p>
				Vendor Name
			</p>
			</b>
		</td>
		<td>
                        <b>
                        <p>
                                Item Type Name
                        </p>
                        </b>
                </td>
		<td>
                        <b>
                        <p>
                                Current Price
                        </p>
                        </b>
                </td>
		<td>
                        <b>
                        <p>
                                Price Unit Indicator
                        </p>
                        </b>
                </td>
		<td>
                        <b>
                        <p>
                                Vendor Description
                        </p>
                        </b>
                </td>
		<td>
                        <b>
                        <p>
                                Vendor Item Number
                        </p>
                        </b>
                </td>
		<td>
                        <b>
                        <p>
                                Preferred Vendor?
                        </p>
                        </b>
                </td>
	</tr>
<?php
if(isset($_POST['submit']))
{
	$vendorName = $_POST['vendorName'];
	$itemTypeName = $_POST['itemTypeName'];

	$config = include('./inc/config.php');
	$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);

	if($conn->connect_errno)
        {
                echo "Error: Failed to make a MySQL connection, here is why: \n";
                echo "Errno: " . $conn->connect_errno . "\n";
                echo "Error: " . $conn->connect_error . "\n";
                exit;
        }
	
	if($vendorName=="" && $itemTypeName=="")
	{
		$query= "Select * from VendorInventoryItemType";
	}
	else if($vendorName=="")
	{
		$query= "Select * from VendorInventoryItemType where
			InventoryItemTypeName='$itemTypeName'";
	}
	else if($itemTypeName=="")
	{
		$query= "Select * from VendorInventoryItemType where
			VendorName='$vendorName'";
	}
	else
	{
		$query= "Select * from VendorInventoryItemType where
			VendorName='$vendorName' and InventoryItemTypeName='$itemTypeName'";
	}

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
		while($row = mysqli_fetch_array($result))
		{
			$vendorName = $row['VendorName'];
			$itemTypeName = $row['InventoryItemTypeName'];
			$vendorCurrentPrice = $row['CurrentPrice'];
			$priceUnitIndicator = $row['PriceUnitIndicator'];
			$vendorDescription = $row['VendorsDescription'];
			$vendorItemNumber = $row['VendorsItemNumber'];
			$preferredVendor = $row['PreferredVendor'];
		
			echo " 
				<tr>
					<td>
					<p>$vendorName</p>
					</td>
					<td>
					<p>$itemTypeName</p>
                                        </td>
					<td>
                                        <p>$vendorCurrentPrice</p>
                                        </td>
					<td>
                                        <p>$priceUnitIndicator</p>
                                        </td>
					<td>
                                        <p>$vendorDescription</p>
                                        </td>
					<td>
                                        <p>$vendorItemNumber</p>
                                        </td>
					<td>
                                        <p>$preferredVendor</p>
                                        </td>
				</tr>
			";
			}
		}

		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>Back to previous page</a> ";

		$conn->close();
	}
?>
</table>
</body>
</html>
