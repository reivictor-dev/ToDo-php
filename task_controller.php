<?php

    //inclusão dos scripts necessarios:
    require_once "task.php";
    require_once "task_service.php";
    require_once "connection.php";

    //verifica se o "act" esta setado na requisição ou via variável
    $action = isset($_GET['act']) ? $_GET['act'] : $action;

    switch($action) {
        case 'getTasks': //dispara o evento de listar as tarefas
            $conn = new Connection();
            $taskService = new TaskService($conn, new Task());
            $task = $taskService->getTasks();
            break;

        case 'addTask': //dispara o evento de nova tarefa
            $task = new Task();
            $conn = new Connection();
            $task->__set('task', $_POST['task']);
            $taskService = new TaskService($conn, $task);

            if($taskService->addTask()) {
                echo 'Inseriu';
                header('Location: index.php');
            } else {
                echo 'Erro';
            }
            break;

        case 'deleteTask': 
            $task = new Task();
            $conn = new Connection();
            $task->__set('taskId', $_GET['taskId']);
            $taskService = new TaskService($conn, $task);

            if($taskService->deleteTask()) {
                header('Location: index.php');
            } else {
                echo 'Erro';
            }
            break;
        default:
            header('Location: index.php');
            break;
    }
?>