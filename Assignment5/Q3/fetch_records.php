<?php

include "db.php";

function fetchRecords($conn) {

    $sql = "SELECT * FROM `2024CST001`";

    $result = $conn->query($sql);

    if (!$result) {
        echo "Error fetching records.";
        return;
    }

    if ($result->num_rows == 0) {
        echo "<p>No records found.</p>";
        return;
    }

    echo "<h2>Student Details</h2>";

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
}

fetchRecords($conn);

$conn->close();

?>