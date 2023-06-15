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

//Edit SECTION

$update = false;
$pres_id = "";
$patient_id = "";
$patient_name = "";
$patient_age = "";
$drugs = "";
$dosage = "";
$doctors_name ="";

if(isset($_GET['edit'])){
    $update = true;
    $pres_id = $_GET['edit'];

    $sql = "SELECT * FROM prescriptions WHERE prescription_id=$pres_id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $patient_id = $data['patient_id'];
    $patient_name = $data['patient_name'];
    $patient_age = $data['patient_age'];
    $drugs = $data['medication_name'];
    $dosage = $data['dosage'];
    $doctors_name = $data['prescribing_doctor'];
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
        <?php if ($update==true): ?>
        <h2 style="text-align:center;">Update Prescription</h2>
        <?php else: ?>
        <h2 style="text-align:center;">Drugs Prescription Form</h2>
        <?php endif; ?>
        <form action="process.php" class="form" method="POST">
        <div class="form-group">
                <label for="patient_id">patient_id:</label>
                <input type="hidden" id="pres_id" name="pres_id" value="<?=$pres_id; ?>" class="form-control" required>
                <input type="text" id="patient_id" name="patient_id" value="<?=$patient_id; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="patient_name">patient_name:</label>
                <input type="text" id="patient_name" name="patient_name" value="<?=$patient_name; ?>"  readonly class="form-control" required>
            </div>
            <div class="form-group">
                <label for="patient_age">patient_age:</label>
                <input type="text" id="patient_age" name="patient_age" readonly value="<?=$patient_age; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="drugs_prescription">drugs_prescription:</label>
                <textarea name="drug" id="drugs_prescription" class="form-control" cols="30" rows="10" value="<?=$drugs; ?>" name="drugs_prescription"><?=$drugs; ?></textarea>
            </div>
            <div class="form-group">
                <label for="dosage">Dosage:</label>
                <input type="text" id="dosage" name="dosage" value="<?=$dosage; ?>" class="form-control" required>
            </div> 
            <div class="form-group">
                <label for="prescribing_doctor">Prescribing_Doctor:</label>
                <?php if($update==true): ?>
                <input type="text" id="doctors_name" name="doctors_name"  class="form-control" value="<?=$doctors_name; ?>" readonly>
                <?php else: ?>
                <input type="text" id="doctors_name" name="doctors_name"  class="form-control" value="<?=$row['full_name']; ?>" readonly>
                <?php endif; ?>
            </div> 
            <br>
            <div class="form-group">
                <?php if($update==true): ?>
                <button class="btn btn-primary form-control" name="btn_pre_update">Update</button>
                <?php else: ?>
                <button class="btn btn-primary form-control" name="btn_pre">Submit</button>
                <?php endif; ?>
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