<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("chat");
function get_users_list(){
    global  $conn;
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT id, first_name, last_name, avatar  FROM users_table WHERE id <>  $user_id ";
    $result = mysqli_query($conn, $sql);
    $getUsersList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($getUsersList); //proekti lriv sql harcumneri kategorian useric stanalu hamar
}

function search_by_name($name){
    global $conn;
    $sql = "SELECT * FROM users_table WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);
    $user_name = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($user_name);
}

function chek_in($to_user_id){
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql_if = mysqli_query($conn, "SELECT from_user_id, to_user_id FROM friend_requests WHERE from_user_id = $user_id AND to_user_id = $to_user_id");
    if(mysqli_num_rows($sql_if) == 0){
        $sql_check="INSERT INTO friend_requests (from_user_id, to_user_id, is_checkes, created_at) VALUES ($user_id, $to_user_id, 0, now())";
        $result = mysqli_query($conn, $sql_check);
    }
}