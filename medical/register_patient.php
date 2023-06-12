
<?php
include "../includes/connection.php";
 $update = false;
//Default values of inputs
$id = "";
$fullName = "";
$dob = "";
$address = "";
$contact = "";
$age = "";
$gender = "";
$email = "";
$insurance = "";
$insuranceNo = "";
$nextOfKin = "";
$nextOfKinPhone = "";



 if(isset($_GET['edit'])){
  $update = true;

  $id = $_GET['edit'];

  $sql = "SELECT * FROM patients WHERE patient_id='$id'";
  $query = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($query);

  $fullName = $row['full_name'];
  $dob = $row['date_of_birth'];
  $address = $row['address'];
  $contact = $row['contact_number'];
  $age = $row['age'];
  $gender = $row['gender'];
  $email = $row['email'];
  $insurance = $row['insurance_provider'];
  $insuranceNo = $row['insurance_policy_number'];
  $nextOfKin = $row['emergency_contact_name'];
  $nextOfKinPhone = $row['emergency_contact_number'];
  $maritalStatus = $row['marital_status'];
  $created_at = $row['created_at'];
  $patient_id = $row['patient_id'];
  // $fullName = $row['full_name'];


 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Add New Patient</title>
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
    <?php include "../includes/header.php"; ?>
  <div class="container">
   
   <?php if($update==true): ?>
    <h2>Update Patient</h2>
    <?php else: ?>
    <h2>Add New Patient</h2>
    <?php endif;?>

  
    <form action="process.php" method="post">
      <div class="form-group">
        <label for="hospitalNumber">Hospital Number</label>
        <input type="hidden" class="form-control" id="" name="patient" placeholder="Enter hospital number" value="<?=$patient_id; ?>">
        <input type="text" class="form-control" id="hospitalNumber" name="hospitalNumber" placeholder="Enter hospital number" value="<?=$id; ?>" required>
      </div>
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" value="<?=$fullName; ?>" id="fullName" name="fullName" placeholder="Enter full name" required>
      </div>
      <div class="form-group">
        <label for="patientPhone">Patient Phone</label>
        <input type="text" class="form-control" id="patientPhone" value="<?=$contact; ?>" name="patientPhone" placeholder="Enter Patient Phone" required>
      </div>
      <div class="form-group">
        <label for="email">Patient Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$email; ?>" placeholder="Enter Patient Email" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" value="<?=$dob; ?>" placeholder="Enter Date of Birth" required>
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" name="age" value="<?=$age; ?>" placeholder="Enter age" required>
      </div>
      <div class="form-group">
        <label for="dateCreated">Date Created</label>
        <input type="text" class="form-control" id="dateCreated"  name="dateCreated" required value="<?=$created_at; ?>">
      </div>
      <div class="form-group">
        <label for="maritalStatus">Marital Status</label>
        <select class="form-control" id="maritalStatus"  name="maritalStatus" required <?=$maritalStatus; ?>>
       
        
        
        <option selected ><?=$maritalStatus; ?></option>
              <option value="">Select marital status</option>
              <option value="single" >Single</option>
              <option value="married">Married</option>
              <option value="divorced">Divorced</option>
              <option value="widowed">Widowed</option>
         
        </select>
      </div>
      <div class="form-group">
        <label for="insuranceProvider">Insurance Provider</label>
        <select class="form-control" id="insuranceProvider" name="insuranceProvider" >
          <option value="" selected><?=$insurance; ?></option>
          <option value="">Select Insurance Provider</option>
          <option value="NHIS">NHIS</option>
          <option value="KTSCHMA">KTSCHMA</option>

        </select>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <div>
          <div class="form-check form-check-inline">
            
            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male" required selected>
           

           
            <label class="form-check-label" for="genderMale">Male</label>
        
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female" required>
            <label class="form-check-label" for="genderFemale">Female</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="residentialAddress">Residential Address</label>
        <textarea class="form-control" id="residentialAddress" name="residentialAddress" rows="3" placeholder="Enter residential address"
required><?=$address; ?></textarea>
</div>
<div class="form-group">
<label for="nextOfKinName">Name of Next of Kin</label>
<input type="text" class="form-control" id="nextOfKinName" name="nextOfKinName"
       placeholder="Enter name of next of kin" required value="<?=$nextOfKin; ?>"> 
</div>
<div class="form-group">
<label for="nextOfKinPhone">Next of Kin Phone</label>
<input type="tel" class="form-control" id="nextOfKinPhone" name="nextOfKinPhone"
       placeholder="Enter next of kin phone" required value="<?=$nextOfKinPhone; ?>">
</div>
<?php if($update==true): ?>
<button type="submit" class="btn btn-primary" name="update_patient">Update Patient</button>
<?php else: ?>
<button type="submit" class="btn btn-primary" name="btn_add_patient">Add Patient</button>
<?php endif; ?>
</form>

  </div>
  <?php include "../includes/footer.php"; ?>
</body>
</html>

