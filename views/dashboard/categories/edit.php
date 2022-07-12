<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'Login Please';
    header("location:http://chat.loc/views/login.php");
    exit;
}
//require $_SERVER['DOCUMENT_ROOT'] .  "/server/assets/uploads/file/";
//$client_id = $_GET['client_id'];
//$conn = connect("simply_task");
//$sql = "SELECT * FROM `clients` WHERE `id` = $client_id";
//$result = mysqli_query($conn, $sql);
//$client  = mysqli_fetch_assoc($result);
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="http://chat.loc/server/assets/js/categories.js"></script>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-end">

    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4> Edit New Category</h4>
            <div class="mb-3">
                <label for="first_name" class="form-label">Edit Category Name</label>
                <input type="text" class="form-control" id="category_name" placeholder="Անուն">
            </div>
            <button class="btn btn-primary" id="save_category">Save</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
</html>
