<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/swiper-bundle.min.css">

        <title>Troliin</title>
    </head>
    <body>
        <?php include "includes/nav.php"?>
        <main>
            <!-- Section: register -->
            <section class="register">
                <div class="register-container">
                    <div class="left-container">
                        <div class="heading">
                            <h1>Gabung</h1>
                            <h1>Bersama Kami</h1>
                        </div>
                        <div class="form-container">
                            <form id="registrationForm">
                                <input type="text" id="name" name="name" placeholder="Name" required>

                                <input type="email" id="email" name="email" placeholder="Email" required>

                                <div class="phone-container">
                                    <div class="prefix">+62</div>
                                    <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]+" title="Please enter only numbers" placeholder="Phone Number" required>
                                </div>

                                <input type="text" id="location" name="location" placeholder="Shop Location" required>

                                <input type="submit" value="Submit" class="submit-btn">
                            </form>
                        </div>
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
        
        
            <?php include "includes/news.php"?>
        </main>
        <?php include "includes/footer.php"?>

        <script src="javascript/script.js"></script>
        <script src="javascript/swiper-bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/4d0e1aab0d.js" crossorigin="anonymous"></script>
    </body>
</html>