<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

echo "<h1>" . $_SESSION['SignUpTest'] . "</h1>";
