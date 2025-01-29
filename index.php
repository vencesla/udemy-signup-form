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
<nav class="navbar navbar-expand-sm navbar-light bg-light custom-nav" style="background: linear-gradient(#f93d67, #7047d7);">
    <div class="container">
        <a href="#" class="navbar-brand">Udemy Signup & Login</a>
        <button type="button" class="navbar-toggler" data-target="#mynav" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button><!-- button -->
        <div class="collapse navbar-collapse" id="mynav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
                    <form action="">
                        <div class="form-group mb-2">
                            <input type="text" id="name" class="form-control" placeholder="Enter Name...">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" id="email" class="form-control" placeholder="Enter Email...">
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" id="password" class="form-control" placeholder="Choose Password...">
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" id="confirm" class="form-control" placeholder="Confirm Password...">
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
        <div class="login-cover"><!-- begin login-cover !-->
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
                    <form action="">
                        <div class="form-group mb-2">
                            <input type="text" id="email" class="form-control" placeholder="Enter Email...">
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" id="password" class="form-control" placeholder="Choose Password...">
                        </div>
                        <div class="form-group mb-2">
                            <button type="button" id="Login" class="btn btn-success w-100 form-btn">Login</button>
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
<script src="valid.js"></script>
</html>