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
            {{ result.name_fr }} 
             <ul class="list-group">
                  <li class="list-group-item" v-for="base in result.bases">{{ base.name_fr }}</li>
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
      this.results = [];
      if (this.query.length > 2) {
            axios
              .get("/api/search", { params: { query: this.query } })
              .then((response) => {
                this.results = response.data.data;
              });
        }
      },
   },
};
</script>
