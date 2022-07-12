<?php
session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } else{
        $user= [];
    }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <div class="container-fluid">
        <a class="navbar-brand" href="http://chat.loc/views/dashboard/home.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-tabs me-auto mb-2 mb-lg-0">
                <li>
                    <a class="nav-link" href="http://chat.loc/views/dashboard/users/index.php/">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://chat.loc/views/dashboard/categories/index.php">Categories</a>
                </li>
                <li>
                    <a class="nav-link" href="http://chat.loc/views/dashboard/categories/my_categories.php">My Categories</a>
                </li>
                <li>
                    <a class="nav-link" href="http://chat.loc/views/dashboard/requests/index.php">Notifications</a>
                </li>
                <li>
                    <a class="nav-link" href="http://chat.loc/views/dashboard/friends/index.php">Friends List</a>
                </li>


            </ul>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $user ["first_name"]; ?>
                    <?php echo $user ["last_name"]; ?>
                    <img style="width: 60px; height:60px; border-radius: 50%" src="http://chat.loc//server/assets/uploads/images/<?php echo $user['avatar']; ?>">
                 </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><hr class="dropdown-divider"></li>
                    <a class="dropdown-item" href="http://chat.loc/server/routes/web.php?action=logout"><b>Logout</b></a>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!--mer menyui bajinneri toxna -->