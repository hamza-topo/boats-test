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
      <div class="panel-footer" v-if="results.length">
        <ul class="list-group">
          <li class="list-group-item" v-for="result in results">
            Boats : {{result.boat_count}} | ports : {{  result.bases.length }}  | Name : {{result.name_fr}}
             <ul class="list-group">
                  <li v-if="showOnlyQuery(base.name_fr)" class="list-group-item" v-for="base in result.bases">
                     Base Name : {{ base.name_fr }} | Base Type : {{base.base_type}} |  Contry : {{base.contry_name}} | Boats Number : {{base.boats}}
                  </li> 
             </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      query: "",
      results : [],
    };
  },
  methods: {
    //create a setTimeout delay between calls
    autoComplete() {
          //make a delay time between cals
          setTimeout(() =>
                axios
                    .get("/api/search", { params: { query: this.query } })
                    .then((response) => {
                      this.results = response.data.data;
                    
                    }) 
             
          , 300);
          
          this.results = [];
      
      },
    //show only result contains the query value
    showOnlyQuery(str)
    {
        if( str.includes(this.query)  ){
         return true;
        }
        return false;
    }

   },
};
</script>
