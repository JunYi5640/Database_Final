<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

    $table = "servicerequests";
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];
    $search = $_GET['search'];
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    
    $sql = "SELECT * FROM $table";
    $sql_t = "SELECT COUNT(*) as total FROM $table";
    
    if (!empty($search)) {
        $sql .= " WHERE RequestID LIKE '%".$search."%' OR CustomerID LIKE '%".$search."%' OR ProductID LIKE '%".$search."%'";
        $sql_t .= " WHERE RequestID LIKE '%".$search."%' OR CustomerID LIKE '%".$search."%' OR ProductID LIKE '%".$search."%'";
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
            "RequestID" => $row['RequestID'],
            "CustomerID" => $row['CustomerID'],
            "ProductID" => $row['ProductID'],
            "IssueDescription" => $row['IssueDescription'], 
            "RequestDate" => $row['RequestDate'],
            "ResolutionDate" => $row['ResolutionDate'],
            "Status" => $row['Status']
       );
    }
    echo json_encode(["total" => $total, "rows" => $data]);
    
?>