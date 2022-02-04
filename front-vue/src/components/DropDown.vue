<template>
  <div class="inline-block">
    <select id="mainselection" class="custom-select" v-model="selected" @change="$emit('typeSelected', selected)">
        <option disabled value="">Не выбрано</option>
        <option value="lead">Сделка</option>
        <option value="contact">Контакт</option>
        <option value="company">Компания</option>
      </select>
  </div>
</template>

<script>
// import axios from "axios"
export default {
  name: 'DropDown',
  data(){
    return {
      selected: ""
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.inline-block{
  display: inline;
}
.custom-select {
  font-size: 16px;
  font-weight: 500;
  padding: 5px 12px;
  outline: none;
  background-color: #fff;
  border-radius: 5px;
  border: 1px solid #ced4da;
  width: 200px;
}

#mainselection {
  margin: 10px 15px 10px 10px;
  overflow: hidden;
  width: 200px;
}

</style>
