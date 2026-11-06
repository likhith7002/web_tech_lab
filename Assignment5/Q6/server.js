const http = require("http");
const mysql = require("mysql2");

const port = 3000;

// Create MySQL connection
const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "student_db"
});

// Connect to MySQL
db.connect(function(error) {

    if (error) {
        console.log("Database connection failed.");
        console.log(error.message);
        return;
    }

    console.log("Connected to MySQL database.");
});


// Create HTTP server
const server = http.createServer(function(req, res) {

    if (req.url === "/") {

        db.query(
            "SELECT * FROM `2024CST001`",
            function(error, results) {

                if (error) {

                    res.writeHead(500, {
                        "Content-Type": "text/plain"
                    });

                    res.end("Database error.");
                    return;
                }


                res.writeHead(200, {
                    "Content-Type": "text/html"
                });


                let html = `
                    <!DOCTYPE html>

                    <html>
                    <head>

                        <title>Student Records</title>

                        <style>

                            body {
                                font-family: Arial;
                                background: #f2f2f2;
                                padding: 40px;
                            }

                            .container {
                                max-width: 800px;
                                margin: auto;
                                background: white;
                                padding: 30px;
                                border-radius: 10px;
                            }

                            h1 {
                                text-align: center;
                            }

                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                            }

                            th, td {
                                border: 1px solid #ccc;
                                padding: 10px;
                                text-align: center;
                            }

                            th {
                                background: #667eea;
                                color: white;
                            }

                        </style>

                    </head>

                    <body>

                    <div class="container">

                    <h1>Student Records</h1>

                    <table>

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Department</th>
                        <th>Marks</th>
                    </tr>
                `;


                results.forEach(function(student) {

                    html += `
                        <tr>

                            <td>${student.id}</td>

                            <td>${student.name}</td>

                            <td>${student.age}</td>

                            <td>${student.department}</td>

                            <td>${student.marks}</td>

                        </tr>
                    `;

                });


                html += `
                    </table>

                    </div>

                    </body>
                    </html>
                `;


                res.end(html);

            }
        );

    } else {

        res.writeHead(404, {
            "Content-Type": "text/plain"
        });

        res.end("Page not found.");

    }

});


server.listen(port, function() {

    console.log(
        "Server running at http://localhost:" + port
    );

});