<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <title>Patient Record Management System</title>
  <style>
    .card {
      margin-bottom: 20px;
      height: 100%;
    }

.card-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card-title {
  margin-bottom: 10px;
}



img#logo{
    display: flex;
    align-items:center;
    justify-content:center;
    position: absolute;
}

  </style>
</head>

<body>
 <img src="images/hukpoly_logo.webp" alt="hukpoly" id="logo">
  <div class="container">
     <h2 class="mt-4 mb-4" style="text-align:center">HASSAN USMAN KATSINA POLYTECHNIC CLINIC</h2>
     <h1 class="mt-4 mb-4" style="text-align:center">PATIENT ELECTRONIC HEALTH RECORD (EHR) SOFTWARE</h1>
    <div class="img" style="display:flex; align-items:center;justify-content:center;">
    <img src="images/patient.png" alt="Patient_on_bed" width="250px">
    </div>
   
    <div class="row">
        
      <div class="col-md-5 col-lg-2">
        <a href="medical/">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h5 class="card-title">Medical Records</h5>
            <p class="card-text">Manage user accounts and roles</p>
          </div>
        </div>
          </a>
      </div>
    
      <div class="col-md-5 col-lg-2">
        <a href="nurses/">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h5 class="card-title">Nurses</h5>
            <p class="card-text">Manage  medications and treatments, monitoring vital signs and maintaining medical records.</p>
          </div>
        </div>
            </a>
      </div>


      <div class="col-md-5 col-lg-2">
        <a href="Doctor/">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h5 class="card-title">Doctor</h5>
            <p class="card-text">Manage Doctors, Test records and prescriptions</p>
          </div>
        </div>
         </a>
      </div>


     

      <div class="col-md-5 col-lg-2">
        <a href="lab/">
        <div class="card bg-info text-white">
          <div class="card-body">
            <h5 class="card-title">Lab</h5>
            <p class="card-text">Manage lab tests and results</p>
          </div>
        </div>
            </a>
      </div> 



      <div class="col-md-5 col-lg-2">
          <a href="pharmacy/">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h5 class="card-title">Pharmacy</h5>
            <p class="card-text">Manage prescriptions and medication</p>
          </div>
        </div>
        </a>
      </div>


    </div>
  </div>
<?php include "includes/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
