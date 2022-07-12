<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("chat");

function addMessages($inp_msg, $to_id){
    global $conn;
    $from_id = $_SESSION['user']['id'];
    $make_msg = mysqli_query($conn, "INSERT INTO messages VALUES (null, '$inp_msg', now())");
    $new_msg_id = mysqli_insert_id($conn);
    $make_msg = mysqli_query($conn, "INSERT INTO messages_list VALUES ($from_id, $to_id, $new_msg_id)");
    return "ok";
}

function get_messages_list($to_user_id){
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql_msg = "SELECT users_table.id, users_table.first_name, users_table.last_name, messages.created_at,
 users_table.avatar, messages.context  FROM messages_list
    INNER JOIN users_table ON messages_list.from_id = users_table.id
    INNER JOIN messages ON messages_list.msg_id = messages.id
    WHERE (messages_list.from_id = $user_id AND messages_list.to_id = $to_user_id) OR 
          (messages_list.from_id = $to_user_id AND messages_list.to_id = $user_id) 
          ORDER BY messages.created_at ASC";
    $result = mysqli_query($conn, $sql_msg);
    $getMessageList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(count($getMessageList) > 0) {
        return json_encode($getMessageList);
    }
    return json_encode([]); //vor amen meki id ira hamar chanachi u mnacaci msgnery chga
}