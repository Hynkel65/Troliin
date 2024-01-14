<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_GET['delete'])) {
    $postId = $_GET['delete'];

    $imageFileName = '';
    if ($stm = $conn->prepare('SELECT image_url FROM posts WHERE id = ?')) {
        $stm->bind_param('i', $postId);
        $stm->execute();
        $stm->bind_result($imageFileName);
        $stm->fetch();
        $stm->close();
    }

    if ($stm = $conn->prepare('DELETE FROM posts where id = ?')) {
        $stm->bind_param('i', $postId);
        $stm->execute();

        if (!empty($imageFileName) && file_exists($imageFileName)) {
            unlink($imageFileName);
        }

        set_message("A post " . $_GET['delete'] . " has been deleted");
        header('Location: posts.php');
        $stm->close();
        die();
    } else {
        echo 'Could not prepare statement!';
    }
}

// Fetch and display posts
if ($stm = $conn->prepare('SELECT * FROM posts')) {
    $stm->execute();
    $result = $stm->get_result();

    if ($result->num_rows > 0) {
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="display-1">Posts management</h1>
                    <table class="table table-striped table-hover">
                        <!-- Table headers -->
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author's ID</th>
                            <th>Edit | Delete</th>
                        </tr>
                        <!-- Display posts -->
                        <?php while ($record = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?php echo $record['id']; ?>
                                </td>
                                <td>
                                    <?php echo $record['title']; ?>
                                </td>
                                <td>
                                    <?php echo $record['description']; ?>
                                </td>
                                <td>
                                    <?php echo $record['author']; ?>
                                </td>
                                <td>
                                    <a href="posts_edit.php?id=<?php echo $record['id']; ?>">Edit</a> |
                                    <a href="posts.php?delete=<?php echo $record['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <a href="posts_add.php">Add new posts</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo 'No posts found';
    }

    $stm->close();
} else {
    echo 'Could not prepare statement!';
}

include('includes/footer.php');
?>