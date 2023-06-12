<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Manage Patient Records</title>
  <style>
    .container {
      /* max-width: 400px; */
      margin: 0 auto;
      margin-top: 100px;
      /* display: flex; */

    }

  .form-group{
    margin-left: 150px;
    margin-right: -120px;
  }

 .btn-primary{
        position: absolute;
        right: 160px;
       
    }
    .btn-primary{
        right: 270px;
    }
    .btn-danger{
        position: absolute;
        right: 160px;
    }
    .btn-primary, .btn-danger{
        top: 200px;
    }
  </style>
</head>

<body>
  <div class="container" style="border:5px solid black; padding: 20px; display:flex;">
  <a href="./admin_dashboard/"><img src="../images/hukpoly_logo.webp" alt=""></a>
    <div>
    <h2 style="text-transform:uppercase;" class="text-center">Hassan Usman Katsina Polytechnic Clinic</h2>
    <h2 style="text-transform:uppercase;" class="text-center">(Manage Patients Record)</h2>
    <form method="GET" action="search.php">
      <div class="form-group" >
      
        <label for="search">Search Number:</label>
        <input type="text" id="search" name="search" class="form-control" placeholder="Enter patient by number" required>
      </div>
      <!-- <br> -->
      <div>
      <button type="submit" class="btn btn-primary" style="margin-top:2.5%">Find</button>
      <button type="submit" class="btn btn-danger" style="margin-top:2.5%">Logout</button>
      </div>
    </form>
    </div>
  </div>
</body>

</html>
