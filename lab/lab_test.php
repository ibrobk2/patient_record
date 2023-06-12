<?php
session_start();
include "../includes/connection.php";
$row['full_name'] = "";

$user = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Lab Test Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form-group button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <?php include "../includes/header.php"; ?><br>
  <div class="container">
    <h2>Lab Test Record Form</h2>
    <form id="labTestForm" action="process.php" method="post">
      <div class="form-group">
        <label for="patient_id">Patient ID:</label>
        <input type="text" id="patient_id" name="patient_id" required>
      </div>
      <div class="form-group">
        <label for="test_name">Test Name:</label>
        <input type="text" id="test_name" name="test_name" required>
      </div> 
      <div class="form-group">
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" required>
      </div>
      <div class="form-group">
        <label for="test_date">Test Date:</label>
        <input type="date" id="test_date" name="test_date" required>
      </div>
      <div class="form-group">
        <label for="test_results">Test Results:</label>
        <input type="text" id="test_results" name="test_results" required>
      </div>
      <div class="form-group">
        <!-- <label for="test_results">Lab_scientist</label> -->
        <input type="hidden" id="lab_name" name="lab_name" value="<?php echo $row['full_name']; ?>" required>
      </div>
      <div class="form-group">
        <button type="submit" name="add_test">Submit</button>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
  <script>
     
    $(document).ready(function () {
      // var patient_id = document.querySelector('#patient_id').value;
      var patient_id = $('#patient_id').val();
     
      // Make an AJAX request using jQuery
      // var patient_id = $('#patient_id').val();
      $('#patient_id').change(function(){
        // e.preventDefault;
        $.ajax({
      url: 'lab_fetch_data.php',
      type: 'POST',
      data: {patientId: patient_id},
      dataType: 'json',
      success: function(data) {
    // Process the fetched data
       $('#patient_name').val(data.full_name);
    // document.querySelector('#patient_name').value = data["full_name"];
        
        // Set the value of the age input field
        $('#age').val(data.age);
    

  },
  error: function(xhr, status, error) {
        // Request failed
        console.log('Error: ' + status + ' - ' + error);
      }
  });
});  
    });
  </script>
</body>
</html>
