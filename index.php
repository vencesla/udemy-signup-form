<?php
include 'connection/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit-no">
    <title>Udemy Signup & Logint</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- NAVBAR -->
    <?php include 'parts/nav.php'; ?>
    <?php if(isset($_SESSION['unutherrized'])): ?>
        <div class="alert alert-danger text-center all-msg">
            <strong><?= $_SESSION['unutherrized'] ?></strong>
        </div>
    <?php endif ?>
    <div class="container">
    <div class="row">
        <div class="col-md-8 content">
            <h1>It allways free</h1><hr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae nesciunt architecto
                in illum ut error quisquam iusto nihil,
                provident non. Distinctio mollitia modi inventore voluptates minima laboriosam praesentium fuga ducimus.</p>
        </div>
        <div class="col-md-4 content">
            <div class="signup-cover"><!-- Begin signup cover  !-->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="form-heading">Signup</h3>
                                <p>Account creating is 100% free so please create the account</p>
                            </div>
                            <div class="col-md-3 text-right">
                                <i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="signup_submit" action="">
                            <div class="form-group show-progress mb-4">

                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name...">
                                <div class="name-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email...">
                                <div class="email-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Choose Password...">
                                <div class="password-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" id="confirm" class="form-control" placeholder="Confirm Password...">
                                <div class="confirm-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <button type="button" id="submit" class="btn btn-success w-100 form-btn">Create Account</button>
                            </div>
                            <div class="form-group">
                                <a href="#" id="login" class="text-decoration-none">Allready have an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end signup cover !-->
            <div class="login-cover" style="display: none;"><!-- begin login-cover !-->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="form-heading">Login</h3>
                                <p>Enter Email && Password</p>
                            </div>
                            <div class="col-md-3 text-right">
                                <i class="fa fa-lock fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="login-submit-form">
                            <div class="form-group mb-2">
                                <div class="login-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="login_email" id="login-email" class="form-control" placeholder="Enter Email...">
                                <div class="login-email-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" name="login_password" id="login-password" class="form-control" placeholder="Choose Password...">
                                <div class="login-password-error error"></div>
                            </div>
                            <div class="form-group mb-2">
                                <button type="button" id="login-submit" class="btn btn-success w-100 form-btn">Login</button>
                            </div>
                            <div class="form-group">
                                <a href="#"  id="signup" class="text-decoration-none">Create New Account</a>
                            </div>
                        </form>
                    </div>
                </div> 
            </div><!-- end login cover !-->
         
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/simple.js?v=1.0"></script>
<script src="assets/js/signup.js"></script>
<script src="assets/js/login.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".all-msg").fadeOut("slow")
        }, 3000)
    })
</script>
</html>