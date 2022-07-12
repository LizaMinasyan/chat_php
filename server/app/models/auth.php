<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
    $conn = db_connect("chat");

function register($data){
    global $conn;
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $birt_date = $data['birt_date'];
    $avatar = $data['avatar'];
    $email = $data['email'];
    $password = $data['password'];

    $sql = "INSERT INTO users_table VALUES (null, '$first_name', '$last_name', '$birt_date', '$avatar', '$email', '$password', 0, now())";
    $result = mysqli_query($conn, $sql);
    if($result) {
        $_SESSION['msg'] = 'registred';
        header('location:http://chat.loc/views/login.php');
    }
}

function login($data){
    global $conn;
    $email = $data['email'];
    $password = $data['password'];
    $sql = "SELECT * FROM users_table WHERE `email` = '$email' AND `password` = '$password' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
        mysqli_query($conn, "UPDATE `users_table` SET `is_active` = 1 WHERE `id` = $user_id");
        $_SESSION['user'] = $user;
        header('location:http://chat.loc/views/dashboard/home.php');
    } else {
        $_SESSION['msg'] = "Incorrect login or pass";
        header('location:http://chat.loc/views/login.php');
    }
}

function logout(){
    global $conn;
    session_start();
    $user_id = $_SESSION['user']['id'];
    mysqli_query($conn, "UPDATE `users_table` SET `is_active` = 0 WHERE `id` = $user_id");
    session_destroy();
    header('location:http://chat.loc/views/login.php');
}





