<html>
	<head>
		<title>Final Exam Problem 3</title>
	</head>
	<body bgcolor="#87CEEB">
		<form action="processSearchVIIT.php" method="POST">
			<table align="center">
				
				<tr>
					<td colspan="2" align="center">
						<h3 style="color:#8C001A">SELECT FOR VENDOR PRICING INFORMATION</h3>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<h3 style="color:#0000BB">Select a vendor name and an item type name.</h3>
					</td>
				</tr>

				<tr>
					<td>
						<label><b>Vendor Name:</b></label>
					</td>
					<td>
						<input type="text" id="vendorName" name="vendorName">
					</td>
				</tr>

				<tr>
					<td>
						<label><b>Item Type Name:</b></label>
					</td>
					<td>
						<input type="text" id="itemTypeName" name="itemTypeName">
					</td>
				</tr>

				<tr>
					<td colspan="2" align="center">
						<input type="submit" id="submit" name="submit">
						<input type="reset" id="reset" name="reset">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>

