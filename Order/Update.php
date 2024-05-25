<?php

    //header('Content-Type: application/json');

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
        $OrderID = $_REQUEST['OrderID'];
        $OldProductID = $_REQUEST['OldProductID'];
        $NewProductID = $_REQUEST['NewProductID'];
        $OldQuantity = $_REQUEST['OldQuantity'];
        $NewQuantity = $_REQUEST['NewQuantity'];

        //Update product's quantity
        $table = "products";
        $sql = "UPDATE $table SET StockQuantity = StockQuantity + $OldQuantity WHERE ProductID = $OldProductID";
        if($db->query($sql) === FALSE){
            throw new Exception();
        }
        $sql = "UPDATE $table SET StockQuantity = StockQuantity - $NewQuantity WHERE ProductID = $NewProductID";
        if($db->query($sql) === FALSE){
            throw new Exception();
        }
        
        //Get Product's TotalPrice 
        $sql = "SELECT Price FROM $table WHERE ProductID = '$NewProductID'";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            $Product_price = $row['Price'];
        }
        $Price = $Product_price * $NewQuantity;

        //update to Orderdetails
        $table = "orderdetails";
        $sql = "UPDATE $table SET OrderID = '$OrderID', ProductID = '$NewProductID',
                                  Quantity = '$NewQuantity', Price = '$Price'
                WHERE OrderID = '$OrderID' AND ProductID = '$OldProductID'";
        if($db->query($sql) === FALSE){
            throw new Exception();
        }
        
        //Get sum of Price of Order
        $sql = "SELECT SUM(Price) AS TotalAmount FROM $table WHERE OrderID = '$OrderID'";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            $TotalAmount = $row['TotalAmount'];
        }

        //Update to SalesOrders
        $table = "salesorders";
        $sql = "UPDATE $table SET TotalAmount = '$TotalAmount' WHERE OrderID = $OrderID";
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