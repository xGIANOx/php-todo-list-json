const { createApp } = Vue
createApp({
  data() {
    return {
        todos: [],
        api_url: 'readTodo.php',
        newTodo: '',
    }
  },
  mounted() {

    axios
      .get(this.api_url)
      .then(response => {
        this.todos = response.data
      })
      .catch(error => {
        console.error(error.message);
      })


  }
})