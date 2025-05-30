<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
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

                <!-- teacher  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 rounded-xl" onclick="my_modal_1.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">Teacher</p>
                </button>

                <!-- teacher login -->
                <dialog id="my_modal_1" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="confiq/loginCon.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">Log In</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Email</label>
                                <input class="py-2 px-6 rounded-md" type="email" name="email" placeholder="Enter Your Email" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Password</label>
                                <input class="py-2 px-6 rounded-md" type="password" name="password" placeholder="Enter Your Password" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Year</label>
                                <input class="py-2 px-6 rounded-md" type="number" name="year" placeholder="Enter Year" required>
                            </div>
                            <div class="">
                                <button class="btn text-white">Log In</button>
                            </div>
                        </form>
                    </div>
                </dialog>
                
                <!-- admin  -->
                <button class="flex flex-col justify-center items-center bg-gray-700 p-8 px-[38px] rounded-xl" onclick="my_modal_2.showModal()">
                    <img class="w-[70px]" src="photo/teacher.png" alt>
                    <p class="text-2xl text-white font-semibold">Admin</p>
                </button>

                <!-- admin login  -->
                <dialog id="my_modal_2" class="modal text-white">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="confiq/loginCon.php" method="POST" class="flex flex-col w-full items-center gap-8">
                            <h2 class="text-3xl font-semibold">Log In</h2>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Email</label>
                                <input class="py-2 px-6 rounded-md" type="email" name="email" placeholder="Enter Your Email" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">Password</label>
                                <input class="py-2 px-6 rounded-md" type="password" name="password" placeholder="Enter Your Password" required>
                            </div>
                            <div class="flex w-9/12 justify-between items-center">
                                <label for="">year</label>
                                <input class="py-2 px-6 rounded-md" type="password" name="year" placeholder="Enter year" required>
                            </div>
                            <div class="">
                                <button class="btn text-white">Log In</button>
                            </div>
                        </form>
                    </div>
                </dialog>

            </div>
        </div>
    </body>
</html>