<?php

function showOddNumbers($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 2 != 0) {
            echo $i . " ";
        }
    }
}

$n = $_POST['n'];
echo "Odd numbers between 1 and $n are: <br>";
showOddNumbers($n);
?>