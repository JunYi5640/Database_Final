<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "products";
    
    $ProductId = $_REQUEST['ProductId'];
    $Name = $_REQUEST['Name'];
    $Description = $_REQUEST['Description'];
    $Price = $_REQUEST['Price'];
    $StockQuantity = $_REQUEST['StockQuantity'];
    $CategoryID = $_REQUEST['CategoryID'];

    $sql = "UPDATE $table SET Name = '$Name', Description = '$Description', Price = '$Price',
             StockQuantity = '$StockQuantity',  CategoryID = '$CategoryID'
             WHERE ProductId = $ProductId";
             
    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Product_mainpage.php");
?>