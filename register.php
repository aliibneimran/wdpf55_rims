<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="card card-body">
        <h2>User Registration</h2>
        <form action="process_registration.php" method="POST">
            <div class="from-group mb-3 mt-3">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="from-group mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="from-group mb-3 mt-3">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="from-group mb-3 mt-3">
                <label for="userType">User Type:</label>
                <select id="userType" name="userType" class="form-control" required>
                    <option value="">Select One</option>
                    <option value="Job Seeker">Job Seeker</option>
                    <option value="Employer">Employer</option>
                </select>
            </div>
            <div class="from-group mb-3 mt-3">
                <input type="submit" class="btn btn-success" value="Register">
            </div>
        </form>
    </div>
    
</body>
</html>
