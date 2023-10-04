<?php
// ... (Previous code)

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["JobSeekerID"] . "</td>";
        echo "<td>" . $row["FirstName"] . "</td>";
        echo "<td>" . $row["LastName"] . "</td>";
        echo "<td>" . $row["ContactNumber"] . "</td>";
        echo "<td>" . $row["Skills"] . "</td>";
        echo "<td>" . $row["Education"] . "</td>";
        echo "<td>" . $row["Experience"] . "</td>";
        // Add a button to open the modal and pass the resume URL
        echo '<td><button class="btn btn-primary" onclick="openResumeModal(\'' . $row["Resume"] . '\')">View Resume</button></td>';
        echo "</tr>";
    }
} else {
    echo "No records found";
}

// ... (Remaining code)
?>
