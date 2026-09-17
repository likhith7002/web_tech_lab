<?php

function showFeedback() {
    echo "Name: " . $_POST['uname'] . "<br>";
    echo "Password: " . $_POST['upass'] . "<br>";
    echo "Gender: " . $_POST['gender'] . "<br>";
    echo "City: " . $_POST['city'] . "<br>";
    echo "Hidden Field Value: " . $_POST['hiddenField'] . "<br>";

    if (isset($_FILES['ufile']) && $_FILES['ufile']['name'] != "") {
        echo "Uploaded File Name: " . $_FILES['ufile']['name'] . "<br>";
    } else {
        echo "No file uploaded.<br>";
    }
}

showFeedback();
?>