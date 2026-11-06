<?php

function showFeedback()
{
    $name = $_POST['uname'];
    $password = $_POST['upass'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $department = $_POST['department'];
    $college = $_POST['college'];

    echo "Name: " . $name . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "City: " . $city . "<br>";
    echo "Department: " . $department . "<br>";
    echo "College: " . $college . "<br>";

    if (isset($_FILES['ufile']) && $_FILES['ufile']['name'] != "") {
        echo "Uploaded File Name: " . $_FILES['ufile']['name'] . "<br>";
    } else {
        echo "No file uploaded.<br>";
    }
}

showFeedback();

?>