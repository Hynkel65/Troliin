<?php
include "database.php";

if (isset($_POST['action']) && $_POST['action'] == 'get_answer') {
    $answerId = $_POST['answerId'];

    $query = "SELECT * FROM faq WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $answerId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            header('Content-type: application/json');
            echo json_encode(
                array(
                    'title' => $row['question'],
                    'content' => $row['abstract']
                )
            );

            mysqli_close($conn);
            exit;
        } else {
            header('Content-type: application/json');
            echo json_encode(
                array(
                    'title' => 'Error',
                    'content' => 'Answer not found'
                )
            );

            mysqli_close($conn);
            exit;
        }
    } else {
        header('Content-type: application/json');
        echo json_encode(
            array(
                'title' => 'Error',
                'content' => 'Query failed'
            )
        );
    }
} else {
    // Handle the case where this file is accessed directly without a valid AJAX request
    header('HTTP/1.1 403 Forbidden');
    echo 'Forbidden';
}
?>