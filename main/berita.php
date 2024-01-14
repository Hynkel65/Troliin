<?php
include "includes/header.php";
include "includes/database.php";

// Check if 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data for the specific news item
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
} else {
    // Redirect to news.php if 'id' is not provided
    header("Location: news.php");
    exit();
}
?>

<main>
    <?php if (isset($row)): ?>
        <section class="header-berita">
            <img src="images/sample5.png" alt="sample5">
        </section>

        <section class="berita-utama">
            <h1>
                <?php echo $row['title']; ?>
            </h1>
            <h2>
                <?php echo $row['description']; ?>
            </h2>

            <p>
                <?php echo $row['content']; ?>
            </p>
            <div class="horizontal-line"></div>
        </section>
    <?php else: ?>
        <p>No news item selected.</p>
    <?php endif; ?>
</main>


<?php
include "includes/footer.php";

// Close the database connection
mysqli_close($conn);

?>