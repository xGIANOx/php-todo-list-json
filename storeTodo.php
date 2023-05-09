<?php

if (isset($_POST['newTodo'])) {
    $newTodo = array(
        'todo' => $_POST['newTodo'],
        'status' => 'false'
    );

    $todo_string = file_get_contents('todo.json');
    $todo_array = json_decode($todo_string, true);
    array_unshift($todo_array, $newTodo);
    $new_todo_json_string = json_encode($todo_array);

    file_put_contents('todo.json', $new_todo_json_string);

    header('Content-Type: application/json');
    echo $new_todo_json_string;
}

?>