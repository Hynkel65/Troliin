<nav>
    <div class="logo" href="index.php">
        <a href="index.php">
            <img class ="logo-img" src="images/logo.png" alt="logo">
        </a>
    </div>

    <div class="links">
        <a data-active="index" href="index.php">Home</a>
        <a data-active="dashboard" href="dashboard.php">Dashboard</a>
        <a data-active="logout" href="logout.php">Logout</a>
    </div>
    <div class="burger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</nav>

<?php get_message(); ?>