<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'Login please';
    header("location:http://chat.loc/views/login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="http://chat.loc/server/assets/js/categories.js"></script>
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/navbar.php'; ?>
<div class="container my-categories">

    <a class="btn btn-primary mt-3" href="http://chat.loc/views/dashboard/categories/new.php/">Create New Category</a> <br>
    <h2>CATEGORY LIST</h2>
    <div class="d-flex justify-content-end">


    </div>

    <table class="table">

        <tr>

            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody id="user_categories">


        </tbody>
    </table>
</div>
</body>
</html>