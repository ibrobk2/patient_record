<?php

include "../includes/connection.php"; 

if(isset($_POST['searchTerm'])){
    $input = $_POST['searchTerm'];


    $sql = "SELECT * FROM patients WHERE patient_id LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){ ?>

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

    <tr>
    <td>    <div id="searchresult"></div>
</td>

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
      <td><a href="../medical/register_patient.php?edit=<?=$row['patient_id']; ?>" class="btn btn-primary" >Edit</a></td>
      <td><a href="delete_patient.php?delete=<?=$row['patient_id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr> 
    <?php endwhile; ?>

  </table>

    <?php    
    }else{
        echo "<h4>No Record Found</h4>";
    }
}

?>