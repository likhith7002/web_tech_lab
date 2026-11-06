document.getElementById("search").addEventListener("input", function() {

    let searchText = this.value;

    let result = document.getElementById("result");

    // Send the partially typed text to PHP
    fetch("search_records.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "search=" + encodeURIComponent(searchText)
    })
    .then(response => response.text())
    .then(data => {

        // Update the table without reloading the page
        result.innerHTML = data;

    })
    .catch(error => {

        result.innerHTML =
            "<p class='error'>Error fetching records.</p>";

    });

});