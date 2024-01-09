<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_POST['question'])) {

    if ($stm = $conn->prepare('INSERT INTO faq (question, answer, category, display_order, status) VALUES (?, ?, ?, ?, ?)')) {

        $stm->bind_param('sssss', $_POST['question'], $_POST['answer'], $_POST['category'], $_POST['display_order'], $_POST['status']);
        $stm->execute();


        set_message("A new faq " . $_SESSION['username'] . " has beed added");
        header('Location: faq.php');
        $stm->close();
        die();

    } else {
        echo 'Could not prepare statement!';
    }

}


?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-1">Add faq</h1>
            <form method="post">
                <!-- Question input -->
                <div class="form-outline mb-4">
                    <input type="text" id="question" name="question" class="form-control" />
                    <label class="form-label" for="question">Question</label>
                </div>

                <!-- Answer input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="content">Answer</label>
                    <textarea name="content" id="content"></textarea>
                </div>

                <!-- Display Order input -->
                <div class="form-outline mb-4">
                    <input type="number" id="display_order" name="display_order" class="form-control" />
                    <label class="form-label" for="display_order">Display Order</label>
                </div>

                <!-- Category input -->
                <div class="form-outline mb-4">
                    <div class="form-outline mb-4">
                        <select name="category" class="form-select" id="category">
                            <option value="" disabled selected hidden>Select your category</option>
                            <option value="0">General Information</option>
                            <option value="1">Troubleshooting and Technical Issues</option>
                            <option value="2">Privacy and Security</option>
                            <option value="3">Contact and Supports</option>
                            <option value="4">Legal and Terms of Service</option>
                        </select>
                    </div>
                </div>

                <!-- Status input -->
                <div class="form-outline mb-4">
                    <div class="form-outline mb-4">
                        <select name="active" class="form-select" id="active">
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
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