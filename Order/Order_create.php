<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "orderdetails";
    
    $OrderID = $_REQUEST['OrderID'];
    $ProductID = $_REQUEST['ProductID'];
    $Quantity = $_REQUEST['Quantity'];
    $Price = $_REQUEST['Price'];


    $sql = "INSERT INTO $table(OrderID, ProductID, Quantity, Price)
            VALUES('$OrderID', '$ProductID', '$Quantity', '$Price')";

    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Order_mainpage.php");
?>