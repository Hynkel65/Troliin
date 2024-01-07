<?php
include "includes/header.php";
include('includes/nav.php');
?>

<main>
    <section class="header-faq">
        <div class="left">
            <div class="heading">
                <h1>Punya Pertanyaan?</h1>
            </div>
            <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <input type="search" id="form1" class="form-control" />
                    <label class="form-label" for="form1">Search</label>
                </div>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                    <i class="fas fa-search"></i>
                </button>
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
    <section class="kontak">
        <div class="left">
            <div class="text">Masih ga ketemu??</div>
            <button type="button">Kontak Kami</button>
        </div>
        <div class="right">
            <img src="images/sally7.png" alt="sally7">
        </div>
    </section>
</main>
<?php include "includes/footer.php" ?>