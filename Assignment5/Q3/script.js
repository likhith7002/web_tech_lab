function loadRecords() {

    let result = document.getElementById("result");

    result.innerHTML = "Loading records...";

    fetch("fetch_records.php")
        .then(response => response.text())
        .then(data => {

            result.innerHTML = data;

        })
        .catch(error => {

            result.innerHTML =
                "Error fetching records from the server.";

        });
}