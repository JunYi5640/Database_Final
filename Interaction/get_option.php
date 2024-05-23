<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

    $table = "customers";
    $sort = "CustomerID";
    $order = "ASC";

    $sql = "SELECT CustomerID FROM $table";
    $sql .= " ORDER BY " . $sort. " ASC";
    
    $result = $db->query($sql);
	$db->close();

    while($row = $result->fetch_assoc()){
        echo "<option value='" . $row["CustomerID"] . "'>" . $row["CustomerID"] . "</option>";
    }

?>