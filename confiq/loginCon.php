<?php
    require_once ('conection.php');
    $_SERVER['REQUEST_METHOD'] = 'POST';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $year = $_POST['year'];


        if ($con) {
            $query = "SELECT * FROM users WHERE email = '$email' AND password =  '$password'";
            $result = mysqli_query($con, $query);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $type = $row['type'];

                if ($type == 'teacher') {
                    header("Location: /School Management System/teacher.php?id=" . urlencode($row['id']) . "&year=" . urlencode($year));
                }
                if ($type == 'admin') {
                    header("Location: /School Management System/admin.php?id=" . urlencode($row['id']) . "&year=" . urlencode($year));
                }
            } else {
                echo '<script>
                    alert("Login failed. Username or password invalid");
                    window.location.href = "/School Management System/index.php";
                </script>';

            }
        } else {
            die(mysqli_error($con));
        }
    }
?>