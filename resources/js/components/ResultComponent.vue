<template>
  <div>
       <div class="panel-footer" v-if="results.length > 0">
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
</template>

<script>
export default {

    data() {
        return {
        query: "",
        results : [],
        };
    },

    mounted(){
                this.$root.$on('getResult', results => {
                    this.results = results ;
                    console.log(results);
                });
    }, 

    methods : {
            //show only result contains the query value
                showOnlyQuery(str)
                {
                    if( str.includes(this.query)  ){
                    return true;
                    }
                    return false;
                }
    }

}
</script>

<style>

</style>