<?php
// Q4 ii: Use array in PHP to display N names of animals (N is user's input)

function showAnimals($arr) {
    foreach ($arr as $animal) {
        echo $animal . "<br>";
    }
}

$animals = $_POST['animal'];   // array of animal names from the form

echo "List of animals entered: <br>";
showAnimals($animals);
?>