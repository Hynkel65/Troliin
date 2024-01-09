<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_POST['title'])) {
    $targetDir = '../main/uploads/';
    

    if ($stm = $conn->prepare('INSERT INTO posts (title, description, content, author, date, image_url) VALUES (?, ?, ?, ?, ?, ?)')) {

        if ($_FILES['image']['error'] == 0) {

            $originalFilename = $_FILES['image']['name'];
            $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);

            $newFilename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $extension;
            $targetFile = $targetDir . $newFilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = $targetFile;

                $stm->bind_param('ssssss', $_POST['title'], $_POST['description'], $_POST['content'], $_SESSION['id'], $_POST['date'], $imagePath);
                $stm->execute();

                set_message("A new post " . $_SESSION['username'] . " has been added");
                header('Location: posts.php');
                $stm->close();
                die();

            } else {
                echo 'Could not prepare statement!';
            }
        } else {
            echo 'Error uploading file.';
        }


    } else {
        echo 'Could not prepare statement!';
    }

}


?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-1">Add post</h1>

            <form method="post" enctype="multipart/form-data">
                <!-- Title input -->
                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" class="form-control" />
                    <label class="form-label" for="title">Title</label>
                </div>

                <!-- Description input -->
                <div class="form-outline mb-4">
                    <input type="text" id="description" name="description" class="form-control" />
                    <label class="form-label" for="description">Description</label>
                </div>

                <!-- Content input -->
                <div class="form-outline mb-4">
                    <textarea name="content" id="content"></textarea>
                </div>

                <!-- Date input -->
                <div class="form-outline mb-4">
                    <input type="date" id="date" name="date" class="form-control" />
                    <label class="form-label" for="date">Date</label>
                </div>

                <!--Image input-->
                <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Insert image</label>
                    <input type="file" class="form-control" id="customFile" name="image" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Add post</button>
            </form>
        </div>
    </div>
</div>

<script src="js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content'
    })
</script>
<?php


include('includes/footer.php');
?>