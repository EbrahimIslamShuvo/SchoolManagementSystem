<?php 
require_once('confiq/conection.php');

if (isset($_GET['id']) && isset($_GET['year'])) {
    $id = $_GET['id'];
    $year = $_GET['year'];

    $sql = "SELECT * FROM course where (teacherId = '$id' AND year='$year')";
    $result = $con->query($sql);
    $result1 = $con->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teacher</title>
        <link
            href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css"
            rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="relative">
            <!-- home bg  -->
            <img class="absolute -z-20 blur-sm w-full h-screen" src="photo/home-bg.jpg" alt>

            <!-- option  -->
            <div class="h-screen flex md:flex-row flex-col justify-center items-center gap-32">

                <!-- Attendance  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="my_modal_1.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">Attendance</p>
                </button>

                <!-- Attendance form -->
                <dialog id="my_modal_1" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="attendance.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">Attendance</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="course">Course</label>
                                <select class="py-2 px-6 rounded-md text-white" name="course" id="course" required>
                                    <?php 
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option 
                                            value="<?php echo ($row['id'] . '-' . $row['shift'] . '-' . $row['year'] . '-' . $row['class']); ?>">
                                            <?php echo ($row['id'] . '-' . $row['shift'] . '-' . $row['year'] . '-' . $row['class']); ?>
                                        </option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="date">Date</label>
                                <input class="py-2 px-6 rounded-md" type="date" name="date" id="date" required>
                            </div>
                            <!-- Hidden Inputs for teacherId and year -->
                            <input type="hidden" name="teacherId" value="<?php echo $id; ?>">
                            <input type="hidden" name="year" value="<?php echo $year; ?>">
                            <div>
                                <button class="btn text-white" type="submit">Next</button>
                            </div>
                        </form>
                    </div>
                </dialog>
                
                <!-- Mark  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 px-[38px] rounded-xl" onclick="my_modal_2.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">Mark</p>
                </button>

                <!-- mark form  -->
                <dialog id="my_modal_2" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="mark.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">Mark</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Course</label>
                                <!-- <input class="py-2 px-6 rounded-md" type="email" placeholder="Enter Your Email" required> -->
                                <select class="py-2 px-6 rounded-md text-white" name="course" id="course">
                                <?php 
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                    ?>
                                        <option 
                                            value="<?php echo ($row1['id'] . '-' . $row1['shift'] . '-' . $row1['year'] . '-' . $row1['class']); ?>">
                                            <?php echo ($row1['id'] . '-' . $row1['shift'] . '-' . $row1['year'] . '-' . $row1['class']); ?>
                                        </option>
                                    <?php 
                                    }
                                ?>
                                 </select>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Total Mark</label>
                                <input class="py-2 px-6 rounded-md" name="totalMark" type="number" required>
                            </div>
                            <input type="hidden" name="teacherId" value="<?php echo $id; ?>">
                            <input type="hidden" name="year" value="<?php echo $year; ?>">
                            <div class="">
                                <button class="btn text-white">Next</button>
                            </div>
                        </form>
                    </div>
                </dialog>

            </div>
        </div>
    </body>
</html>