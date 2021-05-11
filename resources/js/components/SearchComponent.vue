<template>
  <div class="autocomplete">
    <div class="input" @click="toggleVisible" v-text="selectedItem ? selectedItem.query : ''"></div>
    <div class="placeholder" v-if="selectedItem == null" v-text="title"></div>
    <button class="close" @click="selectedItem = null" v-if="selectedItem">x</button>
    <div class="popover" v-show="visible">
      <input type="text"
        ref="input"
        v-model="query"
        @keydown.up="up"
        v-on:input="autoComplete"
        placeholder="Pays, Ville, Port...">
      <div class="options" ref="optionsList">
        <ul>
          <li v-for="(result, index) in results"
            :key="index"
            :class="{ 'selected': (selected == index)}"
            @click="itemClicked(index)"
            >{{result.name_fr}}</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import api from '../api/request';
  export default {
    data() {
      return {
        itemHeight: 39,
        selected: 0,
        query: '',
        title : 'Taper votre Destination...',
        visible: false,
        results:[]
      };
    },
    methods: {
      toggleVisible() {
        this.visible = !this.visible;
        setTimeout(() => {
          this.$refs.input.focus();
        }, 50);
      },

      autoComplete(){
           api.search("/api/search", { params: { query: this.query } })
                    .then((response) => {
                       this.results = response.data.data;
                      //this.$root.$emit('getResult', );
                    }) 
         
      },

      itemClicked(index) {
        console.log(index);
        this.selected = index;
        this.selectItem();
      },
      selectItem() {
        if (!this.results.length) {
          return;
        }
        this.selectedItem = this.results[this.selected];
        this.visible = false;
        if (this.shouldReset) {
          this.query = '';
          this.selected = 0;
        }
        console.log(this.query+" query : "+this.selected)
        this.$emit('selected', JSON.parse(JSON.stringify(this.selectedItem)));
      },
    },
    
  }
</script>

<style scoped>
.autocomplete {
    width: 100%;
    position: relative;
}
.input {
    height: 40px;
    border-radius: 3px;
    border: 2px solid lightgray;
    box-shadow: 0 0 10px #eceaea;
    font-size: 25px;
    padding-left: 10px;
    padding-top: 10px;
    cursor: text;
}
.close {
    position: absolute;
    right: 2px;
    top: 4px;
    background: none;
    border: none;
    font-size: 30px;
    color: lightgrey;
    cursor: pointer;
}
.placeholder {
    position: absolute;
    top: 11px;
    left: 11px;
    font-size: 25px;
    color: #d0d0d0;
    pointer-events: none;
}
.popover {
    min-height: 50px;
    border: 2px solid lightgray;
    position: absolute;
    top: 46px;
    left: 0;
    right: 0;
    background: #fff;
    border-radius: 3px;
    text-align: center;
}
.popover input {
    width: 95%;
    margin-top: 5px;
    height: 40px;
    font-size: 16px;
    border-radius: 3px;
    border: 1px solid lightgray;
    padding-left: 8px;
}
.options {
    max-height: 150px;
    overflow-y: scroll;
    margin-top: 5px;
}
.options ul {
    list-style-type: none;
    text-align: left;
    padding-left: 0;
}
.options ul li {
    border-bottom: 1px solid lightgray;
    padding: 10px;
    cursor: pointer;
    background: #f1f1f1;
}
.options ul li:first-child {
    border-top: 2px solid #d6d6d6;
}
.options ul li:not(.selected):hover {
    background: #8c8c8c;
    color: #fff;
}
.options ul li.selected {
    background: #58bd4c;
    color: #fff;
    font-weight: 600;
}
</style>