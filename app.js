const { createApp } = Vue;
createApp({
  data() {
    return {
      todos: [],
      api_url: 'readTodo.php',
      newTodo: '',
    }
  },
  methods: {
    add_todo() {
      axios.post(
        "storeTodo.php",
        { newTodo: this.newTodo },
        {
          headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }
      )
        .then(response => {
          const newTodo = response.data.newTodo;
          const status = response.data.status;
          this.todos.unshift({ todo: newTodo, status: status });
          this.newTodo = "";
        })
        .catch(error => {
          console.error(error.message);
        });
    },
    updateTodoStatus(index) {
        this.todos[index].completed = !this.todos[index].completed;
      },
  },
  mounted() {
    axios
      .get(this.api_url)
      .then(response => {
        this.todos = response.data;
      })
      .catch(error => {
        console.error(error.message);
      })
  }
}).mount('#app');