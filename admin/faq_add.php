<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');


if (isset($_POST['question'])) {
    $question = validateInput('question');
    $abstract = validateInput('abstract');
    $answer = validateInput('answer');
    $category = validateInput('category');


    if (!empty($question) && !empty($abstract) && !empty($answer)) {
        if ($stm = $conn->prepare('INSERT INTO faq (question, abstract, answer, category, display_order, status) VALUES (?, ?, ?, ?, ?, ?)')) {

            $stm->bind_param('ssssss', $_POST['question'], $_POST['abstract'], $_POST['answer'], $_POST['category'], $_POST['display_order'], $_POST['status']);
            $stm->execute();


            set_message("A new faq " . $_SESSION['username'] . " has beed added");
            header('Location: faq.php');
            $stm->close();
            die();

        } else {
            echo 'Could not prepare statement!';
        }
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

                <!-- Abstract input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="abstract">Abstract</label>
                    <textarea name="abstract" id="abstract"></textarea>
                </div>

                <!-- Answer input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="answer">Answer</label>
                    <textarea name="answer" id="answer"></textarea>
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
                        <select name="status" class="form-select" id="status">
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
        selector: '#abstract, #answer'
    })
</script>
<?php


include('includes/footer.php');
?>