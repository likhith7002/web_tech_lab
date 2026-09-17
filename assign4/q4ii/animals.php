<?php


function showAnimals($arr) {
    foreach ($arr as $animal) {
        echo $animal . "<br>";
    }
}

$animals = $_POST['animal'];   

echo "List of animals entered: <br>";
showAnimals($animals);
?>