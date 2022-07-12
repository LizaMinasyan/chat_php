<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("chat");
function get_categories(){
    global  $conn;
    $sql = "SELECT categories.*, users_table.first_name FROM categories INNER JOIN users_table ON categories.user_id= users_table.id";
    $result = mysqli_query($conn, $sql);
    $get_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($get_categories); //proekti lriv sql harcumneri kategorian useric stanalu hamar
}

function new_category($category_name) {
    global  $conn;
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO `categories` VALUES (null, '$category_name','$user_id', now(), now())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return json_encode(['msg' => 'Successfuly created']); //nor kategoria avelacnelu hamar
    }
}

function get_user_categories() {
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT categories.*, users_table.first_name FROM categories INNER JOIN users_table ON categories.user_id= users_table.id WHERE categories.user_id=$user_id";
    $result = mysqli_query($conn, $sql);
    $get_user_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode($get_user_categories); //inner join enq arel vorov cuyca talis categorias listi hamar
}
function delete_category($id){
    global $conn;
    $sql="DELETE FROM categories WHERE id = $id";
    $result = mysqli_query($conn, $sql); //jnjelu hamara
}

function renameCategory($id, $new_name){
    global $conn;
    $sql = "UPDATE categories SET category_name ='$new_name' WHERE id=$id";
    $result = mysqli_query($conn, $sql); //category name poxelu hamara
}