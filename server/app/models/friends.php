<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("chat");

//session_start();
function get_friends_list() {
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql_friends = "SELECT users_table.id,users_table.first_name, users_table.last_name, users_table.avatar FROM friend_requests 
INNER JOIN users_table ON friend_requests.to_user_id = users_table.id 
WHERE is_checkes = 1 AND friend_requests.from_user_id  = $user_id 
UNION
SELECT  users_table.id, users_table.first_name, users_table.last_name, users_table.avatar FROM friend_requests 
INNER JOIN users_table ON friend_requests.from_user_id = users_table.id 
WHERE is_checkes = 1 AND friend_requests.to_user_id  = $user_id" ;
    $result = mysqli_query($conn, $sql_friends);
    $getFriendsList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($getFriendsList);



}

//friends i hamar mer functianerna grac