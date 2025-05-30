<?php 
require_once('confiq/conection.php');

if (isset($_GET['teacherId']) && isset($_GET['courseId']) && isset($_GET['class']) && isset($_GET['year']) && isset($_GET['shift'])) {
    $teacherId = $_GET['teacherId'];
    $courseId = $_GET['courseId'];
    $class = $_GET['class'];
    $year = $_GET['year'];
    $shift = $_GET['shift'];
    // echo $class;
    // echo $year;
    // echo $shift;


    $sql = "SELECT * FROM student where (class = '$class' AND year='$year' AND shift = '$shift')";
    $result = $con->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css"
        rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative">
        <!-- Background Image -->
        <img class="absolute -z-20 blur-sm w-full h-screen" src="photo/home-bg.jpg" alt="Background Image">

        <!-- attendance List -->
        <div class="p-6 bg-white/80 shadow-lg rounded-lg w-9/12 mx-auto mt-10">
            <!-- Course Details -->
            <div class="mb-6 text-center">
                <p class="text-2xl font-bold text-gray-800">Course Name: Programming Java</p>
                <p class="text-xl font-semibold text-gray-700">Course Code: CSC 383</p>
            </div>

            
            <!-- List Table -->
            <table class="w-10/12 text-center text-lg mx-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="py-3 px-4 border border-gray-300">Name</th>
                        <th class="py-3 px-4 border border-gray-300">ID</th>
                        <th class="py-3 px-4 border border-gray-300">Class</th>
                        <th class="py-3 px-4 border border-gray-300">Shift</th>
                        <th class="py-3 px-4 border border-gray-300">Total Class</th>
                        <th class="py-3 px-4 border border-gray-300">Total Present</th>
                        <th class="py-3 px-4 border border-gray-300">Total Absent</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr class="even:bg-gray-200 odd:bg-gray-100 text-black">
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['name']) ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['roll']) ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['class']) ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['shift']) ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php 
                                $studentId = $row['roll'];
                                $sql1 = "SELECT * FROM attendance WHERE courseId = '$courseId' AND year = '$year' AND studentId = '$studentId' AND teacehrId = '$teacherId' AND shift = '$shift' AND class = '$class'";
                                $result1 = $con->query($sql1);
                                $count1 = $result1->num_rows;
                                $row1 = mysqli_fetch_array($result1);
                                echo ($count1);
                                // echo ($courseId.'<br>');
                                // echo ($year.'<br>');
                                // echo ($studentId.'<br>');
                                // echo ($teacherId.'<br>');
                                // echo ($shift.'<br>');
                                // echo ($class.'<br>');
                                // echo ($year.'<br>');
                            ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php 
                                $studentId = $row['roll'];
                                $sql2 = "SELECT * FROM attendance WHERE courseId = '$courseId' AND year = '$year' AND studentId = '$studentId' AND teacehrId = '$teacherId' AND shift = '$shift' AND class = '$class' AND status = 'Present'";
                                $result2 = $con->query($sql2);
                                $count2 = $result2->num_rows;
                                $row2 = mysqli_fetch_array($result2);
                                echo ($count2) 
                            ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php 
                                $studentId = $row['roll'];
                                $sql3 = "SELECT * FROM attendance WHERE courseId = '$courseId' AND year = '$year' AND studentId = '$studentId' AND teacehrId = '$teacherId' AND shift = '$shift' AND class = '$class' AND status = 'Absent'";
                                $result3 = $con->query($sql3);
                                $count3 = $result3->num_rows;
                                $row3 = mysqli_fetch_array($result3);
                                echo ($count3) ;
                                // echo ($courseId.'<br>');
                            ?>
                        </td>
                        
                    </tr>
                    <?php 
                    }
                ?>

                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
