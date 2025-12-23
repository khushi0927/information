fetch("php/fetch.php")
    .then(res => res.json())
    .then(data => {
        let tbody = document.querySelector("#taskTable tbody");
        tbody.innerHTML = "";

        if (data.length === 0) {
            tbody.innerHTML =
                "<tr><td colspan='4'>No data found</td></tr>";
            return;
        }

        data.forEach(task => {
            let row = `
                <tr>
                    <td>${task.task}</td>
                    <td>${task.description}</td>
                    <td>${task.duration}</td>
                    <td>${task.date}</td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    });
