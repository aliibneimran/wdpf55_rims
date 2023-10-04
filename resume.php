<!DOCTYPE html>
<html>
<head>
    <title>Job Seekers List</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Job Seekers List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>JobSeekerID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Skills</th>
                <th>Education</th>
                <th>Experience</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be displayed here -->
            <?php include("fetch_jobseekers.php"); ?>
        </tbody>
    </table>

    <!-- Modal for displaying Resume -->
    <div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="resumeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resumeModalLabel">Resume</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="resumeFrame" style="width: 100%; height: 500px;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to open modal with resume content -->
    <script>
        function openResumeModal(resumeURL) {
            var resumeFrame = document.getElementById("resumeFrame");
            resumeFrame.src = resumeURL;
            $('#resumeModal').modal('show');
        }
    </script>
</body>
</html>
