<template>
  <div class="btn-container">
    <button class="btn" @click="$emit('onCreateItem', $event.target.value)">Создать</button>
  </div>
</template>

<script>
export default {
  name: 'Btn',
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.btn{
    font-size: 16px;
    font-weight: 500;
    padding: 5px 10px;
    outline: none;
    background-color: rgb(255, 255, 255);
    border-radius: 5px;
    border: 1px solid #ced4da;

}
.btn-container{
    display: inline;
}
.btn:hover{
    color: #fff;
    background-color: #0069d9b7;
    border-color: #0063ccaf;
    outline: none;
}
</style>
