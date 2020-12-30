<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
          <br />

          On vous souhaite bon recherche <inertia-link :href="'/entreprise/profil/'+this.entreprise[0].user_id">@{{ this.entreprise[0].NomEntreprise }}</inertia-link>
        
          <h2>Annonce</h2>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 mt-4">
          <div class="mb-2">
            <form @submit.prevent="handleSearch">
              <input
                class="form-control mb-1"
                type="search"
                placeholder="Faites vos recherches"
                aria-label="Search"
                v-model="search.search"
                name="search"
              />
              <button class="btn btn-danger" type="submit">
                Faites vos recherches
              </button>
            </form>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Derniers Annonces</h5>
            </div>
          </div>

          <div class="card mt-1">
            <div class="card-body">
              <a class="text-dark" href="">
                <h6 class="card-title text-center"></h6>
              </a>
            </div>
          </div>
        </div>

        <!--Section Etiquettes-->
        <!-- <div v-if="this.annonces != null"> -->
        <div class="col" v-for="annonce in annonces" :key="annonce.id">
          <h6>Etiquettes:</h6>
          <div class="card">
            <div class="card-body">
              <img
                :src="'/uploads/' + annonce.image"
                width="400"
                height="300"
              />
              <div id="center" style="text-align: center">
                <h6 class="mt-1">{{ annonce.titre }}</h6>
                <p>{{ annonce.description }}</p>
                <p style="color: lightgrey">
                  {{ annonce.created_at | timeformat }}
                </p>
              </div>
              <hr />
              <div id="tags">
                <button class="btn-danger">#IA</button>
                <button class="btn-danger">#BLOCKCHAIN</button>
                <button class="btn-danger">#DATA SCIENCE</button>
              </div>

              <div id="card-hd">
                <br />
                <h6 class="card-header">
                  {{ annonce.user.name }}
                  <p style="text-align: end" v-if="annonce.interet != null">
                    {{ annonce.interet }}
                  </p>
                  <p style="text-align: end" v-else>0</p>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->

        <!-- <pagination
          :data="annonces"
          @pagination-change-page="getResults"
        ></pagination> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["annonces", "entreprise", "otherAnnonce"],
  data() {
    return {
      //   page: 10,
      search: {
        search: null,
      },
    };
  },
  mounted() {
    // Fetch initial results
    // this.getResults();
  },
  methods: {
    // getResults(page = 1) {
    //   this.annonces;
    // },
    handleSearch() {
      const search = new FormData();

      search.append("search", this.search.search);

      this.$inertia.post("/searchProfile", search);
    },
  },
};
</script>

<style>
</style>
