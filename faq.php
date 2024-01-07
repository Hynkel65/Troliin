<?php
include "includes/header.php";
include('includes/login-nav.php');
?>


<main>
    <section class="header-faq">
        <div class="left">
            <div class="heading">
                <h1>Punya Pertanyaan?</h1>
            </div>
            <div class="search-bar">
                <form action="">
                    <div class="search-container">
                        <input type="text" placeholder="Ketik disini..." name="q">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass fa-2xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="right">
            <div class="img">
                <img src="images/sally6.png" alt="sally6">
            </div>
        </div>
    </section>
    <section class="common-q">
        <div class="heading">
            <h1>Pertanyaan Umum</h1>
        </div>
        <div class="content">
            <div class="left">
                <div class="question-box" id="questionBox">
                    <ul>
                        <li onclick="showAnswer('answer1')">
                            <p>Lorem ipsum dolor sit amet</p>
                            <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
                        </li>
                        <li onclick="showAnswer('answer2')">
                            <p>Lorem ipsum dolor sit amet 1</p>
                            <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
                        </li>
                        <li onclick="showAnswer('answer3')">
                            <p>Lorem ipsum dolor sit amet 2</p>
                            <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
                        </li>
                        <li onclick="showAnswer('answer4')">
                            <p>Lorem ipsum dolor sit amet 3</p>
                            <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
                        </li>
                        <li onclick="showAnswer('answer5')">
                            <p>Lorem ipsum dolor sit amet 4</p>
                            <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="answer-box" id="answerBox">
                    <h2>Lorem ipsum dolor sit amet</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Non ullamcorper adipiscing condimentum nulla velit est.
                        Dis posuere tempor fermentum ipsum ultrices eget. Ut vitae nulla neque </p>
                    <a href="faq-selengkapnya.php">selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
    <?php include "includes/kontak.php" ?>
</main>
<?php include "includes/footer.php" ?>