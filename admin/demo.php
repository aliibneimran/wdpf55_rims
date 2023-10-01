<!DOCTYPE html>
<html>
<head>
    <title>View File</title>
    <!-- Add necessary CSS and JavaScript libraries here -->
</head>
<body>
    <button id="openModalBtn">View File</button>
    
    <!-- Modal -->
    <div id="fileModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <embed id="fileViewer" width="100%" height="400px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#openModalBtn").click(function () {
                // Make an AJAX request to get the file URL from the server
                $.ajax({
                    url: "get_file.php",
                    type: "GET",
                    success: function (data) {
                        // Set the file URL to the embed element
                        $("#fileViewer").attr("src", data);
                        // Open the modal
                        $("#fileModal").modal("show");
                    },
                    error: function () {
                        alert("Error fetching file.");
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
// Connect to your database here
// Replace with your database credentials
$host = "your_db_host";
$username = "your_db_username";
$password = "your_db_password";
$database = "your_db_name";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the file URL from the database (Replace with your actual query)
$query = "SELECT file_url FROM files WHERE id = 1"; // Adjust the query as needed

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileURL = $row["file_url"];
    echo $fileURL;
} else {
    echo "File not found";
}

$conn->close();
?>

