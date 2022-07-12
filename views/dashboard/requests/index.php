<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("chat");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/bootstrap.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="http://chat.loc/server/assets/js/notifications.js"></script>
    <link href="http://chat.loc/server/assets/style.css" rel="stylesheet" >

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/navbar.php'; ?>
<div class="container mt-3" >
    <div class="d-flex justify-content-end">

    </div>
    <div class="d-flex justify-content-end" style="margin-top: 2% ">

    </div>

</div>

<!--<div class="container">-->
<ul id="notifications_list">

</ul>
</div>


<div class="container mt-2">
    <h1>Notification list</h1>
</div>



</body>
</html>
