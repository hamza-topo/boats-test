<template>
  <div class="container">
    <div>
      <input
        type="text"
        placeholder="what are you looking for?"
        v-model="query"
        v-on:keyup="autoComplete"
        class="form-control"
      />
     
    </div>
  </div>
</template>

<script>

import api from '../api/request';

export default {
  data() {
    return {
      query: "",
    };
  },
  methods: {
    //create a setTimeout delay between calls
    autoComplete() {
          //make a delay time between cals
          setTimeout(() =>
                api
                    .search("/api/search", { params: { query: this.query } })
                    .then((response) => {
                      this.$root.$emit('getResult', response.data.data);
                    }) 
             
          , 300);
          
          this.results = [];
      
      },
    

   },
};
</script>
