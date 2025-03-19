<?php

if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo $error . "<br>";
    }
    unset($_SESSION['errors']);
}