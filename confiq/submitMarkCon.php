<?php
require_once('conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve hidden input data
    $teacherId = $_POST['teacherId'];
    $courseId = $_POST['courseId'];
    $class = $_POST['class'];
    $year = $_POST['year'];
    $totalMark = $_POST['totalMarks'];

    // Validate marks data
    if (!isset($_POST['student_roll']) || !is_array($_POST['student_roll']) || !is_array($_POST['marks'])) {
        echo "Error: marks data is not valid.";
        exit;
    }

    $student_rolls = $_POST['student_roll'];
    $marks = $_POST['marks'];

    // Prepare SQL query
    $stmt = $con->prepare("INSERT INTO mark (studentId, teacherId, courseId, class, year, getMark, totalMark) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . $con->error;
        exit;
    }

    // Loop through marks data and insert into the database
    foreach ($student_rolls as $index => $studentId) {
        $getMark = $marks[$index]; // Fetch the corresponding mark for the student

        // Bind parameters: "sssssid" (s = string, i = integer, d = double)
        $stmt->bind_param("sssssid", $studentId, $teacherId, $courseId, $class, $year, $getMark, $totalMark);

        if (!$stmt->execute()) {
            echo "Error inserting data for student ID: $studentId. " . $stmt->error;
        }
    }

    $stmt->close();
    $con->close();

    // Redirect to success or another page using JavaScript
    echo '<script>
            alert("Marks submitted successfully!");
            window.location.href = "/School Management System/teacher.php?id=' . urlencode($teacherId) . '&year=' . urlencode($year) . '";
          </script>';
} else {
    echo "Invalid request method.";
}
?>
