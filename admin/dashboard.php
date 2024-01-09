<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

?>
<div class="container mt-5" style="min-height: 405px;">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1 class="display-1">Dashboard</h1>
            <a href="users.php">Users management</a> |
            <a href="posts.php">Posts management</a>  |
            <a href="faq.php">FAQ management</a>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>