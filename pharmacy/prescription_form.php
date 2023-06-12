<!DOCTYPE html>
<html>
<head>
  <title>Pharmacy Prescription Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .form-group input[type="text"],
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form-group button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Pharmacy Prescription Form</h2>
    <form id="prescriptionForm">
      <div class="form-group">
        <label for="patientName">Patient Name:</label>
        <input type="text" id="patientName" name="patientName" required>
      </div>
      <div class="form-group">
        <label for="medication">Medication:</label>
        <textarea id="medication" name="medication" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="dosage">Dosage:</label>
        <input type="text" id="dosage" name="dosage" required>
      </div>
      <div class="form-group">
        <label for="frequency">Frequency:</label>
        <input type="text" id="frequency" name="frequency" required>
      </div>
      <div class="form-group">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>

  <script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    // Add form submission logic here
    document.getElementById("prescriptionForm").addEventListener("submit", function(event) {
      event.preventDefault();
      // You can handle form submission using JavaScript or submit it to a server
      // For example:
      var formData = new FormData(this);
      // Process the form data as needed
      console.log(formData);
    });
  </script>
</body>
</html>
