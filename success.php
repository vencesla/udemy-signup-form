<?php session_start(); ?>

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
    <?php include 'parts/nav.php'; ?>
    <div class="container main">
        <div class="row">
            <div class="col-md-12">
                <div class="success-area">
                    <?php 
                    
                    if(isset($_SESSION['user_name'])): ?>
                        <?php echo "<i class='fa fa-check-circle'></i> Hi <strong>". $_SESSION['user_name'].
                        "</strong> Welcome to our website we are glad to see you 
                        here now login <a href='index.php'>Login</a>";
                        ?>
                        <?php unset($_SESSION['user_name']); ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>  

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script 02src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/simple.js?v=1.0"></script>
<script src="assets/js/signup.js"></script>
<script>
    $(document).ready(function(){
        $(".success-area").fadeOut();
        $(".success-area").fadeIn(5000);
    })
</script>
</html>