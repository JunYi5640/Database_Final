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

    $table = "customerinteractions";

    try{
        $InteractionID = $_REQUEST['InteractionID'];
        $CustomerID = $_REQUEST['CustomerID'];
        $Date = $_REQUEST['Date'];
        $Mode = $_REQUEST['Mode'];
        $Description = $_REQUEST['Description'];
        
        $sql = "UPDATE $table SET CustomerID = '$CustomerID', Date = '$Date', Mode = '$Mode', Description = '$Description'
                WHERE InteractionID = $InteractionID";
             
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