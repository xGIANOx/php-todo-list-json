<?php

if (isset($_POST['todo'])) {
    $todo = $_POST['todo'];
    $newTodo = $todo['todo'];
    $status = $todo['status'];

    $todo_string = file_get_contents('todo.json');
    $todo_array = json_decode($todo_string, true);

    foreach ($todo_array as $item) {
        if ($item['todo'] === $newTodo) {
            $item['status'] = $status;
            break;
        }
    }

    $new_todo_json_string = json_encode($todo_array);

    file_put_contents('todo.json', $new_todo_json_string);

    header('Content-Type: application/json');
    echo $new_todo_json_string;
}