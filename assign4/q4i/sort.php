<?php
// Q4 i: Use array in PHP to sort N numbers input by user

function sortNumbers($arr) {
    sort($arr);
    return $arr;
}

$numbers = $_POST['num'];   // this comes as an array from the form
$sorted = sortNumbers($numbers);

echo "Original numbers: " . implode(", ", $numbers) . "<br>";
echo "Sorted numbers: " . implode(", ", $sorted);
?>