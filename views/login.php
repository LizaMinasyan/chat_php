<?php
session_start();
if(isset($_SESSION['user'])) {
    header("location:http://chat.loc/views/dashboard/home.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/bootstrap.php'; ?>
</head>
<body>
<div class="container">
    <?php if(isset($_SESSION['msg'])) { ?>
        <div class="alert alert-danger"><?php echo $_SESSION['msg']; ?></div>
    <?php } unset($_SESSION['msg']); ?>
    <form action="http://chat.loc/server/routes/web.php" method="post" >
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>

        <button name="action" value="login" class="btn btn-success">Login</button>
    </form>
</div>
</body>
</html>