<template>
        <form @submit.prevent="handleEdit" class="form-horizontal" autocomplete="off">
          <!-- Task Name -->
          <div class="form-group">
              <label for="title" class="col-sm-3 control-label">Title</label>

              <div class="col-sm-6">                
                <input type="text" name="title" id="task-title" class="form-control" v-model="title"> 
              </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Description</label>

            <div class="col-sm-6">
              <textarea name="description" id="task-description" class="form-control" v-model="description"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="url" class="col-sm-3 control-label">Attach URL</label>
            <div class="col-sm-6">
                <input type="url" name="url" id="task-url" v-model="attach_url" class="form-control">
            </div>
        </div>
          <!-- Add Task Button -->
          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-primary">
                      <i class="fa fa-plus"></i> Edit Task
                  </button>
              </div>
          </div>
      </form>

</template>

<script>
import axios from 'axios'

export default {
  props: ['task'],
  created() {
    console.log(this.title)
  }, 
  data() {
    return {
      title: this.task.title,
      description: this.task.description,
      attach_url: this.task.attach_url,

    }
  },
  methods: {
    async handleEdit() {
      try {
        this.task.title = this.title
        this.task.description = this.description
        this.task.attach_url = this.attach_url
        await axios.patch('/task', this.task)
        location.href = '/'
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>

<style>

</style>