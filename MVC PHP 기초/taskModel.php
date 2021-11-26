<?php
class TaskModel
{
    public function All()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'notice_board');
        if ($conn->connect_error) {
            die($conn->connect_error);
        }

        $tasks = [];

        $result = $conn->query("SELECT * FROM tasks");

        if ($result) {
            while ($task = $result->fetch_array(MYSQLI_ASSOC)) {
                $tasks[] = $task;
            }
        }

        return $tasks;
    }
}
