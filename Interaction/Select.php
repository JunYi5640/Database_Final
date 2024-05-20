<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

    $table = "customerinteractions";
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];
    $search = $_GET['search'];
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    
    $sql = "SELECT * FROM $table";
    $sql_t = "SELECT COUNT(*) as total FROM $table";
    
    if (!empty($search)) {
        $sql .= " WHERE InteractionID LIKE '%".$search."%' OR CustomerID LIKE '%".$search."%'";
        $sql_t .= " WHERE InteractionID LIKE '%".$search."%' OR CustomerID LIKE '%".$search."%'";
    }
    $sql .= " ORDER BY " . $sort. " " . $order ." ";
    $sql .= " LIMIT $limit OFFSET $offset";
    
    $result_t = $db->query($sql_t);
    $result = $db->query($sql);
	$db->close();
    
    $row = $result_t->fetch_assoc();
    $total = $row['total'];

    while($row = $result->fetch_assoc()){
        $data[] = array(
            "InteractionID" => $row['InteractionID'],
            "CustomerID" => $row['CustomerID'],
            "Date" => $row['Date'],
            "Mode" => $row['Mode'], 
            "Description" => $row['Description']
       );
    }
    echo json_encode(["total" => $total, "rows" => $data]);
    
?>