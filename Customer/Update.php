<?php

    header('Content-Type: application/json');

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $db->begin_transaction();

    $table = "customers";

    try{
        $CustomerID = $_REQUEST['CustomerID'];
        $Name = $_REQUEST['Name'];
        $Email = $_REQUEST['Email'];
        $PhoneNumber = $_REQUEST['PhoneNumber'];
        $Address = $_REQUEST['Address'];
        $RegistrationDate = $_REQUEST['RegistrationDate'];
        $CustomerType = $_REQUEST['CustomerType'];
        
        $sql = "UPDATE $table SET Name = '$Name', Email = '$Email', PhoneNumber = '$PhoneNumber',
                Address = '$Address',  RegistrationDate = '$RegistrationDate', CustomerType = '$CustomerType'
                WHERE CustomerID = $CustomerID";
             
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