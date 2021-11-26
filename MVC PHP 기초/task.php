<?php
include "taskModel.php";

$taskModel = new TaskModel();
$tasks = $taskModel->all();

isset($_GET['mode']) ? $mode = $_GET['mode'] : $mode = null;

if ($mode === "app") {
    require_once "task-list-json.php";
} else {
    require_once "task-list-html.php";
}
