<?php
// Assuming you are using MySQL, but you can modify it to work with other database systems

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['patientId'])){


// Get the patient ID from the AJAX request
$patientId = $_POST['patientId'];
// $patientId = (int)$patient_id;

// Fetch patient_name and age based on the patient ID
$sql = "SELECT full_name, age FROM patients WHERE patient_id = '$patientId'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch the first row as an associative array
    $row = $result->fetch_assoc();
    $data['full_name'] = $row['full_name'];
    $data['age'] = $row['age'];
}

// Close the database connection
$conn->close();

// Set the response header to JSON
header('Content-Type: application/json');

// Return the fetched data as JSON
echo json_encode($data);
}
?>