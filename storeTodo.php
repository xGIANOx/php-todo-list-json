<?php


if (isset($_POST['newTodo'])) {
  $todo = $_POST['newTodo'];

  
  $todo_string = file_get_contents('todo.json');
  
  $todo_array = json_decode($todo_string, true);
  //add the new task to the array
  array_unshift($todo_array, $todo);

  // convert the array back into a json string
  $new_todo_json_string = json_encode($todo_array);
  // replace the file content using file_put_contents()
  file_put_contents('todo.json', $new_todo_json_string);
  // add header application/json
  header('Content-Type: application/json');
  // echo json
  echo $new_todo_json_string;
}