<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "salesorders";
    
    $OrderID = $_REQUEST['OrderID'];
    $CustomerID = $_REQUEST['CustomerID'];
    $OrderDate = $_REQUEST['OrderDate'];
    $TotalAmount = $_REQUEST['TotalAmount'];
    $PaymentStatus = $_REQUEST['PaymentStatus'];
    $DeliveryStatus = $_REQUEST['DeliveryStatus'];

    $sql = "UPDATE $table SET CustomerID = '$CustomerID', OrderDate = '$OrderDate', TotalAmount = '$TotalAmount',
             PaymentStatus = '$PaymentStatus',  DeliveryStatus = '$DeliveryStatus'
             WHERE OrderID = $OrderID";
             
    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Sales_mainpage.php");
?>