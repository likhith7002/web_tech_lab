<?php
// Q2: Display grade of student based on marks entered at client side

function findGrade($marks) {
    if ($marks >= 90) {
        return "A";
    } elseif ($marks >= 75) {
        return "B";
    } elseif ($marks >= 60) {
        return "C";
    } elseif ($marks >= 40) {
        return "D";
    } else {
        return "Fail";
    }
}

$marks = $_POST['marks'];
$grade = findGrade($marks);

echo "Marks entered: " . $marks . "<br>";
echo "Grade: " . $grade;
?>