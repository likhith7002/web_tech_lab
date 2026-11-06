<?php

include "db.php";

function searchRecords($conn, $search) {

    $sql = "SELECT * FROM `2024CST001`
            WHERE name LIKE ?
            OR department LIKE ?
            ORDER BY id ASC";

    $stmt = $conn->prepare($sql);

    $value = "%" . $search . "%";

    $stmt->bind_param("ss", $value, $value);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {

        echo "<p class='no-result'>No matching records found.</p>";

        $stmt->close();
        return;
    }

    echo "<table>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Department</th>";
    echo "<th>Marks</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";

        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";

        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";

        echo "<td>" . htmlspecialchars($row["department"]) . "</td>";

        echo "<td>" . htmlspecialchars($row["marks"]) . "</td>";

        echo "</tr>";
    }

    echo "</table>";

    $stmt->close();
}


// Receive search text
$search = $_POST["search"] ?? "";

searchRecords($conn, $search);

$conn->close();

?>