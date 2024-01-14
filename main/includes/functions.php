<?php

function set_message($message) {
    {
        $_SESSION['message'] = $message;
    }
}

function get_message() {
    if(isset($_SESSION['message'])) {
        echo "<script type='text/javascript'> showToast('" . $_SESSION['message'] . "', 'top right') </script>";
        unset($_SESSION['message']);
    }
}

function validateInput($field) {
    if (isset($_POST[$field]) && !empty($_POST[$field])) {
        return $_POST[$field];
    } else {
        //echo ucfirst($field) . ' is required.';
        set_message($field . " is required.");
        return false;
    }
}