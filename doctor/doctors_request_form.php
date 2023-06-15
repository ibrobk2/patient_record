<?php
include "../includes/header.php";
include "../includes/connection.php";
$update = false;
$test_one = "";
$test_two = "";
$test_three = "";
$test_four = "";
$test_five = "";
$test_six = "";
$test_seven = "";
$test_eight = "";
$test_nine = "";
$test_ten = "";
$patient_id = "";
$patient_name = "";
$patient_age = "";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

    $sql = "SELECT * FROM doctors_requests WHERE id=$id";

    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    $patient_id = $row['patient_id'];
    $patient_name = $row['patient_name'];
    $patient_age = $row['age'];
    $test_one = $row['test_one'];
    $test_two = $row['test_two'];
    $test_three = $row['test_three'];
    $test_four = $row['test_four'];
    $test_five = $row['test_five'];
    $test_six = $row['test_six'];
    $test_seven = $row['test_seven'];
    $test_eight = $row['test_eight'];
    $test_nine = $row['test_nine'];
    $test_ten = $row['test_ten'];

    $sql = "UPDATE doctors_requests SET  WHERE id=$id";

    $query = mysqli_query($conn, $sql);

    if($query){
        header("location:doctors_lab_request.php");
    }
    // else{
    //     echo"error occurred";
    // };

}








?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>doctors_request</title>
  <style>
    .container{
        width:40%;
    }
    </style>
<body>
    <div class="container">
        <h2>Doctors Lab. Test/Scan Request Form</h2>
        <hr>
        <div class="doctors_request">
            <form action="process.php" class="form" method="post">
            <div class="form-group">
                <label for="patient_id">Patient_Id:</label>
                <input type="text" id="patient_id" name="Patient_id" value="<?php echo $patient_id; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="patient_id">Patient_Name:</label>
                <input type="text" id="patient_name" name="Patient_name" value="<?php echo $patient_name; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="patient_age">Patient_Age:</label>
                <input type="text" id="patient_age" name="Patient_age" value="<?php echo $patient_age; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_one">Test_one:</label>
                <input type="hidden" id="test_one" name="id" value="<?php echo $id; ?>" class="form-control" required>
                <input type="text" id="test_one" name="test_one" value="<?php echo $test_one; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_two">Test_two:</label>
                <input type="text" id="test_two" name="test_two" value="<?php echo $test_two; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_three">Test_three:</label>
                <input type="text" id="test_three" value="<?php echo $test_three; ?>" name="test_three" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_four">Test_four:</label>
                <input type="text" id="test_four" value="<?php echo $test_four; ?>" name="test_four" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_five">Test_five:</label>
                <input type="text" id="test_five" value="<?php echo $test_five; ?>" name="test_five" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_six">Test_six:</label>
                <input type="text" id="test_six" value="<?php echo $test_six; ?>" name="test_six" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_seven">Test_seven:</label>
                <input type="text" id="test_seven" value="<?php echo $test_seven; ?>" name="test_seven" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_eight">Test_eigth:</label>
                <input type="text" id="test_eight" value="<?php echo $test_eight; ?>" name="test_eight" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_nine">Test_nine:</label>
                <input type="text" id="test_nine" value="<?php echo $test_nine; ?>" name="test_nine" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="test_ten">Test_ten:</label>
                <input type="text" id="test_ten" value="<?php echo $test_ten; ?>" name="test_ten" class="form-control" required>
            </div>
            <?php if($update==true){ ?>
            <button type="submit" class="btn btn-primary form-control mt-3" name="update">update</button>
            <?php }else{ ?>
            <button type="submit" class="btn btn-primary form-control mt-3" name="dq">submit</button>
            <?php } ?>
            </form>

        </div>
    </div>

    <script src="jquery.js"></script>
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
</head>
</html>