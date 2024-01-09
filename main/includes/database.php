<?php

    $conn = mysqli_connect('localhost', 'troliin', 'Troliin123', 'troliin');

    if(mysqli_connect_errno()) {
        exit('Failed to connect to MYSQL: ' . mysqli_connect_error());
    }
?>