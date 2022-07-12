<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("chat");

//session_start();
function get_requests_list() {
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql_requests = "SELECT users_table.first_name, users_table.last_name, users_table.avatar, friend_requests.from_user_id, friend_requests.to_user_id  FROM friend_requests 
INNER JOIN users_table ON friend_requests.from_user_id = users_table.id WHERE  friend_requests.to_user_id = $user_id AND is_checkes <> 1";

    $result = mysqli_query($conn, $sql_requests);
    $getRequestsList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($getRequestsList);
}
//meky myusin harcum uxarki u cuyc ta ejum requestsy
//echo get_requests_list();

function confirm_friend($to_confirm_id, $from_confirm_id){
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql_confirm = mysqli_query($conn, "INSERT INTO friend_list (user_one_id, user_to_id) VALUES ($from_confirm_id, $user_id)");
    mysqli_query($conn, "UPDATE friend_requests SET is_checkes = '1' WHERE friend_requests.from_user_id = $from_confirm_id AND  friend_requests.to_user_id = $to_confirm_id  ");
}
//gnuma bazayum darnum 1 u ejic anhetanuma requestsy