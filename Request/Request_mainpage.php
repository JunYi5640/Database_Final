<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$table = "servicerequests";
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

		<h3>Create Request</h3>
		<form action="Request_create.php" method="post">
			CustomerID: <input type="text" name="CustomerID"><br>
			ProductID: <input type="text" name="ProductID"><br>
			IssueDescription: <input type="text" name="IssueDescription"><br>
			RequestDate: <input type="date" name="RequestDate"><br>
			ResolutionDate: <input type="date" name="ResolutionDate"><br>
			Status: <br>
			<input type="radio" name="Status" value="Submitted" checked />
    		<label for="Submitted">Submitted</label><br>
			<input type="radio" name="Status" value="In Progress" />
    		<label for="In Progress">In Progress</label><br>
			<input type="radio" name="Status" value="Completed" />
    		<label for="Completed">Completed</label><br>
			<input type="submit" value="Create"><br>
		</form>
	
		<h3>Delete Request</h3>
			<form action="Request_delete.php" method="post">
			ID: <input type="text" name="RequestID"><br>
			<input type="submit" value="Delete"><br>
		</form>
	
		<h3>Update Request</h3>
        <form action="Request_update.php" method="post">
			ID: <input type="text" name="RequestID"><br>
			CustomerID: <input type="text" name="CustomerID"><br>
			ProductID: <input type="text" name="ProductID"><br>
			IssueDescription: <input type="text" name="IssueDescription"><br>
			RequestDate: <input type="date" name="RequestDate"><br>
			ResolutionDate: <input type="date" name="ResolutionDate"><br>
			Status: <br>
			<input type="radio" name="Status" value="Submitted" checked />
    		<label for="Submitted">Submitted</label><br>
			<input type="radio" name="Status" value="In Progress" />
    		<label for="In Progress">In Progress</label><br>
			<input type="radio" name="Status" value="Completed" />
    		<label for="Completed">Completed</label><br>
			<input type="submit" value="Update"><br>
		</form>

		<br>

		<h3>Customer Table</h3>
		<table border="1" cellspacing="0" cellpadding="15">
		<thead>
			<tr>
				<th scope="col">Request ID.</th>
				<th scope="col">Customer ID.</th>
				<th scope="col">Product ID.</th>
				<th scope="col">Issue Description.</th>
				<th scope="col">Request Date.</th>
				<th scope="col">Resolution Date.</th>
				<th scope="col">Status.</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if($result !== false && $result->num_rows > 0){
    				while($data = $result->fetch_assoc()){ 
			?>
						<tr>
							<td><?php echo $data['RequestID']; ?></td>
							<td><?php echo $data['CustomerID']; ?></td>
							<td><?php echo $data['ProductID']; ?></td>
							<td><?php echo $data['IssueDescription']; ?></td>
							<td><?php echo $data['RequestDate']; ?></td>
							<td><?php echo $data['ResolutionDate']; ?></td>
							<td><?php echo $data['Status']; ?></td>

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