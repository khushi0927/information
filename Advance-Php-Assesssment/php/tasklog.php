<?php
class TaskLog {

    private $file = "../data/tasks.json";

    public function saveTask($task, $desc, $duration, $date) {

        $data = file_exists($this->file)
            ? json_decode(file_get_contents($this->file), true)
            : [];

        $data[] = [
            "task" => $task,
            "description" => $desc,
            "duration" => $duration,
            "date" => $date
        ];

        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }
}
