<?php
include "../includes/connection.php";


if(isset($_GET['update'])){
  echo "
    <script>
      alert('User Updated Successfully...');
    </script>
  ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Manage Users/Staff Records</title>
  <style>
    .container {
      /* max-width: 400px; */
      margin: 0 auto;
      margin-top: 100px;
      /* display: flex; */

    }
  
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
      background-color: #f1f2f2;
      padding: 5px;
    }

    td{
      padding: 5px;
    }

    tr:nth-of-type(odd){
      background-color: #f1f5f8;
    }
 

  .form-group{
    margin-left: 150px;
    margin-right: -120px;
  }

 .p{
        position: absolute;
        right: 160px;
       
    }
    .p{
        right: 270px;
    }
    .d{
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
    <h2 style="text-transform:uppercase;" class="text-center">(Manage Users/Staff Record)</h2>
    <form method="GET" action="search.php">
      <div class="form-group" >
      
        <label for="search">Search Number:</label>
        <input type="text" id="search" name="search" class="form-control" placeholder="Enter staff by phone number" required>
      </div>
      <!-- <br> -->
      <div>
      <button type="submit" class="btn btn-primary p" style="margin-top:2.5%">Find</button>
      <button type="submit" class="btn btn-danger d" style="margin-top:2.5%">Logout</button>
      </div>
    </form>
    </div>
  </div>
  <table>
    <tr>
      <th>Full Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Username</th>
      <!-- <th>Password</th> -->
      <th>Role</th>
      <th colspan="2">Action</th>

    </tr>
    <?php 
    $sql = "SELECT * FROM users";
    $res = mysqli_query($conn, $sql);

    
    while($row = mysqli_fetch_assoc($res)){

     
    ?>
    <tr>
      <td><?php echo $row['full_name']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['role']; ?></td>
      <td><a href="register.php?edit=<?=$row['user_id']; ?>" class="btn btn-primary" >Edit</a></td>
      <td><a href="delete_user.php?delete=<?=$row['user_id']; ?>" class="btn btn-danger">Delete</a></td>
      
    </tr>

    <?php  } ?>
  </table>
</body>

</html>
