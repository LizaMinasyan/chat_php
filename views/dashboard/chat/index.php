<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'Login Please';
    header("location:http://chat.loc/views/login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages List</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/bootstrap.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="http://chat.loc/server/assets/js/chat.js"></script>
    <link href="http://chat.loc/server/assets/style.css" rel="stylesheet" >

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/navbar.php'; ?>


<section style="background-color: #eee;">
    <div class="container py-5">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                         style="border-top: 4px solid #ffa900;">
                        <h5 class="mb-0">Chat messages</h5>
                        <div class="d-flex flex-row align-items-center">
                            <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                            <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                            <i class="fas fa-times text-muted fa-xs"></i>
                        </div>
                    </div>
                    <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">


                      <div id="messages">

                      </div>

<!--                        mi blok button-->
                    <div class="button_msg">
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                        <div class="input-group mb-0">
                            <input type="hidden" id="toUserId" value="<?php echo $_GET['user_id']; ?>">
                            <input type="text" class="form-control" id="inp_msg" placeholder="Type message"
                                   aria-label="Recipient's username" aria-describedby="button-addon2" />
                            <button class="btn btn-warning" type="button" id="send_msg" style="padding-top: .55rem;">
                                Send
                            </button>
                        </div>
                    </div>
                </div>
                    </div>
            </div>
        </div>

    </div>
</section>



</body>
</html>