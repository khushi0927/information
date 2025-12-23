let startTime = null;

function startTimer() {
    startTime = Date.now();
    document.getElementById("status").innerText = " Timer started...";
}

function stopTimer() {

    if (!startTime) {
        alert("Please start the timer first!");
        return;
    }

    let endTime = Date.now();
    let duration = Math.floor((endTime - startTime) / 1000);

    let task = document.getElementById("task").value;
    let desc = document.getElementById("desc").value;

    if (task === "" || desc === "") {
        alert("Please fill all fields");
        return;
    }

    fetch("php/save.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            task: task,
            description: desc,
            duration: duration,
            date: new Date().toISOString().split("T")[0]
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("status").innerText =
            ` Task saved (${duration} seconds)`;
        document.getElementById("taskForm").reset();
        startTime = null;
    });
}
