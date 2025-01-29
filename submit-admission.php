<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize form data
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $previous_school = $conn->real_escape_string($_POST['previous_school']);
    $grade_level = $conn->real_escape_string($_POST['grade_level']);
    $guardian_name = $conn->real_escape_string($_POST['guardian_name']);
    $guardian_phone = $conn->real_escape_string($_POST['guardian_phone']);
    $guardian_email = $conn->real_escape_string($_POST['guardian_email']);

    // Handle file uploads
    $academic_records = "";
    $health_form = "";

    if (!empty($_FILES["academic_records"]["name"])) {
        $academic_records = "uploads/" . basename($_FILES["academic_records"]["name"]);
        move_uploaded_file($_FILES["academic_records"]["tmp_name"], $academic_records);
    }

    if (!empty($_FILES["health_form"]["name"])) {
        $health_form = "uploads/" . basename($_FILES["health_form"]["name"]);
        move_uploaded_file($_FILES["health_form"]["tmp_name"], $health_form);
    }

    // Insert into database
    $sql = "INSERT INTO admissions 
            (full_name, dob, gender, email, phone, previous_school, grade_level, academic_records, health_form, guardian_name, guardian_phone, guardian_email) 
            VALUES 
            ('$full_name', '$dob', '$gender', '$email', '$phone', '$previous_school', '$grade_level', '$academic_records', '$health_form', '$guardian_name', '$guardian_phone', '$guardian_email')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
