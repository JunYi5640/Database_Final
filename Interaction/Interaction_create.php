<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "customerinteractions";
    
    $CustomerID = $_REQUEST['CustomerID'];
    $Date = $_REQUEST['Date'];
    $Mode = $_REQUEST['Mode'];
    $Description = $_REQUEST['Description'];

    $sql = "INSERT INTO $table(CustomerID, Date, Mode, Description)
            VALUES('$CustomerID', '$Date', '$Mode', '$Description')";

    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Interaction_mainpage.php");
?>