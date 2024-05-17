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
        $Name = $_REQUEST['Name'];
        $Email = $_REQUEST['Email'];
        $PhoneNumber = $_REQUEST['PhoneNumber'];
        $Address = $_REQUEST['Address'];
        $RegistrationDate = $_REQUEST['RegistrationDate'];
        $CustomerType = $_REQUEST['CustomerType'];

        $sql = "INSERT INTO $table(Name, Email, PhoneNumber, Address, RegistrationDate, CustomerType)
                VALUES('$Name', '$Email', '$PhoneNumber', '$Address', '$RegistrationDate', '$CustomerType')";
        if($db->query($sql) === FALSE){
            throw new Exception();
        }

        $db->commit();
        $_SESSION['status'] = TRUE;
    }
    catch(Exception $e){
        $db->rollback();
        $_SESSION['status'] = FALSE;
    }
    
    $db->close();
    header("Location: Customer_mainpage.php");
?>