<?php 
include'functions/func.php'; ?>
<?php if(!isset($_SESSION['user_id'])): ?>
<?php $_SESSION['unutherrized'] = "Please Enter Email & Password"; ?>
<?php header("location:../index.php"); ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <title>profile</title>
</head>
<body>
    <!-- NAVBAR -->
    <?php include '../parts/nav.php'; ?>
    <?php if(isset($_SESSION['image_success'])): ?>
    <div class="alert text-center alert-success  all-msg success-msg">
        <?= $_SESSION['image_success'] ?>
    </div>
    <?php endif ?>
    <?php unset($_SESSION['image_success']) ?>

    <?php if(isset($_SESSION['bio_success'])): ?>
    <div class="alert text-center alert-success  all-msg success-msg">
        <?= $_SESSION['bio_success'] ?>
    </div>
    <?php endif ?>
    <?php unset($_SESSION['bio_success']) ?>
    
    <?php if(isset($_SESSION['facebook_success'])): ?>
    <div class="alert text-center alert-success  all-msg success-msg">
        <?= $_SESSION['facebook_success'] ?>
    </div>
    <?php endif ?>
    <?php unset($_SESSION['facebook_success']) ?>

    <?php if(isset($_SESSION['linkedin_success'])): ?>
    <div class="alert text-center alert-success  all-msg success-msg">
        <?= $_SESSION['linkedin_success'] ?>
    </div>
    <?php endif ?>
    <?php unset($_SESSION['linkedin_success']) ?>
    <?php if(isset($_SESSION['password'])): ?>
    <div class="alert text-center alert-success  all-msg success-msg">
        <?= $_SESSION['password'] ?>
    </div>
    <?php endif ?>
    <?php unset($_SESSION['password']) ?>
    <div class="container contents">
        <div class="row">
        <div class="col-md-3">
            <div class="left-area">
                <?php links();?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="right-area">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, blanditiis. Voluptate quod dignissimos reiciendis enim, minus animi, eligendi, vitae neque eaque nobis tenetur dolor ipsum voluptas facilis vero sunt inventore distinctio architecto laudantium voluptatem reprehenderit doloremque ratione.
                 Itaque, iure. Veniam quos quae amet velit quasi, nam quaerat error perspiciatis consectetur?
                 <?php 
                 include 'parts/bio.php';
                 include 'parts/facebook.php';
                 include 'parts/linkedin.php';
                 include 'parts/change_password.php';
                 include 'parts/name.php';
                 ?>
            </div>
        </div>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!-- <script src="../assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/profile.js"></script>
    <script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".success-msg").fadeOut("slow")
        }, 3000)
    })
    </script>
</html>