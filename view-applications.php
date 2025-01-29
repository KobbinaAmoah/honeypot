<?php
include 'db.php';

$sql = "SELECT * FROM admissions ORDER BY submitted_at DESC";
$result = $conn->query($sql);

echo "<h2>Submitted Applications</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Previous School</th>
            <th>Grade Level</th>
            <th>Guardian Name</th>
            <th>Guardian Phone</th>
            <th>Guardian Email</th>
            <th>Academic Records</th>
            <th>Health Form</th>
            <th>Submitted At</th>
        </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['full_name']."</td>
                <td>".$row['dob']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['previous_school']."</td>
                <td>".$row['grade_level']."</td>
                <td>".$row['guardian_name']."</td>
                <td>".$row['guardian_phone']."</td>
                <td>".$row['guardian_email']."</td>
                <td><a href='".$row['academic_records']."' download>Download</a></td>
                <td><a href='".$row['health_form']."' download>Download</a></td>
                <td>".$row['submitted_at']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='14'>No applications found</td></tr>";
}
echo "</table>";

$conn->close();
?>
