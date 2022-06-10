<template>
  <table class="table">
    <tbody>
      <tr v-for="task in tasks" :key="task.id">
        <th scope="row">{{task.title}}</th>
        <td>{{ transformDate(task.created_at) }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: ['tasks'],
  created() {
    // props are exposed on `this`
    console.log(this.tasks)
  },
  methods: {
    transformDate(date) {
      let newDate = new Date(date)
      return newDate.toLocaleString('pt-BR', {
        timezone: 'UTC'
      })
    }
  }
}
</script>

<style>

</style>