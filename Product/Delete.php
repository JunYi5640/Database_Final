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

    $table = "products";

    try{
        $ids = $_REQUEST['ids'];
        foreach($ids as $ProductID){
            $sql = "DELETE FROM $table WHERE ProductID = '$ProductID'";
            if($db->query($sql) === FALSE){
                throw new Exception();
            }
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