<?php
session_start();

if (empty($_POST['logout'])) {
    // Unset or destroy the specific session variable
    session_destroy();

header('Location: index.php');
exit;
} 