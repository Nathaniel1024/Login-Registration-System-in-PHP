<?php
    $host_db = "localhost";
    $user_db = "root";
    $password = "";
    $name_db = "project_db";

    try {
        $conn = mysqli_connect($host_db, $user_db, $password, $name_db);
    } catch (mysqli_sql_exception) {
        echo"Database NOT CONNECTED!";
    }
?>