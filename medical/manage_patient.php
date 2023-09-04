<?php
include "../includes/connection.php";


$sql = "SELECT * FROM patients ORDER BY patient_id DESC;";
$result = mysqli_query($conn, $sql);







?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
  <title>Manage Test Records</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .container {
      /* max-width: 400px; */
      margin: 0 auto;
      margin-top: 100px;
      /* display: flex; */

    }

  .form-group{
    margin-left: 150px;
    margin-right: -100px;
  }

 #p{
        position: absolute;
        right: 270px;
       
    }
    /* #p{
        right: 270px;
    } */
    #d{
        position: absolute;
        right: 160px;
    }
    #p, #d{
        top: 200px;
    }
    table{
      width: 100%;
      margin-top: 10px;
      text-align:center;

    }
    table, th, td{
      /* border: 2px solid black; */
    }
    th{
      background-color: gray;
      padding: 5px;
    }

    td{
      padding: 5px;
    }

    tr:nth-of-type(odd){
      background-color: #f1f5f8;
    }
  </style>

</head>

<body>
  <div class="container" style="border:5px solid black; padding: 20px; display:flex;">
  <a href="./admin_dashboard/"><img src="../images/hukpoly_logo.webp" alt=""></a>
    <div>
    <h2 style="text-transform:uppercase;" class="text-center">Hassan Usman Katsina Polytechnic Clinic</h2>
    <h2 style="text-transform:uppercase;" class="text-center">(Manage Patients Record)</h2>
    <form method="POST" action="">
      <div class="form-group" >
      
        <label for="search">Search Hospital Number:</label>
        <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Enter patient by number" required>
      </div>
     
      <!-- <br> -->
      <div>
      <button type="submit" class="btn btn-primary" style="margin-top:2.5%" id="searchForm p">Find</button>
      <button type="submit" class="btn btn-danger" style="margin-top:2.5%" id="d">Logout</button>
      </div>
    </form>
    </div>
    
  </div>
  <div id="searchResults">
  <table>
    <tr>
      <th>hospitalNumber</th>
      <th>fullName</th>
      <th>DOB</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Insurance</th>
      <th>InsuranceNo.</th>
      <th>NextOfKin</th>
      <th>NextOfKinPhone</th>
      <th colspan="2">Action</th>
    </tr>

    <?php
    while($row=mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?=$row['patient_id']; ?></td>
      <td><?=$row['full_name']; ?></td>
      <td><?=$row['date_of_birth']; ?></td>
      <td><?=$row['address']; ?></td>
      <td><?=$row['contact_number']; ?></td>
      <td><?=$row['age']; ?></td>
      <td><?=$row['gender']; ?></td>
      <td><?=$row['email']; ?></td>
      <td><?=$row['insurance_provider']; ?></td>
      <td><?=$row['insurance_policy_number']; ?></td>
      <td><?=$row['emergency_contact_name']; ?></td>
      <td><?=$row['emergency_contact_number']; ?></td>
      <td><a href="register_patient.php?edit=<?=$row['patient_id']; ?>" class="btn btn-primary" >Edit</a></td>
      <td><a href="delete_patient.php?delete=<?=$row['patient_id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endwhile; ?>

  </table>
  </div>
</body>


<script>
    $(document).ready(function() {
      // Submit form with AJAX
      $('#searchTerm').keyup(function(event) {
        event.preventDefault(); // Prevent form submission

        var searchTerm = $(this).val();

        // AJAX request
        $.ajax({
          url: 'search_data.php', // The PHP script to handle the search
          type: 'POST',
          data: { x: searchTerm },
          success: function(response) {
            $('#searchResults').html(response); // Display the search results
          }
        });
      });
    });
  </script>

</html>
