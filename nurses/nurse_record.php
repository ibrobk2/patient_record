<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Nurse Form</title>
  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
    <?php include "../includes/header.php"; 
    include_once "../includes/connection.php";
    ?>
    
  <div class="container">
    <h2>Nurse Result Record</h2>
    <hr>
    <form action="" method="POST">
      <div class="form-group">
        <label for="hospitalNumber">Hospital Number</label>
        <input type="text" class="form-control" id="patient_id" name="hospitalNumber"
          placeholder="Enter Hospital Number">
          <!-- <input type="button" class="btn btn-primary mt-3" value="Search" name="btn_search" id="search_btn"> -->
      </div>

      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="patient_name" name="fullName"
          placeholder="Full Name" >
      </div>

      <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="patient_age" name="age"
          placeholder="Patient Age" >
      </div>
    
      <div class="form-group">
        <label for="bloodPressure">Blood Pressure</label>
        <input type="text" class="form-control" id="bloodPressure" name="bloodPressure"
          placeholder="Enter blood pressure">
      </div>
      <div class="form-group">
        <label for="temperature">Temperature</label>
        <input type="text" class="form-control" id="temperature" name="temperature" placeholder="Enter temperature">
      </div>
      <div class="form-group">
        <label for="weight">Weight</label>
        <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter weight">
      </div>
      <div class="form-group">
        <label for="randomBloodSugar">Random Blood Sugar</label>
        <input type="text" class="form-control" id="randomBloodSugar" name="randomBloodSugar"
          placeholder="Enter random blood sugar">
      </div>
      <div class="form-group">
        <label for="fastingBloodSugar">Fasting Blood Sugar</label>
        <input type="text" class="form-control" id="fastingBloodSugar" name="fastingBloodSugar"
          placeholder="Enter fasting blood sugar">
      </div>
      <div class="form-group">
        <label for="nurseName">Name of Nurse</label>
        <input type="text" class="form-control" id="nurseName" name="nurseName" placeholder="Enter nurse name">
      </div>
      <button type="submit" class="btn btn-primary">Post</button>
    </form>
  </div>

  <script src="../includes/jquery.js"></script>
    <script>
       $(document).ready(function () {
    $("#patient_id").change(function () {
        var patient_id = $("#patient_id").val();
        $.ajax({
            type: "POST",
            url: "fetch_patient_details.php",
            data: {patientId: patient_id},
            dataType: "json",
            success: function (response) {
                $("#patient_name").val(response.data.full_name);
                $("#patient_age").val(response.data.age);
            }
        });
    })
});
    </script>
</body>

<?php include "../includes/footer.php"; ?>

</html>
