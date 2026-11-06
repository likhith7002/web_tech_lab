<?php
require_once __DIR__ . '/db.php';

// Escape text before displaying it in HTML.
function escapeHtml($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

// Q1
function showHello(): void
{
    echo "<h2>Hello PHP</h2>";
}

// Q2 and Q8: grade is based on marks/average out of 100.
function findGrade(float|int $marks): string
{
    if ($marks >= 90) {
        return "A";
    } elseif ($marks >= 75) {
        return "B";
    } elseif ($marks >= 60) {
        return "C";
    } elseif ($marks >= 40) {
        return "D";
    }

    return "Fail";
}

// Q3
function showOddNumbers(int $n): void
{
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 2 !== 0) {
            echo $i . " ";
        }
    }
}

// Q4(i)
function sortNumbers(array $arr): array
{
    sort($arr, SORT_NUMERIC);
    return $arr;
}

// Q4(ii)
function showAnimals(int $n): void
{
    $animals = array("Tiger", "Lion", "Elephant", "Dog", "Cat", "Deer", "Zebra", "Horse");

    echo "<ul>";
    for ($i = 0; $i < min($n, count($animals)); $i++) {
        echo "<li>" . escapeHtml($animals[$i]) . "</li>";
    }
    echo "</ul>";
}

// Q5
function showFeedback(): void
{
    $name = escapeHtml($_POST['uname'] ?? '');
    $gender = escapeHtml($_POST['gender'] ?? 'Not selected');
    $city = escapeHtml($_POST['city'] ?? 'Not selected');
    $department = escapeHtml($_POST['department'] ?? '');
    $college = escapeHtml($_POST['college'] ?? '');

    echo "<h2>Feedback</h2>";
    echo "Name: {$name}<br>";
    echo "Password: ******** (hidden)<br>";
    echo "Gender: {$gender}<br>";
    echo "City: {$city}<br>";
    echo "Department: {$department}<br>";
    echo "College: {$college}<br>";

    if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] === UPLOAD_ERR_OK) {
        echo "Uploaded File Name: " . escapeHtml(basename($_FILES['ufile']['name'])) . "<br>";
        echo "File Size: " . (int)$_FILES['ufile']['size'] . " bytes<br>";
    } elseif (isset($_FILES['ufile']) && $_FILES['ufile']['error'] !== UPLOAD_ERR_NO_FILE) {
        echo "File upload failed. Error code: " . (int)$_FILES['ufile']['error'] . "<br>";
    } else {
        echo "No file uploaded.<br>";
    }
}

// Q6
function showAnimalImages(int $n): void
{
    $images = array(
        "images/tiger.jpg",
        "images/cat.jpg",
        "images/zebra.jpg",
        "images/elephant.jpg",
        "images/dog.jpg",
        "images/deer.jpg"
    );

    for ($i = 0; $i < min($n, count($images)); $i++) {
        $src = escapeHtml($images[$i]);
        echo "<img src='{$src}' alt='Animal image' width='180' height='130' style='object-fit:cover;margin:8px;'>";
    }
}

// Q7: Save the submitted student in MySQL and display all saved records.
function saveStudentAndDisplayRecords(PDO $pdo): void
{
    $name = trim($_POST['student_name'] ?? '');
    $email = trim($_POST['student_email'] ?? '');

    if ($name === '') {
        throw new InvalidArgumentException('Please enter the student name.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidArgumentException('Please enter a valid email address.');
    }

    $insert = $pdo->prepare(
        'INSERT INTO ajax_students (name, email) VALUES (:name, :email)'
    );

    try {
        $insert->execute([
            ':name' => $name,
            ':email' => $email
        ]);
        echo "<p><strong>Student record saved successfully.</strong></p>";
    } catch (PDOException $exception) {
        if ($exception->getCode() === '23000') {
            throw new InvalidArgumentException('This email address is already registered.');
        }
        throw $exception;
    }

    $records = $pdo->query(
        'SELECT id, name, email, created_at FROM ajax_students ORDER BY id DESC'
    )->fetchAll();

    echo "<h3>Student Records in MySQL</h3>";

    if (count($records) === 0) {
        echo "No student records found.";
        return;
    }

    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr>";

    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . (int)$record['id'] . "</td>";
        echo "<td>" . escapeHtml($record['name']) . "</td>";
        echo "<td>" . escapeHtml($record['email']) . "</td>";
        echo "<td>" . escapeHtml($record['created_at']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Q8: Store subject marks in an associative array and calculate the result.
function calculateSubjectResult(): void
{
    $studentName = trim($_POST['result_student_name'] ?? '');
    $subjectMarks = $_POST['subject_marks'] ?? null;

    if ($studentName === '') {
        throw new InvalidArgumentException('Please enter the student name.');
    }

    if (!is_array($subjectMarks) || count($subjectMarks) === 0) {
        throw new InvalidArgumentException('Please enter the subject-wise marks.');
    }

    $total = 0;
    foreach ($subjectMarks as $subject => $mark) {
        if ($mark === '' || !is_numeric($mark) || (float)$mark < 0 || (float)$mark > 100) {
            throw new InvalidArgumentException('Every subject mark must be between 0 and 100.');
        }
        $subjectMarks[$subject] = (float)$mark;
        $total += $subjectMarks[$subject];
    }

    $numberOfSubjects = count($subjectMarks);
    $average = $total / $numberOfSubjects;
    $grade = findGrade($average);

    echo "<h2>Student Result</h2>";
    echo "Student Name: " . escapeHtml($studentName) . "<br><br>";
    echo "<h3>Subject-wise Marks</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Subject</th><th>Marks</th></tr>";

    foreach ($subjectMarks as $subject => $mark) {
        echo "<tr><td>" . escapeHtml($subject) . "</td><td>" . escapeHtml($mark) . "</td></tr>";
    }

    echo "</table><br>";
    echo "Total Marks: " . escapeHtml($total) . " / " . ($numberOfSubjects * 100) . "<br>";
    echo "Average Marks: " . number_format($average, 2) . " / 100<br>";
    echo "Grade: <strong>" . escapeHtml($grade) . "</strong>";
}

// Main program: decide which question was submitted.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

$question = $_POST['question'] ?? '';

try {
    switch ($question) {
        case 'q1':
            showHello();
            break;

        case 'q2':
            $marks = filter_var($_POST['marks'] ?? null, FILTER_VALIDATE_INT);
            if ($marks === false || $marks < 0 || $marks > 100) {
                throw new InvalidArgumentException('Marks must be an integer between 0 and 100.');
            }
            echo 'Marks entered: ' . $marks . '<br>';
            echo 'Grade: ' . escapeHtml(findGrade($marks));
            break;

        case 'q3':
            $n = filter_var($_POST['n'] ?? null, FILTER_VALIDATE_INT);
            if ($n === false || $n < 1) {
                throw new InvalidArgumentException('Please enter a positive integer for N.');
            }
            echo "Odd numbers between 1 and {$n}:<br>";
            showOddNumbers($n);
            break;

        case 'q4i':
            $rawNumbers = trim($_POST['numbers'] ?? '');
            if ($rawNumbers === '') {
                throw new InvalidArgumentException('Please enter at least one number.');
            }
            $parts = preg_split('/[\s,]+/', $rawNumbers);
            foreach ($parts as $part) {
                if (!is_numeric($part)) {
                    throw new InvalidArgumentException('Enter numbers separated by spaces or commas.');
                }
            }
            $numbers = array_map('intval', $parts);
            echo 'Original: ' . implode(', ', $numbers) . '<br>';
            echo 'Sorted: ' . implode(', ', sortNumbers($numbers));
            break;

        case 'q4ii':
            $n = filter_var($_POST['animal_count'] ?? null, FILTER_VALIDATE_INT);
            if ($n === false || $n < 1 || $n > 8) {
                throw new InvalidArgumentException('Enter a number of animals between 1 and 8.');
            }
            showAnimals($n);
            break;

        case 'q5':
            showFeedback();
            break;

        case 'q6':
            $n = filter_var($_POST['image_count'] ?? null, FILTER_VALIDATE_INT);
            if ($n === false || $n < 1 || $n > 6) {
                throw new InvalidArgumentException('Enter a number of images between 1 and 6.');
            }
            showAnimalImages($n);
            break;

        case 'q7':
            $pdo = getDatabaseConnection();
            saveStudentAndDisplayRecords($pdo);
            break;

        case 'q8':
            calculateSubjectResult();
            break;

        default:
            http_response_code(400);
            echo 'Invalid question selected.';
    }
} catch (InvalidArgumentException $exception) {
    http_response_code(422);
    echo escapeHtml($exception->getMessage());
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    echo 'Database error. Check that MySQL is running, database php_assignment exists, the table ajax_students has been created, and db.php has the correct username and password.';
} catch (Throwable $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    echo 'An unexpected server error occurred. Check the PHP server terminal for details.';
}
