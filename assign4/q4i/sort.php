<?php

function sortNumbers($arr) {
    sort($arr);
    return $arr;
}

$numbers = $_POST['num'];   
$sorted = sortNumbers($numbers);

echo "Original numbers: " . implode(", ", $numbers) . "<br>";
echo "Sorted numbers: " . implode(", ", $sorted);
?>