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

    while($row = $result->fetch_assoc()){
        $data[] = array(
            "CustomerID" => $row['CustomerID'],
            "Name" => $row['Name'],
            "Email" => $row['Email'], 
            "PhoneNumber" => $row['PhoneNumber'], 
            "Address" => $row['Address'], 
            "RegistrationDate" => $row['RegistrationDate'],
            "CustomerType" => $row['CustomerType']
       );
    }
    echo json_encode($data);
?>