<?php
  $todo_json_string = file_get_contents('todo.json');

  header("Access-Control-Allow-Origin: http://localhost:5173");
  header("Access-Control-Allow-Headers: X-Requested-With");

  echo $todo_json_string;