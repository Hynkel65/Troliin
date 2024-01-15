<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_GET['delete'])) {
    if ($stm = $conn->prepare('DELETE FROM mitra where id = ?')) {
        $stm->bind_param('i', $_GET['delete']);
        $stm->execute();


        set_message("A mitra " . $_GET['delete'] . " has beed deleted");
        header('Location: mitras.php');
        $stm->close();
        die();

    } else {
        echo 'Could not prepare statement!';
    }

}

if ($stm = $conn->prepare('SELECT * FROM mitra')) {
    $stm->execute();

    $result = $stm->get_result();


    if ($result->num_rows > 0) {


        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="display-1">Mitra</h1>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Shop Location</th>
                            <th>Delete</th>
                        </tr>
                        <?php while ($record = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?php echo $record['id']; ?>
                                </td>
                                <td>
                                    <?php echo $record['name']; ?>
                                </td>
                                <td>
                                    <?php echo $record['email']; ?>
                                </td>
                                <td>
                                    <?php echo $record['phoneNumber']; ?>
                                </td>
                                <td>
                                    <?php echo $record['shopLocation']; ?>
                                </td>
                                <td>
                                <a href="javascript:void(0);"
                                        onclick="confirmDelete(<?php echo $record['id']; ?>, 'mitra')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>

        <?php
    } else {
        echo 'No mitra found';
    }

    $stm->close();

} else {
    echo 'Could not prepare statement!';
}

include('includes/footer.php');
?>