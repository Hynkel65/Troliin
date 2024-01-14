<?php
include "includes/header.php";


?>

<main>

    <!-- Section: Welcome -->
    <section class="welcome">
        <img class="rocket-person" src="images/rocket-person.png" alt="Rocket Person Image">
    </section>

    <!-- Section: Troliin Friends -->
    <section class="troliin-friends">
        <div class="heading">
            <h1>Sahabat Troliin</h1>
        </div>
        <div class="content">
            <div class="subcontent">
                <h3>Lorem</h3>
                <img src="images/sample.png" alt="Sample Image">
                <p>Lorem ipsum dolor sit amet</p>
            </div>
            <div class="subcontent">
                <h3>Lorem</h3>
                <img src="images/sample.png" alt="Sample Image">
                <p>Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </section>

    <!-- Section: Join Troliin -->
    <section class="join-troliin">
        <div class="background"></div>
        <div class="icon">
            <img src="images/saly.png" alt="Icon Image">
        </div>
        <div class="right">
            <div class="join-text">
                <div class="text-1">Gabung</div>
                <div class="text-2">Sekarang!!</div>
            </div>
            <a class="join-button" href="gabung.php">Gabung</a>
        </div>
    </section>

    <?php include "includes/help.php" ?>
    <?php include "includes/news.php" ?>

</main>
<?php include "includes/footer.php" ?>