<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "products";
    
    
    $Name = $_REQUEST['Name'];
    $Description = $_REQUEST['Description'];
    $Price = $_REQUEST['Price'];
    $StockQuantity = $_REQUEST['StockQuantity'];
    $CategoryID = $_REQUEST['CategoryID'];


    $sql = "INSERT INTO $table(Name, Description, Price, StockQuantity, CategoryID)
            VALUES('$Name', '$Description', '$Price', '$StockQuantity', '$CategoryID')";

    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Product_mainpage.php");
?>