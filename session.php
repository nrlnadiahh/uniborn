<?php
    include 'conn.php';
    $conn1 = OpenCon();
    session_start();

    $user_check = $_SESSION['login_user'];
    
    $sql="select * from staff where staffid = '$user_check'";

    $result = $conn1->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $slogin_id = $row['staffid'];
            $slogin_name = $row['staffname'];
        }
    } else {
            header("location:stafflogin.php");
            die();
    }
    CloseCon($conn1);
    ?>