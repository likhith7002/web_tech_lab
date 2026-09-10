const faculty = [

    {
        name: "Prof. Ashish Kumar Layek",
        photo: "images/faculty1.webp",
        email: "ashish@cs.iiests.ac.in",
        qualification: "M.E. in Computer Engineering",
        subjects: "Programming Paradigms",
        research: "Wireless Telecommunication and Networking, Pattern Recognition, Computer Vision and Digital Image Processing"
    },

    {
        name: "Dr. Apurba Sarkar",
        photo: "images/faculty2.webp",
        email: "apurba@cs.iiests.ac.in",
        qualification: "Ph.D. in Computer Engineering",
        subjects: "Discrete Mathematics",
        research: "Digital Geometry, Discrete and Combinatorial Geometry, Text Summarization and Image Processing"
    },

    {
        name: "Dr. Tamal Pal",
        photo: "images/faculty3.webp",
        email: "tamal@cs.iiests.ac.in",
        qualification: "Ph.D. in Computer Engineering",
        subjects: "Web Technology",
        research: "Not Available"
    },

    {
        name: "Dr. Sipra Das Bit",
        photo: "images/faculty4.webp",
        email: "sb@cs.iiests.ac.in",
        qualification: "Ph.D. in Computer Engineering",
        subjects: "Database Management Systems",
        research: "IoT, Wireless Sensor Network, Delay Tolerant Network and Mobile Computing"
    },

    {
        name: "Dr. Nirnay Ghosh",
        photo: "images/faculty5.webp",
        email: "nirnay@cs.iiests.ac.in",
        qualification: "Ph.D. in Computer Engineering",
        subjects: "Graph Algorithms",
        research: "Attack Graph Generation, Network Security and Artificial Intelligence"
    },

    {
        name: "Dr. Samit Biswas",
        photo: "images/faculty6.webp",
        email: "samit@cs.iiests.ac.in",
        qualification: "Ph.D. in Computer Engineering",
        subjects: "Theory of Computation",
        research: "Machine Learning, Document Image Processing, Computer Vision and Natural Language Processing"
    }

];


function searchFaculty() {
    const searchValue =
        document.getElementById("Search").value.toLowerCase().trim();
        if(searchValue === ""){
            document.getElementById("search-result").innerHTML = `
            <p>Faculty not found.</p>
        `;
            fac_cards.style.display = "grid";
        }
    const fac_cards = document.getElementById("faculty-cards");
    const result = faculty.find(function (person) {
        return person.name.toLowerCase().includes(searchValue);

    });
    if (!result) {
        document.getElementById("search-result").innerHTML = `
            <p>Faculty not found.</p>
        `;
        fac_cards.style.display = "grid";
    }
    else {
    document.getElementById("search-result").innerHTML = `
            <div class="search-profile">
                <div class="search-profile-photo">
                    <img
                        src="${result.photo}"
                        alt="Faculty Photograph"
                    >
                </div>
                <div class="search-profile-info">
                    <h2>${result.name}</h2>
                    <p>
                        <strong>Email:</strong>
                        ${result.email}
                    </p>
                    <p>
                        <strong>Qualification:</strong>
                        ${result.qualification}
                    </p>
                    <p>
                        <strong>Subjects Teaching:</strong>
                        ${result.subjects}
                    </p>
                    <p>
                        <strong>Research Areas:</strong>
                        ${result.research}
                    </p>
                </div>
            </div>
        `;
    fac_cards.style.display = "none";
    }

}