<?php
// Replace with your database connection code using MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leakage-detection";

// Create a MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the sensor_data table
$sql = "SELECT flow_meter1, flow_meter2, gas_sensor FROM sensordata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data from the result set
    $row = $result->fetch_assoc();

    // Calculate pressure_diffs
    $pressure_diff = $row['flow_meter1'] - $row['flow_meter2'];

    // Create an associative array to hold the data
    $data = array(
        'flow_meter1' => $row['flow_meter1'],
        'flow_meter2' => $row['flow_meter2'],
        'gas_sensor' => $row['gas_sensor'],
        'pressure_diff' => round($pressure_diff,2)
    );

    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Output the data as JSON
    echo json_encode($data);
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();
?>
