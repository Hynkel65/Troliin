<?php
include "includes/header.php";
include "includes/database.php";

// Fetch all questions to be used in the loop
$queryAllQuestions = "SELECT * FROM faq";
$resultAllQuestions = mysqli_query($conn, $queryAllQuestions);
?>

<main>
    <section class="header-faq">
        <div class="left">
            <div class="heading">
                <h1>Punya Pertanyaan?</h1>
            </div>
            <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <input type="search" id="searchInput" class="form-control" oninput="searchQuestions()" />
                    <label class="form-label" for="searchInput">Search</label>
                </div>
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
                        <?php
                        // Loop through each row in the result set
                        while ($row = mysqli_fetch_assoc($resultAllQuestions)) {
                            // Output question for each row
                            echo '<li onclick="showAnswer(' . $row['id'] . ')">';
                            echo '<p>' . $row['question'] . '</p>';
                            echo '<i class="fa-solid fa-chevron-right" style="color: #000000;"></i>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                    <div id="noResultMessage" style="display: none; color: #000;">
                        <p>Sorry, the question you are looking for is not here. Feel free to contact us.</p>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="answer-box" id="answerBox">
                    <!-- Default content, will be updated by JavaScript -->
                    <h2>Select a question to view the answer</h2>
                    <p>Please click on a question to see its answer.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="kontak">
        <div class="left">
            <div class="text">Masih ga ketemu??</div>
            <a href="mailto:info@mail.com">Kontak Kami</a>
        </div>
        <div class="right">
            <img src="images/sally7.png" alt="sally7">
        </div>
    </section>
</main>

<?php
include "includes/footer.php";

// Close the database connection
mysqli_close($conn);
?>