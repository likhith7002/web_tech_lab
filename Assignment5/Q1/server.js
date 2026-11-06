const http = require("http");

function handleRequest(req, res) {

    res.writeHead(200, {
        "Content-Type": "text/plain"
    });

    res.end("Hello Node");
}

const server = http.createServer(handleRequest);

const port = 3000;

server.listen(port, function() {
    console.log("Server running at http://localhost:" + port);
});