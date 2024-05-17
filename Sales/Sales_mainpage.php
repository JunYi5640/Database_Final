<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$table = "salesorders";
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

		<h3>Create SalesOrders</h3>
		<form action="Sales_create.php" method="post">
			CustomerID: <input type="text" name="CustomerID"><br>
			OrderDate: <input type="date" name="OrderDate"><br>
			TotalAmount: <input type="text" name="TotalAmount"><br>
			PaymentStatus: <br>
			<input type="radio" name="PaymentStatus" value="Unpaid" checked />
    		<label for="Unpaid">Unpaid</label><br>
			<input type="radio" name="PaymentStatus" value="Paid" />
    		<label for="Paid">Paid</label><br>
			DeliveryStatus: <br>
			<input type="radio" name="DeliveryStatus" value="Pending" checked />
    		<label for="Pending">Pending</label><br>
			<input type="radio" name="DeliveryStatus" value="Shipped" />
    		<label for="Shipped">Shipped</label><br>
			<input type="radio" name="DeliveryStatus" value="Delivered" />
    		<label for="Delivered">Delivered</label><br>
			<input type="submit" value="Create"><br>
		</form>
	
		<h3>Delete SalesOrders</h3>
			<form action="Sales_delete.php" method="post">
			ID: <input type="text" name="OrderID"><br>
			<input type="submit" value="Delete"><br>
		</form>
	
		<h3>Update SalesOrders</h3>
        <form action="Sales_update.php" method="post">
			ID: <input type="text" name="OrderID"><br>
			CustomerID: <input type="text" name="CustomerID"><br>
			OrderDate: <input type="date" name="OrderDate"><br>
			TotalAmount: <input type="text" name="TotalAmount"><br>
			PaymentStatus: <br>
			<input type="radio" name="PaymentStatus" value="Unpaid" checked />
    		<label for="Unpaid">Unpaid</label><br>
			<input type="radio" name="PaymentStatus" value="Paid" />
    		<label for="Paid">Paid</label><br>
			DeliveryStatus: <br>
			<input type="radio" name="DeliveryStatus" value="Pending" checked />
    		<label for="Pending">Pending</label><br>
			<input type="radio" name="DeliveryStatus" value="Shipped" />
    		<label for="Shipped">Shipped</label><br>
			<input type="radio" name="DeliveryStatus" value="Delivered" />
    		<label for="Delivered">Delivered</label><br>
			<input type="submit" value="Update"><br>
		</form>

		<br>

		<h3>SalesOrder Table</h3>
		<table border="1" cellspacing="0" cellpadding="15">
		<thead>
			<tr>
				<th scope="col">Order ID.</th>
				<th scope="col">Customer ID.</th>
				<th scope="col">Order Date.</th>
				<th scope="col">Total Amount.</th>
				<th scope="col">Payment Status.</th>
				<th scope="col">Delivery Status.</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if($result !== false && $result->num_rows > 0){
    				while($data = $result->fetch_assoc()){ 
			?>
						<tr>
							<td><?php echo $data['OrderID']; ?></td>
							<td><?php echo $data['CustomerID']; ?></td>
							<td><?php echo $data['OrderDate']; ?></td>
							<td><?php echo $data['TotalAmount']; ?></td>
							<td><?php echo $data['PaymentStatus']; ?></td>
							<td><?php echo $data['DeliveryStatus']; ?></td>
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