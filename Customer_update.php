<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Final_project";

    $db = new mysqli($host, $username, $password, $dbname);
    if($db->connect_error)  die("Connection Failed ". $db->connect_error);
    else    /*echo "Connection Successful"*/;

    $table = "customers";
    
    $Name = $_REQUEST['Name'];
    $Email = $_REQUEST['Email'];
    $PhoneNumber = $_REQUEST['PhoneNumber'];
    $Address = $_REQUEST['Address'];
    $RegistrationDate = $_REQUEST['RegistrationDate'];
    $CustomerType = $_REQUEST['CustomerType'];
    $sql = """UPDATE $table SET Name = '$name', Email = '$Email', PhoneNumber = '$PhoneNumber',
             Address = '$Address',  RegistrationDate = '$RegistrationDate', CustomerType = '$CustomerType'
             WHERE CustomerId = $CustomerId""";
             
    session_start();
    if($db->query($sql) === TRUE)   $_SESSION['status'] = TRUE;
    else $_SESSION['status'] = FALSE;

    $db->close();
?>