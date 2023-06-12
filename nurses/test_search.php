<!DOCTYPE html>
<html>
<head>
  <title>Search Patient Records</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#searchForm').submit(function(e) {
        e.preventDefault();
        var searchTerm = $('#searchTerm').val();

        $.ajax({
          url: 'fetch_patient.php',
          type: 'POST',
          data: { searchTerm: searchTerm },
          success: function(response) {
            $('#searchResults').html(response);
          }
        });
      });
    });
  </script>
</head>
<body>
  <h2>Search Patient Records</h2>
  <form id="searchForm">
    <input type="text" id="searchTerm" name="searchTerm" placeholder="Enter search term">
    <button type="submit">Search</button>
  </form>
  <div id="searchResults"></div>
</body>
</html>
