<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['taskName'], $_POST['taskDescription'])) {
    $taskName = trim($_POST['taskName']);
    $taskDescription = trim($_POST['taskDescription']);
    $taskDeadline = $_POST['taskDeadline'];
    $taskCompleted = false;
    $userId = $_SESSION['user']['id'];

    $statement = $database->prepare('INSERT INTO tasks(task, description, deadline, completed, user_id) VALUES (:task, :description, :deadline, :completed, :user_id)');
    $statement->bindParam(':task', $taskName);
    $statement->bindParam(':description', $taskDescription);
    $statement->bindParam(':deadline', $taskDeadline);
    $statement->bindParam(':completed', $taskCompleted);
    $statement->bindParam(':user_id', $userId);
    $statement->execute();
}

redirect('/wunderlists.php');
