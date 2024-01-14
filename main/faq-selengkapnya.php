<?php
include "includes/header.php";
include "includes/database.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['questionId'])) {
    $faqId = $_GET['questionId'];

    // Fetch the FAQ details based on the provided ID
    $query = "SELECT * FROM faq WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $faqId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $faqDetails = mysqli_fetch_assoc($result);

            // Display the FAQ details
            ?>
            <main>
                <section class="selengkapnya-header">
                    <h1><?php echo $faqDetails['question']; ?></h1>
                    <div class="search-bar">
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
                </section>
                <section class="selengkapnya">
                    <div class="more-answer-box">
                        <h1><?php echo $faqDetails['question']; ?></h1>
                        <div class="horizontal-line"></div>
                        <h2 class="abstract"><?php echo $faqDetails['answer']; ?></h2>
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
            <?php
        } else {
            // Handle the case where the FAQ with the provided ID is not found
            echo 'FAQ not found';
        }
    } else {
        // Handle the case where the query failed
        echo 'Query failed';
    }
} else {
    // Handle the case where the 'id' parameter is not set
    echo 'FAQ ID not provided';
}

include "includes/footer.php";
mysqli_close($conn);
?>
