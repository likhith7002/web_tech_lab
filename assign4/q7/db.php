<?php

$conn = new mysqli(
    "localhost",
    "root",
    "Likhi@2007",
    "ajax_demo"
);

if ($conn->connect_error) {
    echo "Database connection failed";
} else {
    echo "AJAX connected successfully!<br>";
    echo "Database connected successfully!";
}

?>