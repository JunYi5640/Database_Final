<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$table = "customers";
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

		<h3>Create Customer</h3>
		<form action="Customer_create.php" method="post">
			Name: <input type="text" name="Name"><br>
			Email: <input type="text" name="Email"><br>
			PhoneNumber: <input type="text" name="PhoneNumber"><br>
			Address: <input type="text" name="Address"><br>
			RegistrationDate: <input type="date" name="RegistrationDate"><br>
			CustomerType: <br>
			<input type="radio" name="CustomerType" value="Individual" checked />
    		<label for="Individual">Individual</label><br>
			<input type="radio" name="CustomerType" value="Corporate" />
    		<label for="Corporate">Corporate</label><br>
			<input type="submit" value="Create"><br>
		</form>
	
		<h3>Delete Customer</h3>
			<form action="Customer_delete.php" method="post">
			ID: <input type="text" name="CustomerID"><br>
			<input type="submit" value="Delete"><br>
		</form>
	
		<h3>Update Customer</h3>
        <form action="Customer_update.php" method="post">
			ID: <input type="text" name="CustomerID"><br>
			Name: <input type="text" name="Name"><br>
			Email: <input type="text" name="Email"><br>
			PhoneNumber: <input type="text" name="PhoneNumber"><br>
			Address: <input type="text" name="Address"><br>
			RegistrationDate: <input type="date" name="RegistrationDate"><br>
			CustomerType: <br>
			<input type="radio" name="CustomerType" value="Individual" checked />
    		<label for="Individual">Individual</label><br>
			<input type="radio" name="CustomerType" value="Corporate" />
    		<label for="Corporate">Corporate</label><br>
			<input type="submit" value="Update"><br>
		</form>

		<br>

		<h3>Customer Table</h3>
		<table border="1" cellspacing="0" cellpadding="15">
		<thead>
			<tr>
				<th scope="col">Customer ID.</th>
				<th scope="col">Name.</th>
				<th scope="col">Email.</th>
				<th scope="col">Phone Number.</th>
				<th scope="col">Address.</th>
				<th scope="col">Registration Date.</th>
				<th scope="col">Customer Type.</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if($result !== false && $result->num_rows > 0){
    				while($data = $result->fetch_assoc()){ 
			?>
						<tr>
							<td><?php echo $data['CustomerID']; ?></td>
							<td><?php echo $data['Name']; ?></td>
							<td><?php echo $data['Email']; ?></td>
							<td><?php echo $data['PhoneNumber']; ?></td>
							<td><?php echo $data['Address']; ?></td>
							<td><?php echo $data['RegistrationDate']; ?></td>
							<td><?php echo $data['CustomerType']; ?></td>

						</tr>
			<?php
					}
				}
				else{
			?>
					<tr>
						<td colspan=7>No data found</td>
					</tr>
			<?php
				}
			?>
			
		</tbody>

	</body>
</html>