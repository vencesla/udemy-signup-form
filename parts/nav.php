<nav class="navbar navbar-expand-sm navbar-light bg-light custom-nav" style="background: linear-gradient(#f93d67, #7047d7);">
    <div class="container">
        <a href="#" class="navbar-brand">Udemy Signup & Login</a>
        <button type="button" class="navbar-toggler" data-target="#mynav" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button><!-- button -->
        <div class="collapse navbar-collapse" id="mynav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="../logout.php" class="nav-link text-white btn-success btn-logout">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>