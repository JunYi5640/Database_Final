<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$table = "products";
	$sql = "SELECT * FROM $table";
	$result = $db->query($sql);

	$db->close();

	session_start();
	if (isset($_SESSION['status'])){
		if($_SESSION['status'] === true)
			echo "<script>alert('Operation Successful');</script>";
		else
			echo "<script>alert('Operation Failed');</script>";
		unset($_SESSION['status']);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Database_Final</title>
	</head>

    <body>
    	<h2>M11202108 Database_Final</h2>

		<h3>Create Product</h3>
		<form action="Product_create.php" method="post">
			Name: <input type="text" name="Name"><br>
			Description: <input type="text" name="Description"><br>
			Price: <input type="text" name="Price"><br>
			StockQuantity: <input type="text" name="StockQuantity"><br>
			CategoryID: <input type="text" name="CategoryID"><br>
			<input type="submit" value="Create"><br>
		</form>
	
		<h3>Delete Product</h3>
			<form action="Product_delete.php" method="post">
			ID: <input type="text" name="ProductID"><br>
			<input type="submit" value="Delete"><br>
		</form>
	
		<h3>Update Product</h3>
        <form action="Product_update.php" method="post">
			ID: <input type="text" name="ProductID"><br>
			Name: <input type="text" name="Name"><br>
			Description: <input type="text" name="Description"><br>
			Price: <input type="text" name="Price"><br>
			StockQuantity: <input type="text" name="StockQuantity"><br>
			CategoryID: <input type="text" name="CategoryID"><br>
			<input type="submit" value="Update"><br>
		</form>

		<br>

		<h3>Product Table</h3>
		<table border="1" cellspacing="0" cellpadding="15">
		<thead>
			<tr>
				<th scope="col">Product ID.</th>
				<th scope="col">Name.</th>
				<th scope="col">Description.</th>
				<th scope="col">Price.</th>
				<th scope="col">Stock Quantity.</th>
				<th scope="col">Category ID.</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if($result !== false && $result->num_rows > 0){
    				while($data = $result->fetch_assoc()){ 
			?>
						<tr>
							<td><?php echo $data['ProductID']; ?></td>
							<td><?php echo $data['Name']; ?></td>
							<td><?php echo $data['Description']; ?></td>
							<td><?php echo $data['Price']; ?></td>
							<td><?php echo $data['StockQuantity']; ?></td>
							<td><?php echo $data['CategoryID']; ?></td>
						</tr>
			<?php
					}
				}
				else{
			?>
					<tr>
						<td colspan=6>No data found</td>
					</tr>
			<?php
				}
			?>
			
		</tbody>

	</body>
</html>