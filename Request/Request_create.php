<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "servicerequests";
    
    $CustomerID = $_REQUEST['CustomerID'];
    $ProductID = $_REQUEST['ProductID'];
    $IssueDescription = $_REQUEST['IssueDescription'];
    $RequestDate = $_REQUEST['RequestDate'];
    $ResolutionDate = $_REQUEST['ResolutionDate'];
    $Status = $_REQUEST['Status'];


    $sql = "INSERT INTO $table(CustomerID, ProductID, IssueDescription, RequestDate, ResolutionDate, Status)
            VALUES('$CustomerID', '$ProductID', '$IssueDescription', '$RequestDate', '$ResolutionDate', '$Status')";

    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
    header("Location: Request_mainpage.php");
?>