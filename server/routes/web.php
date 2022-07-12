<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/auth.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/categories.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/users.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/input.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/upload.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/notifications.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/friends.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/chat.php");
$action = "";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}


if($action == "register") {
    $first_name = inp($_POST['first_name']);
    $last_name = inp($_POST['last_name']);
    $birt_date = inp($_POST['birth_date']);
    $avatar = avatar_upload($_FILES['file']);
    $email = inp($_POST['email']);
    $password = inp($_POST['password']);

    register([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'birt_date' => $birt_date,
        'avatar' =>$avatar,
        'email' => $email,
        'password' => hashing($password)

    ]);
} else if($action == "login") {
    $email = inp($_POST['email']);
    $password = inp($_POST['password']);
    login([
        'email' => $email,
        'password' => hashing($password),
    ]);
}  else if ($action == "logout"){
    logout();
} else if ($action == "getCategories"){
    echo get_categories();

}else if ($action == "addCategory"){
   echo new_category($_POST['category_name']);

}else if ($action == "get_user_categories") {
    echo get_user_categories();

} else if ($action == "del_category"){

    delete_category($_GET["id"]);

}else if ($action == "rename_category") {
    renameCategory($_GET["id"], $_GET["new_name"]);

} else if ($action == "UsersList") {
    echo get_users_list();

} else if($action == "userSearch") {
    echo search_by_name($_GET['name']);

} else if($action == "checkin") {
    chek_in($_GET['to_user_id']);

}else if($action == "AllRequests") {
   echo get_requests_list();

}else if($action == "userconfirm") {
    confirm_friend($_GET['to_confirm_id'], $_GET['from_confirm_id']);

}else if($action == "AllFriends") {
    echo get_friends_list();

}else if($action == "addMessages") {
    addMessages($_POST['inp_msg'], $_POST['to_id']);

}else if($action == "getMessages") {
    echo get_messages_list($_GET['user_to_id']);
}




//unenq action vory kirarum enq funkcianerum sqli jamanak
