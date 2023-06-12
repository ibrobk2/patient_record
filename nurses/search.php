<?php
// Assuming you have a database connection established
include '../includes/connection.php';

if (isset($_POST['searchTerm'])) {
  $searchTerm = $_POST['searchTerm'];

  // Prepare the SQL statement
  $query = "SELECT * FROM patients WHERE fullName LIKE :searchTerm";

  // Prepare and execute the query
  $stmt = $conn->prepare($query);
  $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
  $stmt->execute();

  // Fetch all the matching rows as an associative array
  $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Output the results
  if (count($patients) > 0) {
    foreach ($patients as $patient) {
      echo "Hospital Number: " . $patient['hospitalNumber'] . "<br>";
      echo "Full Name: " . $patient['fullName'] . "<br>";
      echo "Age: " . $patient['age'] . "<br>";
      echo "Date Created: " . $patient['dateCreated'] . "<br>";
      echo "Marital Status: " . $patient['maritalStatus'] . "<br>";
      echo "Gender: " . $patient['gender'] . "<br>";
      echo "Residential Address: " . $patient['residentialAddress'] . "<br>";
      echo "Next of Kin: " . $patient['nextOfKinName'] . "<br>";
      echo "Next of Kin Phone: " . $patient['nextOfKinPhone'] . "<br>";
      echo "------------------------------------------<br>";
    }
  } else {
    echo "No records found.";
  }
}
?>
