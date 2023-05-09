const { createApp } = Vue
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
        const data = {
          todo: this.newTodo,
          status: "false"
        };
        axios.post(
          "storeTodo.php",
          { newTodo: this.newTodo },
          {
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
          }
        )
        .then(response => {
          console.log(response);
          this.todos.unshift(data);
          this.newTodo = "";
        })
        .catch(error => {
          console.error(error.message);
        });
      },
  },
  mounted() {
    console.log("MOUNTED");
    axios
      .get(this.api_url)
      .then(response => {
        this.todos = response.data
      })
      .catch(error => {
        console.error(error.message);
      })
  }
}).mount('#app')
