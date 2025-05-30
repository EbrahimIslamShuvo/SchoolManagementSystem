<?php 
require_once('confiq/conection.php');

if (isset($_GET['class']) && isset($_GET['shift'])) {
    $class = $_GET['class'];
    $shift = $_GET['shift'];

    // Fetch user data from the database using a prepared statement
    $u_sql = "SELECT * FROM student WHERE class = ? AND shift = ?";
    $u_stmt = mysqli_prepare($con, $u_sql);

    // Bind the parameters
    mysqli_stmt_bind_param($u_stmt, "ss", $class, $shift);

    // Execute the statement
    mysqli_stmt_execute($u_stmt);

    // Get the result
    $u_result = mysqli_stmt_get_result($u_stmt);

    
} else {
    // Redirect user if 'class' or 'shift' parameter is not provided
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css"
        rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative">
        <!-- Background Image -->
        <img class="absolute -z-20 blur-sm w-full h-screen" src="photo/home-bg.jpg" alt="Background Image">

        <!-- student List -->
        <div class="p-6 bg-white/80 shadow-lg rounded-lg w-9/12 mx-auto mt-10">
            <!-- class Details -->
            <div class="mb-6 text-center">
                <p class="text-2xl font-bold text-gray-800">Class: 10</p>
                <p class="text-xl font-semibold text-gray-700">Shift: Morning</p>
            </div>

            
            <!-- List Table -->
            <table class="w-10/12 text-center text-lg mx-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="py-3 px-4 border border-gray-300">Name</th>
                        <th class="py-3 px-4 border border-gray-300">ID</th>
                        <th class="py-3 px-4 border border-gray-300">Class</th>
                        <th class="py-3 px-4 border border-gray-300">Shift</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row = mysqli_fetch_array($u_result)){
                    ?>
                    <tr class="even:bg-gray-200 odd:bg-gray-100 text-black">
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo $row['name'] ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo $row['roll']?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo $row['class']?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo $row['shift']?>
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
