<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="8f07381d-615b-4c80-aebe-935af6156460.css">
    <link rel="stylesheet" href="c9afe15d-f2b3-4821-bf59-40a30eb998eb.css">

    <title>Student Management</title>
  </head>
  <body>

    <div class="studentData">
        <form action="" id="form1">
            <input type="text" placeholder="Name" id="name" required>
            <input type="number" placeholder="Number" id="number" required>
            <input type="text" placeholder="City" id="city" required>
            <input type="number" placeholder="Roll No" id="rollNo" required>
            <input type="submit" class="btn btn-warning">
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Number</th>
                <th>City</th>
                <th>Roll No.</th>
                <th>Attendance</th>
            </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>

    <script>
    document.getElementById("form1").addEventListener("submit", function(e) {
        e.preventDefault();
        const name = document.getElementById("name").value;
        const number = document.getElementById("number").value;
        const city = document.getElementById("city").value;
        const rollNo = document.getElementById("rollNo").value;

        fetch("9e8beee3-2e16-46cc-a74d-4113072e6f29.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `name=${name}&number=${number}&city=${city}&rollNo=${rollNo}`
        })
        .then(res => res.text())
        .then(data => {
            console.log("Response:", data); // DEBUG LINE
    if (data.trim() === "success") {
        alert("Student Added Successfully");
        document.getElementById("form1").reset();
        loadStudents();
    } else {
        alert("Error saving student: " + data); // SHOW ERROR MESSAGE
    }
        });
    });

    function loadStudents() {
        fetch("9a5ab9a3-0628-4da2-8ee1-4105614b72bf.php")
            .then(res => res.json())
            .then(data => displayFun(data));
    }

    function displayFun(data) {
        const tbody = document.getElementById("tbody");
        tbody.innerHTML = "";
        let count = 1;
        data.forEach(item => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td>${count++}</td>
                <td>${item.name}</td>
                <td>${item.number}</td>
                <td>${item.city}</td>
                <td>${item.roll_no}</td>
                <td class="td6">
                    <button onclick="this.parentNode.innerHTML='<button>Present</button>'">P</button>
                    <button onclick="this.parentNode.innerHTML='<button id=absent>Absent</button>'">A</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    loadStudents();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
