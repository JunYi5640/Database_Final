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
        <!-- Table Display -->
		<h3>Customer Table</h3>

        <form action="Delete.php" method="post">
            <table border="1" cellspacing="0" cellpadding="15">
		    <thead>
			    <tr>
                <th scope="col">CheckBox.</th>
				<th scope="col">Customer ID.</th>
				<th scope="col">Name.</th>
				<th scope="col">Email.</th>
				<th scope="col">Phone Number.</th>
				<th scope="col">Address.</th>
				<th scope="col">Registration Date.</th>
				<th scope="col">Customer Type.</th>
			    </tr>
            </thead>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='customers[]' value='" . $row['CustomerID'] . "'></td>";
                    echo "<td>" . $row["CustomerID"] . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["PhoneNumber"] . "</td>";
                    echo "<td>" .  $row['Address'] . "</td>";
                    echo "<td>" .  $row['RegistrationDate'] . "</td>";
                    echo "<td>" .  $row['CustomerType'] . "</td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "<td colspan=8>No data found</td>";
            }
        ?>
            </table>
            <input type="submit" name="submit" value="submit">
        </form>
	</body>
</html>