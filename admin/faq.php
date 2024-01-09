<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_GET['delete'])){
    if ($stm = $conn->prepare('DELETE FROM faq where id = ?')){
        $stm->bind_param('i',  $_GET['delete']);
        $stm->execute();
        

        set_message("A faq " . $_GET['delete'] . " has beed deleted");
        header('Location: faq.php');
        $stm->close();
        die();

    } else {
        echo 'Could not prepare statement!';
    }

}

if ($stm = $conn->prepare('SELECT * FROM faq')) {
    $stm->execute();

    $result = $stm->get_result();


    if ($result->num_rows > 0) {


?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-1">FAQ management</h1>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Id</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Category</th>
                    <th>Display Order</th>
                    <th>Status</th>
                    <th>Edit | Delete</th>
                </tr>
                <?php while ($record = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                    <td><?php echo $record['id']; ?> </td>
                    <td><?php echo $record['question']; ?> </td>
                    <td><?php echo $record['answer']; ?> </td>
                    <td><?php echo $record['category']; ?> </td>
                    <td><?php echo $record['display_order']; ?> </td>
                    <td><?php echo $record['status']; ?> </td>
                    <td><a href="faq_edit.php?id=<?php echo $record['id']; ?>">Edit</a>   |   
                        <a href="faq.php?delete=<?php echo $record['id']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
            <a href="faq_add.php">Add new faq</a>
            
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