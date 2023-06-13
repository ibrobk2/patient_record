<?php
include "../includes/connection.php";
session_start();

if(isset($_SESSION['username'])){


$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE role='doctor' AND username='$username'";
$result = mysqli_query($conn, $sql);

if($result){
    $row = mysqli_fetch_assoc($result);

}

}else{
    $row['full_name'] = "";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Prescription Form</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        .container{
            width: 45%;
        }
    </style>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <a href="../logout.php" style="position: absolute; right:10px;color:red;"><h2>Logout</h2></a>

    <div class="container">
        <h2 style="text-align:center;">Drugs Prescrition Form</h2>
        <form action="process.php" class="form" method="POST">
        <div class="form-group">
                <label for="patient_id">patient_id:</label>
                <input type="text" id="patient_id" name="patient_id"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="patient_name">patient_name:</label>
                <input type="text" id="patient_name" name="patient_name"  readonly class="form-control" required>
            </div>
            <div class="form-group">
                <label for="patient_age">patient_age:</label>
                <input type="text" id="patient_age" name="patient_age" readonly  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="drugs_prescription">drugs_prescription:</label>
                <textarea name="drug" id="drugs_prescription" class="form-control" cols="30" rows="10" name="drugs_prescription"></textarea>
            </div>
            <div class="form-group">
                <label for="dosage">Dosage:</label>
                <input type="text" id="dosage" name="dosage"  class="form-control" required>
            </div> 
            <div class="form-group">
                <label for="prescribing_doctor">Prescribing_Doctor:</label>
                <input type="text" id="doctors_name" name="doctors_name"  class="form-control" value="<?=$row['full_name']; ?>" readonly>
            </div> 
            <br>
            <div class="form-group">
                <button class="btn btn-primary form-control" name="btn_pre">Submit</button>
            </div>
            <br>
        </form>
    </div>
    <!-- <script src="../static/jquery-3.6.0.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
$(document).ready(function () {
    $("#patient_id").change(function () {
        var patient_id = $("#patient_id").val();
        $.ajax({
            type: "POST",
            url: "fetch_pres_patient.php",
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
</html>