<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$table = "orderdetails";
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

		<h3>Create Orderdetails</h3>
		<form action="Order_create.php" method="post">
			ID: <input type="text" name="OrderID"><br>
			ProductID: <input type="text" name="ProductID"><br>
			Quantity: <input type="text" name="Quantity"><br>
			Price: <input type="text" name="Price"><br>
			<input type="submit" value="Create"><br>
		</form>
	
		<h3>Delete Orderdetails</h3>
			<form action="Order_delete.php" method="post">
			ID: <input type="text" name="OrderID"><br>
			<input type="submit" value="Delete"><br>
		</form>
	
		<h3>Update Orderdetails</h3>
        <form action="Order_update.php" method="post">
			ID: <input type="text" name="OrderID"><br>
			ProductID: <input type="text" name="ProductID"><br>
			Quantity: <input type="text" name="Quantity"><br>
			Price: <input type="text" name="Price"><br>
			<input type="submit" value="Update"><br>
		</form>

		<br>

		<h3>Product Table</h3>
		<table border="1" cellspacing="0" cellpadding="15">
		<thead>
			<tr>
				<th scope="col">Order ID.</th>
				<th scope="col">Product ID.</th>
				<th scope="col">Quantity.</th>
				<th scope="col">Price.</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if($result !== false && $result->num_rows > 0){
    				while($data = $result->fetch_assoc()){ 
			?>
						<tr>
							<td><?php echo $data['OrderID']; ?></td>
							<td><?php echo $data['ProductID']; ?></td>
							<td><?php echo $data['Quantity']; ?></td>
							<td><?php echo $data['Price']; ?></td>
						</tr>
			<?php
					}
				}
				else{
			?>
					<tr>
						<td colspan=4>No data found</td>
					</tr>
			<?php
				}
			?>
			
		</tbody>

	</body>
</html>