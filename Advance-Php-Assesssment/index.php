<!DOCTYPE html>
<html>
<head>
    <title> Time Tracker</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2> Time Tracker</h2>

    <form id="taskForm">
        <label>Task Name</label>
        <input type="text" id="task" required>

        <label>Task Description</label>
        <textarea id="desc" required></textarea>

        <div class="btns">
            <button type="button" onclick="startTimer()">Start</button>
            <button type="button" onclick="stopTimer()">Stop & Save</button>
        </div>
    </form>

    <p id="status"></p>
</div>

<script src="js/timer.js"></script>
</body>
</html>
