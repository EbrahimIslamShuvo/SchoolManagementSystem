<?php
    require_once("confiq\conection.php");
    $sql = "SELECT * FROM users where type = 'teacher'";
    $result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teacher</title>
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css"
        rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative">
        <!-- Background Image -->
        <img class="absolute -z-20 blur-sm w-full h-screen" src="photo/home-bg.jpg" alt="Background Image">

        <!-- teacher List -->
        <div class="p-6 bg-white/80 shadow-lg rounded-lg w-9/12 mx-auto mt-10">
            <!-- heading Details -->
            <div class="mb-6 text-center">
                <p class="text-2xl font-bold text-gray-800">Teacher List</p>
            </div>

            
            <!-- List Table -->
            <table class="w-10/12 text-center text-lg mx-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="py-3 px-4 border border-gray-300">Name</th>
                        <th class="py-3 px-4 border border-gray-300">ID</th>
                        <th class="py-3 px-4 border border-gray-300">Phone</th>
                        <th class="py-3 px-4 border border-gray-300">Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr class="even:bg-gray-200 odd:bg-gray-100 text-black">
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['name']); ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['id']); ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['phone']); ?>
                        </td>
                        <td class="py-3 px-4 border border-gray-300">
                            <?php echo ($row['email']); ?>
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
