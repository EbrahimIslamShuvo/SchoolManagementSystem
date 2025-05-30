<?php

require_once('conection.php');
$_SERVER['REQUEST_METHOD']='POST';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $courseName= $_POST['name'];
    $courseId= $_POST['id'];
    $teacherId = $_POST['teacherId'];
    $courseClass= $_POST['class'];
    $courseShift= $_POST['shift'];
    $courseYear= $_POST['year'];
      
    if($con){
        $query = "SELECT * FROM course WHERE ((id = '$courseId' && year='$courseYear') && shift='$courseShift')";
        $result = mysqli_query($con ,$query); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==0){
            $sql="insert into course values ('$courseName','$courseId','$teacherId','$courseClass','$courseShift','$courseYear')";
            $result=mysqli_query($con,$sql);
        
            if($result){
                echo '<script>
                    alert("New Course Added Successfully");
                    window.location.href = "/School Management System/admin.php";
                </script>';

            }
            else{
                echo '<script>
                    alert("An error accour");
                    window.location.href = "\School Management System\admin.php";
                </script>';
            }
        }
        else{
            echo '<script>
                alert("This course already exist in Database.");
                window.location.href = "/School Management System/admin.php";
            </script>';

        }
    }
    else{
        die(mysqli_error($con));
    }
}
?>