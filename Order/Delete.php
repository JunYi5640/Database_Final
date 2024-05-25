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

    $table = "orderdetails";

    try{
        $ids = $_REQUEST['ids'];
        foreach($ids as $row){
            $OrderID = $row['OrderID'];
            $ProductID = $row['ProductID'];
            $Quantity = $row['Quantity'];
            $Price = $row['Price'];

            //delete order detail
            $table = "orderdetails";
            $sql = "DELETE FROM $table WHERE OrderID = '$OrderID' AND ProductID = '$ProductID'";
            if($db->query($sql) === FALSE){
                throw new Exception();
            }

            //update product quantity
            $table = "products";
            $sql = "UPDATE $table SET StockQuantity = StockQuantity + $Quantity WHERE ProductID = '$ProductID'";
            if($db->query($sql) === FALSE){
                throw new Exception();
            }

            //update salesorder total amount
            $table = "salesorders";
            $sql = "UPDATE $table SET TotalAmount = TotalAmount - $Price WHERE OrderID = '$OrderID'";
            if($db->query($sql) === FALSE){
                throw new Exception();
            }
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