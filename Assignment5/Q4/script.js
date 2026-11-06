document.getElementById("studentForm").addEventListener(
    "submit",
    function(event) {

        // Prevent page reload
        event.preventDefault();

        let form = document.getElementById("studentForm");
        let message = document.getElementById("message");

        // Collect all form data
        let formData = new FormData(form);

        // Send data to PHP using AJAX
        fetch("insert_student.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {

            message.innerHTML = data;

            message.className = "success";

            // Clear form after successful insertion
            form.reset();

        })
        .catch(error => {

            message.innerHTML =
                "Error connecting to the server.";

            message.className = "error";

        });

    }
);