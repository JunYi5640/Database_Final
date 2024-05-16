<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$table = "customerinteractions";
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

		<h3>Create Interaction</h3>
		<form action="Interaction_create.php" method="post">
			CustomerID: <input type="text" name="CustomerID"><br><br>
			Date: <input type="date" name="Date"><br><br>
			Mode: <br>
			<input type="radio" name="Mode" value="Email" checked />
    		<label for="Email">Email</label><br>
			<input type="radio" name="Mode" value="Phone" />
    		<label for="Phone">Phone</label><br>
			<input type="radio" name="Mode" value="In-Person" />
    		<label for="In-Person">In-Person</label><br><br>
			Description: <input type="text" name="Description"><br><br>
			<input type="submit" value="Create"><br>
		</form>

		<br>

		<h3>Interaction Table</h3>
		<table border="1" cellspacing="0" cellpadding="15">
		<thead>
			<tr>
				<th scope="col">Interaction ID.</th>
				<th scope="col">CustomerID.</th>
				<th scope="col">Date.</th>
				<th scope="col">Mode.</th>
				<th scope="col">Description.</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if($result !== false && $result->num_rows > 0){
    				while($data = $result->fetch_assoc()){ 
			?>
						<tr>
							<td><?php echo $data['InteractionID']; ?></td>
							<td><?php echo $data['CustomerID']; ?></td>
							<td><?php echo $data['Date']; ?></td>
							<td><?php echo $data['Mode']; ?></td>
							<td><?php echo $data['Description']; ?></td>
						</tr>
			<?php
					}
				}
				else{
			?>
					<tr>
						<td colspan=5>No data found</td>
					</tr>
			<?php
				}
			?>
			
		</tbody>

	</body>
</html>