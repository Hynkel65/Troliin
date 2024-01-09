<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_POST['question'])) {

    if ($stm = $conn->prepare('UPDATE faq set  question = ?, answer = ? , category = ?, display_order = ?, status = ?  WHERE id = ?')) {
        $stm->bind_param('sssssi', $_POST['question'], $_POST['answer'], $_POST['category'], $_POST['display_order'], $_POST['status'], $_GET['id']);
        $stm->execute();




        $stm->close();


        set_message("A FAQ  " . $_GET['id'] . " has beed updated");
        header('Location: faq.php');
        die();

    } else {
        echo 'Could not prepare post update statement statement!';
    }





}


if (isset($_GET['id'])) {

    if ($stm = $conn->prepare('SELECT * from faq WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $faq = $result->fetch_assoc();

        if ($faq) {


            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="display-1">Edit FAQ</h1>
                        <form method="post">
                            <!-- Question input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="question" name="question" class="form-control"
                                    value="<?php echo $faq['question'] ?>" />
                                <label class="form-label" for="question">Question</label>
                            </div>

                            <!-- Answer input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="answer">Answer</label>
                                <textarea name="answer" id="answer"> <?php echo $faq['answer'] ?></textarea>
                            </div>

                            <!-- Display Order input -->
                            <div class="form-outline mb-4">
                                <input type="number" id="display_order" name="display_order" class="form-control"
                                    value="<?php echo $faq['display_order'] ?>" />
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
                                        <option <?php echo ($faq['status']) ? "selected" : ""; ?> value="1">Publish</option>
                                        <option <?php echo ($faq['status']) ? "" : "selected"; ?>value="0">Unpublish</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Update FAQ</button>
                        </form>
                    </div>
                </div>
            </div>
            <script src="js/tinymce/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    selector: '#answer'
                })
            </script>

            <?php
        }
        $stm->close();


    } else {
        echo 'Could not prepare statement!';
    }

} else {
    echo "No user selected";
    die();
}

include('includes/footer.php');
?>