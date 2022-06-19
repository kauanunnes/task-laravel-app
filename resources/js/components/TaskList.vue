<template>
  <div class="container">
    <div class="row mb-3">
      <div class="col-6">
        <h3>Tasks</h3>
      </div>
      <div class="col-6">
        <a href="/task/new" class="anchor-btn-link">
          New task
        </a>        
      </div>
    </div>   

    <table class="table">
      <tbody>
        <tr v-for="task in tasks" :key="task.id" class="row">
          <th scope="row" class="col-6">
            <a :href="`/task/${task.id}`" :class="{ done: task.is_done }">
              {{task.title}}
            </a>
          </th>
          <td class="col-2 text-success" :class="{'text-danger': !task.is_done }">{{ task.is_done ? 'Finished!' : 'Not finished.' }}</td>
          <td class="col-sm">{{ transformDate(task.created_at) }}</td>
          <td class="col-2">
            <button type="button" @click="deleteTask(task.id)" class="d-block" style="padding: 0 50%;">
              <span class="material-icons text-danger">
                delete
              </span>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios'
import { transformDate } from '../helpers/functions'

export default {
  props: ['tasks'],
  created() {
  },
  methods: {
    transformDate: transformDate,
    async deleteTask(task_id) {
      try {
        await axios.delete(`/task/${task_id}`)
        location.reload()
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  .done {
    text-decoration: line-through;
  }
  button {
    background: none;
    padding: none;
    margin: none;
    border: none;
  }
</style>