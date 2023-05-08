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
      console.log('add a new todo');

      const data = {
        newTodo: this.newTodo
      }

      axios.post(
        'storeTodo.php',
        data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then(response => {
          console.log(response);
          this.todos = response.data
        })
        .catch(error => {
          console.error(error.message);
        })

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
