<?php 
    include("database.php");

    // Fetch data from the database
    $query = "SELECT * FROM posts";  // Replace 'your_table_name' with the actual name of your table
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
?>

<section class="news">
    <div class="news-header">Berita Hari Ini</div>
    <div class="news-container swiper-container">
        <div class="slide-content swiper-wrapper">

            <?php
                // Loop through the database results and display each news item
                while ($row = mysqli_fetch_assoc($result)) {
                    // Use a default image URL if 'image_url' is null
                    $imageUrl = (!empty($row['image_url'])) ? $row['image_url'] : 'images/sample.png';
            ?>

            <div class="swiper-slide news-item">
                <div class="news-content" style="background-image: url('<?php echo htmlspecialchars($imageUrl); ?>');">
                    <div class="text-wrapper">
                        <div class="news-title"><?php echo $row['title']; ?></div>
                        <p class="news-description"><?php echo $row['description']; ?></p>
                        <a href="berita.php" class="read-more-button">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <?php
                } // End of while loop
            ?>

        </div>
        <!-- Add Navigation -->
        <div class="swiper-button-next">
            <i class="fa-solid fa-caret-right" style="color: #ffffff;"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fa-solid fa-caret-left" style="color: #ffffff;"></i>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<?php
    // Close the database connection
    mysqli_close($conn);
?>
