<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-todo-list-json</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .completed {
            text-decoration: line-through;
            color: grey;
        }
    </style>
</head>
<body>

    <div id="app">

    <h1 class="text-center mt-3">Todo List</h1>

    <div class="container_sm">
        <div class="card mt-5 py-3">
            <ul class="m-0" id="todo-list">
            <li v-for="(todo, index) in todos" :key="index" :class="{ completed: todo.completed }">
          <input type="checkbox" v-model="todo.completed" @change="updateTodoStatus(index)">
                    {{ todo.todo }}
                </li>
                
            </ul>
        </div>
        <div class="input-group mt-3">
            <input type="text" placeholder="Add a new task" v-model="newTodo" @keyup.enter="add_todo">
        </div>
        
    </div>

    </div>

    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script> 
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src='./app.js'></script>
</body>
</html>