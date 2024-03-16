<template>
  <h1>To-Do List</h1>
  <ToDoForm @todo-added="addToDo"></ToDoForm>
  <h2 id="list-summary" ref="listSummary" tabindex="-1">{{ listSummary }}</h2>
  <ul aria-labelledby="list-summary" class="stack-large">
    <li v-for="item in ToDoItems" :key="item.id">
      <ToDoItem
        :label="item.label"
        :is_done="item.is_done"
        :id="item.id"
        @checkbox-changed="updateIsDoneStatus(item.id)"
        @item-deleted="deleteToDo(item.id)"
        @item-edited="editToDo(item.id, $event)"
      >
      </ToDoItem>
    </li>
  </ul>
</template>

<script>
import ToDoForm from '../components/ToDoForm.vue'
import ToDoItem from '../components/ToDoItem.vue'

export default {
  name: 'HomePage',
  components: {
    ToDoItem,
    ToDoForm,
  },
  data() {
    return {
      ToDoItems: [],
    }
  },
  methods: {
    async listTodos() {
      this.ToDoItems = (
        await this.axios.get('http://localhost:9000/api/tasks')
      ).data.data

      const user = (await this.axios.get('http://localhost:9000/api/me')).data
        .data
      console.log(user)
    },
    async addToDo(toDoLabel) {
      await this.axios.post('http://localhost:9000/api/tasks', {
        label: toDoLabel,
        is_done: false,
      })
      await this.listTodos()
    },
    async updateIsDoneStatus(toDoId) {
      await this.axios.put(`http://localhost:9000/api/tasks/${toDoId}`, {
        is_done: !this.ToDoItems.find((item) => item.id === toDoId).is_done,
        label: this.ToDoItems.find((item) => item.id === toDoId).label,
      })
      await this.listTodos()
    },
    async deleteToDo(toDoId) {
      await this.axios.delete(`http://localhost:9000/api/tasks/${toDoId}`)
      await this.listTodos()
      this.$refs.listSummary.focus()
    },
    async editToDo(toDoId, newLabel) {
      await this.axios.put(`http://localhost:9000/api/tasks/${toDoId}`, {
        label: newLabel,
        is_done: this.ToDoItems.find((item) => item.id === toDoId).is_done,
      })
      await this.listTodos()
    },
  },
  computed: {
    listSummary() {
      const numberFinishedItems = this.ToDoItems.filter(
        (item) => item.is_done
      ).length
      return `${numberFinishedItems} out of ${this.ToDoItems.length} items completed`
    },
  },
  created() {
    this.listTodos()
  },
}
</script>

<style>
/* Global styles */
.btn {
  padding: 0.8rem 1rem 0.7rem;
  border: 0.2rem solid #4d4d4d;
  cursor: pointer;
  text-transform: capitalize;
}
.btn__danger {
  color: #fff;
  background-color: #ca3c3c;
  border-color: #bd2130;
}
.btn__filter {
  border-color: lightgrey;
}
.btn__danger:focus {
  outline-color: #c82333;
}
.btn__primary {
  color: #fff;
  background-color: #000;
}
.btn-group {
  display: flex;
  justify-content: space-between;
}
.btn-group > * {
  flex: 1 1 auto;
}
.btn-group > * + * {
  margin-left: 0.8rem;
}
.label-wrapper {
  margin: 0;
  flex: 0 0 100%;
  text-align: center;
}
[class*='__lg'] {
  display: inline-block;
  width: 100%;
  font-size: 1.9rem;
}
[class*='__lg']:not(:last-child) {
  margin-bottom: 1rem;
}
@media screen and (min-width: 620px) {
  [class*='__lg'] {
    font-size: 2.4rem;
  }
}
.visually-hidden {
  position: absolute;
  height: 1px;
  width: 1px;
  overflow: hidden;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  clip-path: rect(1px, 1px, 1px, 1px);
  white-space: nowrap;
}
[class*='stack'] > * {
  margin-top: 0;
  margin-bottom: 0;
}
.stack-small > * + * {
  margin-top: 1.25rem;
}
.stack-large > * + * {
  margin-top: 2.5rem;
}
@media screen and (min-width: 550px) {
  .stack-small > * + * {
    margin-top: 1.4rem;
  }
  .stack-large > * + * {
    margin-top: 2.8rem;
  }
}
/* End global styles */
#app {
  background: #fff;
  margin: 2rem 0 4rem 0;
  padding: 1rem;
  padding-top: 0;
  position: relative;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 2.5rem 5rem 0 rgba(0, 0, 0, 0.1);
}
@media screen and (min-width: 550px) {
  #app {
    padding: 4rem;
  }
}
#app > * {
  max-width: 50rem;
  margin-left: auto;
  margin-right: auto;
}
#app > form {
  max-width: 100%;
}
#app h1 {
  display: block;
  min-width: 100%;
  width: 100%;
  text-align: center;
  margin: 0;
  margin-bottom: 1rem;
}
</style>
