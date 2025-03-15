<?php 
include 'functions/func.php'; 
include 'parts/bio.php'; 
include 'parts/facebook.php';
include 'parts/linkedin.php';
include 'parts/change_password.php';
include 'parts/name.php';

?>
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
    <?php if(isset($_SESSION['invalid_format'])): ?>
    <div class="alert text-center alert-danger all-msg success-msg">
        <?= $_SESSION['invalid_format'] ?>
    </div>
    <?php endif ?>
    <?php unset($_SESSION['invalid_format']) ?>
    <div class="container contents">
        <div class="row">
        <div class="col-md-3">
            <div class="left-area">
                <?php links();?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="right-area">
               <h4>Update profile picture</h4>
               <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Picture" name="picture">
                </div>
               </form>
            </div>
        </div>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="js/profile.js"></script>
</html>