<?php

    $conn= new mysqli("localhost","id19771101_bece","WaterDetection@123","id19771101_detection");
    // Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else { echo "Connected to mysql database. "; }

   
// Get date and time variables
    date_default_timezone_set('Africa/Blantyre');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");
    
// If values send by ESP32 are not empty then insert into MySQL database table

  if(!empty($_POST['sendval']) && !empty($_POST['sendval2']) )
    {
		$val = $_POST['sendval'];
                $val2 = $_POST['sendval2'];


// Update your tablename here
	        $sql = "INSERT INTO data (val, val2, Date, Time) VALUES ('".$val."','".$val2."', '".$d."', '".$t."')"; 
 


		if ($conn->query($sql) === TRUE) {
		    echo "Values inserted in MySQL database table.";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


// Close MySQL connection
$conn->close();





?>