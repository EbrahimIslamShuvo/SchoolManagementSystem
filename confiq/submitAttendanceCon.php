<?php
require_once('conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve hidden input data
    $teacherId = $_POST['teacherId'];
    $courseId = $_POST['courseId'];
    $class = $_POST['class'];
    $year = $_POST['year'];
    $shift = $_POST['shift'];
    $date = $_POST['date'];

    // Validate attendance data
    if (!isset($_POST['student_roll']) || !is_array($_POST['student_roll']) || 
        !isset($_POST['status']) || !is_array($_POST['status'])) {
        echo "Error: Attendance data is not valid.";
        exit;
    }

    $student_rolls = $_POST['student_roll'];
    $statuses = $_POST['status'];

    // Prepare SQL query
    $stmt = $con->prepare("INSERT INTO attendance (studentId, teacehrId, courseId, class, year, shift, status, day) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . $con->error;
        exit;
    }

    // Loop through attendance data and insert into the database
    foreach ($student_rolls as $index => $studentId) {
        $status = $statuses[$index];
        $stmt->bind_param("ssssssss", $studentId, $teacherId, $courseId, $class, $year, $shift, $status, $date);

        if (!$stmt->execute()) {
            echo "Error inserting data for student ID: $studentId. " . $stmt->error;
        }
    }

    $stmt->close();
    $con->close();

    // Redirect to success or another page
    //header("Location: ../success.php");
    //echo "done.";
    echo '<script>
                alert("Attendance Record Sucessfull.");
                window.location.href = "/School Management System/teacher.php?id=' . urlencode($teacherId) . '&year=' . urlencode($year) . '";
          </script>';
} else {
    echo "Invalid request method.";
}
?>
