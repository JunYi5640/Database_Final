<?php

    header('Content-Type: application/json');

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $db->begin_transaction();

    $table = "servicerequests";

    try{

        $RequestID = $_REQUEST['RequestID'];
        $CustomerID = $_REQUEST['CustomerID'];
        $ProductID = $_REQUEST['ProductID'];
        $IssueDescription = $_REQUEST['IssueDescription'];
        $RequestDate = $_REQUEST['RequestDate'];
        $ResolutionDate = $_REQUEST['ResolutionDate'];
        $Status = $_REQUEST['Status'];


        $sql = "UPDATE $table SET CustomerID = '$CustomerID', ProductID = '$ProductID', IssueDescription = '$IssueDescription',
                RequestDate = '$RequestDate', Status = '$Status'";

        if($Status == "Completed") $sql.= ", ResolutionDate = '$ResolutionDate'";
        
        $sql .= " WHERE RequestID = $RequestID";
             
        if($db->query($sql) === FALSE){
            throw new Exception();
        }
            
        $db->commit();
        echo json_encode(["success" => TRUE]);
        
    }
    catch(Exception $e){
        $db->rollback();
        echo json_encode(["success" => FALSE]);
    }
    $db->close();
?>