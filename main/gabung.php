<?php
include "includes/header.php";
include('includes/database.php');


if (isset($_POST['name'])){

    if ($stm = $conn->prepare('INSERT INTO mitra (name, email, phoneNumber, shopLocation) VALUES (?, ?, ?, ?)')){
        $stm->bind_param('ssss', $_POST['name'], $_POST['email'], $_POST['phoneNumber'], $_POST['shopLocation']);
        $stm->execute();
        

        header('Location: gabung.php');
        $stm->close();
        die();

    } else {
        echo 'Could not prepare statement!';
    }

}

?>

<main>
    <!-- Section: register -->
    <section class="register">
        <div class="register-container">
            <div class="left-container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="display-1">Gabung</h1>
                        <h1 class="display-2">Bersama Kami</h1>
                        <form method="post">
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="name" name="name" class="form-control" />
                                <label class="form-label" for="name">Nama</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" />
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                            </div>

                            <!-- Location input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="location" name="location" class="form-control" />
                                <label class="form-label" for="location">Location</label>
                                <div class="form-helper">e.g, Jakarta</div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Gabung</button>
                        </form>

                    </div>
                    <div class="right-container">
                        <img src="images/sally3.png" alt="#">
                    </div>
                </div>
    </section>

    <!-- Section: alasan -->
    <section class="alasan">
        <div class="alasan-container">
            <div class="heading">
                <h1>Masuk Troliin itu..</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Aliquam posuere etiam .</p>
            </div>
            <div class="content">
                <div class="content-item">
                    <div class="content-img" style="background-image: url('images/sample.png');"></div>
                    <p class="content-text">Lorem ipsum dolor sit amet</p>
                </div>
                <div class="content-item">
                    <div class="content-img" style="background-image: url('images/sample.png');"></div>
                    <p class="content-text">Lorem ipsum dolor sit amet</p>
                </div>
                <div class="content-item">
                    <div class="content-img" style="background-image: url('images/sample.png');"></div>
                    <p class="content-text">Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
    </section>


    <?php include "includes/news.php" ?>
</main>
<?php include "includes/footer.php" ?>