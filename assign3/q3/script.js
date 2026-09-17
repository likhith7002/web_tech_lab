class Student {
    constructor(name, department, institute, gradYear) {
        this.name = name;
        this.department = department;
        this.institute = institute;
        this.gradYear = gradYear;
    }

    getStudentInfo() {
        return `${this.name} &mdash; ${this.department}, ${this.institute} (Class of ${this.gradYear})`;
    }
}

class Project {
    constructor(title, team, contributor) {
        this.title = title;
        this.team = team;
        this.contributor = contributor;
    }

    displayDetails() {
        const outputHtml = `
            <div class="project-title"> ${this.title}</div>
            <div class="team-name">Built by Team ${this.team}</div>
            
            <div class="student-data">
                <strong>Student Record:</strong><br>
                ${this.contributor.getStudentInfo()}
            </div>
        `;
        
        document.getElementById("app").innerHTML = outputHtml;
    }
}

window.onload = () => {
    // Instantiating the student and project data
    const student = new Student("Aripaka Likhith", "Computer Science & Technology", "IIEST Shibpur", 2028);
    const myProject = new Project("Ink2Data", "Data Vision", student);
    
    // Rendering to the screen
    myProject.displayDetails();
};