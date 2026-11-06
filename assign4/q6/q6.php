<?php

$n = $_POST['n'];
function showAnimalImages($n) {
    $images = array(
        "images/tiger.jpg",
        "images/cat.jpg",
        "images/zebra.jpg",
        "images/elephant.jpg",
        "images/dog.jpg",
        "images/deer.jpg"
    );
    for ($i = 0; $i < $n; $i++) {
        if (isset($images[$i])) {
            echo "<img src='" . $images[$i] . "' width='595' height='400'> ";
        }
    }
}
echo "Showing $n animal image(s): <br><br>";
showAnimalImages($n);
?>