<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "customerinteractions";

    $InteractionID = $_REQUEST['InteractionID'];
    $CustomerID = $_REQUEST['CustomerID'];
    $Date = $_REQUEST['Date'];
    $Mode = $_REQUEST['Mode'];
    $Description = $_REQUEST['Description'];
    
    $sql = "UPDATE $table SET CustomerID = '$CustomerID', Date = '$Date', Mode = '$Mode',
             Description = '$Description
             WHERE InteractionID = $InteractionID";
             
    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Interaction_mainpage.php");
?>