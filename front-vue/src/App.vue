<template>
  <div id="app">
    <div>
      <div style="width: 330px;">
        <DropDown @typeSelected="onTypeSelected"></DropDown>
        <Btn v-if="!isRequesting" @onCreateItem="onCreateItem">Создать</Btn>
        <div v-if="isRequesting" class="loader-wrapper"><div class="loader"></div></div>
      </div>
      <List :data="list"></List>
    </div>
  </div>
</template>

<script>
import axios from "axios"
import List from './components/List.vue'
import Btn from './components/Button.vue'
import DropDown from './components/DropDown.vue'

export default {
  name: 'App',
  components: {
    List,
    Btn,
    DropDown
  },
  data(){
    return{
      selected: '',
      list: [],
      isRequesting: false,
    }
  },
  methods:{
    onCreateItem(){
      if(this.selected.trim()=='') return false
      this.isRequesting = true
      axios.post('/api/item', {
        type: this.selected
      }).then(response => {
        this.list.push(response.data)
        this.isRequesting = false;
        // console.log(this.list)
      })
    },
    onTypeSelected(value){
      this.selected = value;
    }
  }

}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 60px;
}

.loader-wrapper{
  display: inline-block;
  border: none;
  outline: none;
  border-radius: 5px;
  border: 1px solid #0063ccaf;
  max-width: 25px !important;
  background-color: #0069d9b7;
  max-height: 25px !important;
  margin: 0 0 0   50px;
  padding: 1px 1px 0 1px;
  transform: translateY(3px);
}

.loader,
.loader:after {
  display: inline-block;
  border-radius: 50%;
  width: 15px;
  height: 15px;
}
.loader {
  font-size: 10px;
  position: relative;
  text-indent: -9999em;
  border-top: 3px solid #fff;
  border-right: 3px solid #4893e3;
  border-bottom: 3px solid #4893e3;
  border-left: 3px solid #fff;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


</style>
