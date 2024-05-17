<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    session_start();
    $db->begin_transaction();

    $table = "customers";

    try{
        foreach($_POST['customers'] as $customerID){
            $sql = "DELETE FROM $table WHERE CustomerID = '$customerID'";
            if($db->query($sql) === FALSE){
                throw new Exception();
            }
        }
        $db->commit();
        $_SESSION['status'] = TRUE;
    }
    catch(Exception $e){
        $db->rollback();
        $_SESSION['status'] = FALSE;
    }
    $db->close();
    header("Location: mainpage.php");
?>