<?php

include "db.php";

function insertStudent($conn) {

    $name = $_POST["name"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $department = $_POST["department"] ?? "";
    $formType = $_POST["form_type"] ?? "";


    // Validate input
    if (
        $name === "" ||
        $gender === "" ||
        $department === ""
    ) {
        echo "Please fill all the fields.";
        return;
    }


    // Insert data into the table
    $stmt = $conn->prepare(
        "INSERT INTO `2024CST001`
        (name, gender, department)
        VALUES (?, ?, ?)"
    );


    $stmt->bind_param(
        "sss",
        $name,
        $gender,
        $department
    );


    if ($stmt->execute()) {

        echo "Student record inserted successfully.";

    } else {

        echo "Failed to insert student record.";

    }


    $stmt->close();
}


insertStudent($conn);

$conn->close();

?>