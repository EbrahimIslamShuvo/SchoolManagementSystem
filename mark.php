<?php
require_once('confiq/conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacherId = $_POST['teacherId'];
    $year = $_POST['year'];
    $courseData = $_POST['course'];
    $totalMark = $_POST['totalMark'];


    // Split course data into individual pieces
    list($courseId, $shift, $year, $class) = explode('-', $courseData);

    //Use the data
    // echo "Teacher ID: $teacherId<br>";
    // echo "Year: $year<br>";
    // echo "Course ID: $courseId<br>";
    // echo "Shift: $shift<br>";
    // echo "Class: $class<br>";
    $sql3 = "SELECT * FROM mark WHERE courseId = '$courseId' AND year = '$year'";
    $result3 = $con->query($sql3);

    // Count the number of rows
    $count = $result3->num_rows;

    $row3 = mysqli_fetch_array($result3);

    if($count > 0){
        echo '<script>
                    alert("Already mark submitted");
                    window.location.href = "/School Management System/teacher.php?id=' . urlencode($teacherId) . '&year=' . urlencode($year) . '";
                </script>';
    }


    $sql1 = "SELECT name,id FROM course WHERE id= '$courseId'";
    $result1 = $con->query($sql1);
    $row1 = mysqli_fetch_array($result1);

    $sql2 = "SELECT name,roll FROM student WHERE (class= '$class' AND year ='$year')";
    $result2 = $con->query($sql2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Entry</title>
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css"
        rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative">
        <!-- Background Image -->
        <img class="absolute -z-20 blur-sm w-full h-screen" src="photo/home-bg.jpg" alt="Background Image">

        <!-- Mark Entry Form -->
        <div class="p-6 bg-white/80 shadow-lg rounded-lg w-10/12 mx-auto mt-10">
            <!-- Course Details -->
            <div class="mb-6 text-center">
                <p class="text-2xl font-bold text-gray-800">Course Name: <?php echo ($row1['name']); ?>
                </p>
                <p class="text-xl font-semibold text-gray-700">Course Code: <?php echo ($row1['id']); ?></p>
            </div>

            <!-- Form -->
            <form action="confiq/submitMarkCon.php" method="POST">
            <input type="hidden" name="teacherId" value=<?php echo ($teacherId) ?>>
            <input type="hidden" name="courseId" value=<?php echo ($courseId) ?>>
            <input type="hidden" name="class" value=<?php echo ($class) ?>>
            <input type="hidden" name="year" value=<?php echo ($year) ?>>
                <!-- Mark Entry Table -->
                <table class="w-full text-center text-lg mx-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-700 text-white">
                            <th class="py-3 px-4 border border-gray-300">Name</th>
                            <th class="py-3 px-4 border border-gray-300">Roll</th>
                            <th class="py-3 px-4 border border-gray-300">Get Mark</th>
                            <th class="py-3 px-4 border border-gray-300">Total Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($row2 = mysqli_fetch_array($result2))
                        {
                        ?>
                        <tr class="even:bg-gray-200 odd:bg-gray-100 text-black">
                            <td class="py-3 px-4 border border-gray-300">
                                <input 
                                    type="text" 
                                    name="student_name[]" 
                                    class="w-full p-1 bg-transparent text-center border border-gray-300 rounded-md" 
                                    value="<?php echo ($row2['name']) ?>" 
                                    readonly>
                            </td>
                            <td class="py-3 px-4 border border-gray-300">
                                <input 
                                    type="text" 
                                    name="student_roll[]" 
                                    class="w-full p-1 bg-transparent text-center border border-gray-300 rounded-md" 
                                    value="<?php echo ($row2['roll']) ?>" 
                                    readonly>
                            </td>
                            <td class="py-3 px-4 border border-gray-300">
                                <input 
                                    type="number" 
                                    name="marks[]" 
                                    class="w-full p-1 bg-transparent text-center border border-gray-300 rounded-md" 
                                    placeholder="Enter Mark" 
                                    required>
                            </td>
                            <td class="py-3 px-4 border border-gray-300">
                                <input 
                                    type="text" 
                                    name="totalMarks" 
                                    class="w-full p-1 bg-transparent text-center border border-gray-300 rounded-md" 
                                    value="<?php echo ($totalMark) ?>" 
                                    readonly>
                            </td>
                        </tr><?php 
                        }
                    ?>
                    </tbody>
                </table>

                <!-- Submit Button -->
                <div class="text-center mt-6">
                    <button type="submit" class="btn btn-info text-lg">Submit Marks</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
