<template>
  <div class="list-container" style="width:330px;">
    <table>
      <tr>
        <th>ID</th>
        <th>TYPE</th>
      </tr>
      <tr v-for="row in data" :key="row.id">
        <td>{{ row.id }}</td>
        <td>{{ row.type }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
// import axios from "axios"
export default {
  name: 'List',
  props:{
    data: Array
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.list-container{
  margin: 10px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  max-width: 500px;
  min-width: 300px;

  border-collapse: collapse;
  border-radius: 4px;
  border-style: hidden; /* hide standard table (collapsed) border */
  box-shadow: 0 0 0 1px #ced4da; /* this draws the table border  */ 
}

td, th {
  border: 1px solid #ced4da;
  text-align: left;
  padding: 8px;
}
</style>
