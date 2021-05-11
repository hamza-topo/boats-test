<template>
  <div>
    <div class="panel-footer">
      <ul class="list-group">
        <!-- Boats : {{result.boat_count}} | ports : {{  result.bases.length }}  | Name : {{result.name_fr}}
             <ul class="list-group">
                  <li v-if="showOnlyQuery(base.name_fr)" class="list-group-item" v-for="base in result.bases">
                     Base Name : {{ base.name_fr }} | Base Type : {{base.base_type}} |  Contry : {{base.contry_name}} | Boats Number : {{base.boats}}
                  </li> 
                  {{results}}
             </ul> -->
      </ul>
      <ul id="extglobalnav" v-if="displayResult">
        <li>Nom : {{ result.name_fr }}</li>
        <li>Bateau : {{ result.boat_count }}</li>
        <li>
          <ul id="extglobalnav">
            <li class="list-group-item" v-for="base in result.bases">
              Base : {{ base.name_fr }} | Type : {{ base.base_type }} | Pays :
              {{ base.contry_name }} | Nombre de Boats : {{ base.boats }}
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
      displayResult: false,
      result: [],
    };
  },

  mounted() {
    this.$root.$on("getResult", (item) => {
      if (item) {
        this.result = item;
        this.displayResult = true;
      }else{
        this.result = [];
        this.displayResult = false;
      }
     
    });
  },
};
</script>

<style>
</style>