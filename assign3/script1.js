document.write(`
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f8f5;
    margin: 0;
    padding: 0;
    color: #1f2933;
}

header {
    background-color: #276749;
    color: whitesmoke;
    text-align: center;
    padding: 30px;
}

header h1 {
    margin-bottom: 8px;
}

header p {
    font-size: 16px;
    color: #d1fae5;
}

main {
    width: 80%;
    margin: 30px auto;
    background-color: white;
    padding: 25px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h2 {
    color: #276749;
}

p {
    color: #4b5563;
}

li {
    margin: 10px 0;
    color: #4b5563;
}

.print-button {
    text-align: center;
    margin-top: 30px;
}

button {
    background-color: #276749;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #1e4d3b;
}

</style>
<header>
    <h1>Computer Science And Technology</h1>
    <p>Welcome to IIEST Shibpur</p>
</header>
<main>
    <h2>About</h2>
    <p>
        The Department of Computer Science and Technology (CST) was established in 1982. Since its inception the department has played an important role in developing a vibrant and forward looking academic environment.
    </p>
    <h2>Faculties : </h2>
    <ul>
        <li>Prof. Ashish Kumar Layek</li>
        <li>Dr. Apurba Sarkar</li>
        <li>Dr. Tamal Pal</li>
        <li>Dr. Sipra Das Bit</li>
        <li>Dr. Nirnay Ghosh</li>
        <li>Dr. Samit Biswas</li>
    </ul>
    <h2>Department Facilities</h2>
    <ul>
        <li>Computer Laboratories</li>
        <li>Hardware Laboratories</li>
        <li>Seminar Halls</li>
        <li>Smart Classrooms</li>
        <li>Internet and Wi-Fi Facility</li>
    </ul>
    <h2>Contact Information</h2>
    <p>
        <strong>Address:</strong>
        Department of Computer Science and Technology, IIEST Shibpur, Kolkata, West Bengal, 711103, India
    </p>
    <p>
        <strong>Email:</strong>
        info@dept.com
    </p>
    <p>
        <strong>Phone:</strong>
        +91 9154513745
    </p>
    <div class="print-button">
        <button onclick="window.print()">
            Print This Page
        </button>
    </div>
</main>
`);