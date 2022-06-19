<template>
  <div class="panel-body"> 
    <div class="row">
      <div class="col-6">
        <h1>{{task.title}}</h1>
        <span class="text-success" :class="{'text-danger': !task.is_done }">This task is {{task.is_done ? 'finished!' : 'not finished.'}}</span>
        <p><strong>Description: </strong>{{task.description}}</p>
        <p><strong>Created at: </strong>{{transformDate(task.created_at)}}</p>
        <button class="btn btn-success" :disabled="is_done" @click="markAsFinished(task)" :class="{'btn-danger': task.is_done}">{{task.is_done ? 'Finished' : 'Mark as finished'}}</button>
        <a :href="'/task/edit/'+task.id" class="anchor-btn-link">Edit task</a>
      </div>
      <div class="col-6">
        <img v-if="checkFileFormat(task.attach_url) === 'image'" :src="task.attach_url" alt="">
        <video v-else controls>
          <source :src="task.attach_url" type="video/mp4">
        </video>
      </div>
    </div>

  </div>
</template>

<script>
import { transformDate, checkFileFormat } from '../helpers/functions'
import axios from 'axios'

export default {
  props: ['task'],
  methods: {
    transformDate: transformDate,
    checkFileFormat: checkFileFormat,
    async markAsFinished(task) {
      try {
        await axios.put(`/task/${task.id}`)
        location.reload()
      } catch (error) {
        console.log(error)
      }
    }
  },
  computed: {
    is_done() {
      return this.task.is_done != 0
    }
  },
  created() {
    console.log(this.is_done)
    
  }
}
</script>

<style scoped>
  img {
    display: block;
    max-width: 100%;
  }
</style>