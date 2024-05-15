<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Final_Project";

	$db = new mysqli($host, $username, $password, $dbname);
	if($db->connect_error)	die("Connection Failed ". $db->connect_error);
	else	/*echo "Connection Successful"*/;

	$sql = "SHOW TABLES FROM $dbname";
    $result = $db->query($sql);
    if($result !== FALSE && $result->num_rows > 0){
		while($data = $result->fetch_row()){
			$tablelist[] = $data[0];
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Customer Management System</title>
</head>
<body>
    <h2>M11202108 Database_Final</h2>

    <label for="tables">Choose a table:</label>
    <select id = "tables" name="tables" onchange = "<?php echo $table_name; ?>_create.php">
        <?php
            foreach($tablelist as $table_name){
        ?>
                <option value='<?php echo $table_name; ?>'><?php echo $table_name; ?></option>
        <?php
            }
        ?>
    </select>

    <script>
        document.getElementById("tables").addEventListener("change", function() {
        var selectedValue = this.value;
        switch(selectedValue) {
            case "customers":
                <?php $table = "customers"; ?>
                break;
            case "products":
                <?php $table = "products"; ?>
                break;
            case "salesorders":
                <?php $table = "salesorders"; ?>
                break;
            case "orderdetails":
                <?php $table = "orderdetails"; ?>
                break;
            case "servicerequests":
                <?php $table = "servicerequests"; ?>
                break;
            case "customerinteractions":
                <?php $table = "customerinteractions"; ?>
                break;
        }
        });
    </script>
    
    
</body>
</html>

