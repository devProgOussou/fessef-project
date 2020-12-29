<template>
  <div>
    <div class="container">
      <div class="row">
        <!-- Card resultat -->
        <div class="col-md-12 mt-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h4
                class="card-title text-center text-dark"
                v-if="this.queryCount == 0"
              >
                0 resultat
              </h4>

              <h4
                class="card-title text-center text-dark"
                v-if="this.queryCount == 1"
              >
                {{ this.queryCount }} resultat
              </h4>

              <h4
                class="card-title text-center text-dark"
                v-else-if="this.queryCount > 1"
              >
                {{ this.queryCount }} resultats
              </h4>
            </div>
          </div>
        </div>
        <!-- Fin du barre de resultat -->
        <div class="col-md-2 mt-4 mb-4"></div>
        <div class="col-md-8 mt-4 mb-4">
          <!-- debut du card resultat du recherche -->

          <div
            class="card mr-4 mb-3 shadow-sm"
            v-for="item in searchingProfile"
            :key="item.id"
          >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img
                  v-if="item.avatar != null"
                  :src="'/uploads/avatar/' + item.avatar"
                  class="card-img img-fluid pimg"
                  alt=""
                  style="width: 100%; height: 100%"
                />
                <img
                  v-else
                  :src="'/uploads/avatar/avatar.png'"
                  class="card-img img-fluid pimg"
                  alt=""
                  style="width: 100%; height: 100%"
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <a class="text-dark" href="">
                    <h5 class="card-title">Prenom et nom : {{ item.name }}</h5>
                  </a>
                  <p class="card-text">
                    <small>adresse mail : {{ item.email }}</small>
                    <br />
                    <small>telephone : {{ item.telephone }}</small>
                    <br />
                    <inertia-link
                      class="btn btn-secondary text-dark"
                      :href="'/User/Profile/' + item.id"
                      style="margin-left: -5px"
                    >
                      Voir profil
                    </inertia-link>
                  </p>
                  <p class="card-text">
                    <small class="text-muted"
                      >Depuis : {{ item.created_at | timeformat }}</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Fin du barre de recherche -->
        </div>
        <div class="col-md-2 mt-4 mb-4"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["queryCount", "searchingProfile"],
};
</script>

<style>
</style>template
