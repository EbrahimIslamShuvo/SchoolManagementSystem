<?php
    require_once("confiq\conection.php");
    $sql = "SELECT DISTINCT class,shift FROM student";
    $result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link
            href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css"
            rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="relative">
            <!-- Admin bg  -->
            <img class="absolute -z-20 blur-sm w-full h-screen" src="photo/home-bg.jpg" alt>

            <!-- option  -->
            <div class="w-9/12 h-screen grid grid-cols-3 mx-auto justify-center items-center gap-8">

                <!-- New Student  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="my_modal_1.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">New Student</p>
                </button>

                <!-- New Student Form -->
                <dialog id="my_modal_1" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="confiq\addStudentCon.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">New Student</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Name</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="name" placeholder="Enter Student Name" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Roll</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="roll" placeholder="Enter Student Roll" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Phone</label>
                                <input class="py-2 px-6 rounded-md" type="number" name="phone" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Class</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="class" placeholder="Enter Class" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Shift</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="shift" placeholder="Enter Shift" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Year</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="year" placeholder="Enter Year" required>
                            </div>
                            <div class="">
                                <button class="btn text-white w-28">ADD</button>
                            </div>
                        </form>
                    </div>
                </dialog>

                <!-- New Teacher  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="my_modal_2.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">New Teacher</p>
                </button>

                <!-- New Teacher Form -->
                <dialog id="my_modal_2" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="confiq/addTeacherCon.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">New Teacher</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Name</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="name" placeholder="Enter Teacher Name" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">ID</label>
                                <input class="py-2 px-6 rounded-md" type="text"  name="id" placeholder="Enter Teacher ID" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Phone</label>
                                <input class="py-2 px-6 rounded-md" type="number" name="number" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Email</label>
                                <input class="py-2 px-6 rounded-md" type="email" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Password</label>
                                <input class="py-2 px-6 rounded-md" type="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="">
                                <button class="btn text-white w-28">ADD</button>
                            </div>
                        </form>
                    </div>
                </dialog>

                <!-- New Course  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="my_modal_3.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">New Course</p>
                </button>

                <!-- New Course Form -->
                <dialog id="my_modal_3" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="confiq/addCourseCon.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">New Course</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Name</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="name" placeholder="Enter Course Name" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">ID</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="id" placeholder="Enter Course ID" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Teacher ID</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="teacherId" placeholder="Enter Teacher ID" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Class</label>
                                <input class="py-2 px-6 rounded-md" type="number" name="class" placeholder="Enter Class" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Shift</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="shift" placeholder="Enter Shift" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Year</label>
                                <input class="py-2 px-6 rounded-md" type="text" name="year" placeholder="Enter Year" required>
                            </div>
                            <div class="">
                                <button class="btn text-white w-28">ADD</button>
                            </div>
                        </form>
                    </div>
                </dialog>

                <!-- View Student  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="my_modal_4.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">Student</p>
                </button>

                <!-- View Student Popup -->
                <dialog id="my_modal_4" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <div class=" grid grid-cols-3">
                        <?php 
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <a class="btn btn-lg btn-info m-4" href="showStudent.php?class=<?php echo urlencode($row['class']); ?>&shift=<?php echo urlencode($row['shift']); ?>">
                                <?php echo ($row['class'] . '   ' . $row['shift']); ?>
                            </a>
                            <?php
                            }
                        ?>
                        </div>
                    </div>
                </dialog>

                <!-- View Teacher  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="showTeacher()">
                    <img class="w-[70px]" src="photo/teacher.png" alt="Teacher">
                    <p class="text-2xl text-white font-semibold">Teacher</p>
                </button>                
                <script>
                    function showTeacher() {
                      window.location.href = "teacherShow.php";
                    }
                </script>

                <!-- View Courses  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="showCourse()">
                    <img class="w-[70px]" src="photo/teacher.png" alt="Teacher">
                    <p class="text-2xl text-white font-semibold">Course</p>
                </button>                 
                <script>
                    function showCourse() {
                      window.location.href = "courseShow.php";
                    }
                </script>
                

            </div>
        </div>
    </body>
</html>