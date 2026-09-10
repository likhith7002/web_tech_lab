let subjectCount = 4;

// Add Subject

document.getElementById("add-subject").addEventListener("click", function () {
    subjectCount++;
    let subjects = document.getElementById("subjects");
    let newSubject = document.createElement("div");

    newSubject.className = "sub-card";
    newSubject.innerHTML = `
        <h3>Subject ${subjectCount}</h3>
        <input type="text" class="subject-name" placeholder="Subject name" required>
        <input type="number" class="marks" placeholder="Marks" min="0" max="100" required>
        <input type="number" class="credits" placeholder="Credits" min="1" max="4" required>
    `;
    subjects.appendChild(newSubject);
});

// Submit

document.getElementById("sgpa-form").addEventListener("submit", function (event) {
    event.preventDefault();
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }

    let name = document.getElementById("name").value;
    let department = document.getElementById("branch").value;
    let semester = document.getElementById("sem").value;

    let marks = document.querySelectorAll(".marks");
    let credits = document.querySelectorAll(".credits");

    let totalPoints = 0;
    let totalCredits = 0;

    for (let i = 0; i < marks.length; i++) {

        let mark = Number(marks[i].value);
        let credit = Number(credits[i].value);
        let gradePoint;
        if (mark >= 90) {
            gradePoint = 10;
        }
        else if (mark >= 80) {
            gradePoint = 9;
        }
        else if (mark >= 70) {
            gradePoint = 8;
        }
        else if (mark >= 60) {
            gradePoint = 7;
        }
        else if (mark >= 50) {
            gradePoint = 6;
        }
        else if (mark >= 40) {
            gradePoint = 5;
        }
        else {
            gradePoint = 4;
        }

        totalPoints += gradePoint * credit;

        totalCredits += credit;
    }

    let sgpa = totalPoints / totalCredits;
    let percentage = sgpa * 10 - 0.5;
    let grade;

    if (sgpa >= 9) {
        grade = "A+";
    }
    else if (sgpa >= 8) {
        grade = "A";
    }
    else if (sgpa >= 7) {
        grade = "B+";
    }
    else if (sgpa >= 6) {
        grade = "B";
    }
    else if (sgpa >= 5) {
        grade = "C";
    }
    else {
        grade = "F";
    }

    // Display Result

    let result = document.getElementById("result");
    let detailsbox = document.getElementById("details-box");
    result.style.display = "block";
    detailsbox.style.display = "none";

    result.innerHTML = `
        <div class="result-head">
            <h2>Result</h2>
        </div>
        <div class="result-body">
            <p><strong>Name:</strong> ${name}</p>
            <p><strong>Department:</strong> ${department}</p>
            <p><strong>Semester:</strong> ${semester}</p>
            <p><strong>Total Subjects:</strong> ${marks.length}</p>
            <p><strong>SGPA:</strong> ${sgpa.toFixed(2)}</p>
            <p><strong>Percentage:</strong> ${percentage.toFixed(2)}%</p>
            <p><strong>Grade:</strong> ${grade}</p>
        </div>
    `;
});

