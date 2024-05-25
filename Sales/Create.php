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

    $table = "salesorders";

    try{
        $CustomerID = $_REQUEST['CustomerID'];
        $OrderDate = $_REQUEST['OrderDate'];
        $PaymentStatus = $_REQUEST['PaymentStatus'];
        $DeliveryStatus = $_REQUEST['DeliveryStatus'];

        $sql = "INSERT INTO $table(CustomerID, OrderDate, PaymentStatus, DeliveryStatus)
                VALUES('$CustomerID', '$OrderDate', '$PaymentStatus', '$DeliveryStatus')";
        
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