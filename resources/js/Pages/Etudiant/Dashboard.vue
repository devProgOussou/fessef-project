<template>
  <div>
    <!--Section Profil du Stagiaire-->

    <div class="container">
      <div class="row">
        <div class="col-md-12 m-auto">
          <div class="card shadow-sm mb-4" style="height: 90px">
            <div class="ml-4">
              <img
                v-if="this.user[0].avatar != null"
                :src="'/uploads/avatar/' + this.user[0].avatar"
                class="img-thumbnail shadow-sm text-left ml-4"
                alt="image"
                width="50"
                height="25"
                style="margin-top: 40px; border: solid 5px #fff"
              />

              <img
                v-else
                src="/uploads/avatar/avatar.png"
                class="img-thumbnail shadow-sm text-left ml-4"
                alt="image"
                width="50"
                height="25"
                style="margin-top: 40px; border: solid 5px #fff"
              />
              <inertia-link
                :href="'/Etudiant/editAvatar/' + this.etudiant[0].user_id"
                class="btn btn-sm mt-4"
                style="
                  margin-right: 50px;
                  float: right;
                  background-color: #3563a9;
                  color: #fff;
                "
                >Mise à jour</inertia-link
              >
            </div>

            <div class="text-center ml-4"></div>
          </div>
        </div>

        <div class="col-md-4 mt-4">
          <div class="card mr-2 ml-4 mb-3 mt-4 shadow-sm">
            <h6 class="card-header" style="color: blue">PROFIL INFOS</h6>
            <div class="card-body mt-4">
              <h5 class="card-title"></h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>

              <p class="card-text">
                <strong
                  >{{ this.etudiant[0].nom }}
                  {{ this.etudiant[0].prenom }}</strong
                >
              </p>
              <p class="card-text">
                <strong>E-mail: </strong>{{ this.user[0].email }}
              </p>
              <p class="card-text">
                <strong>Phone: </strong>{{ this.etudiant[0].telephone }}
              </p>
              <p class="card-text"><strong>Date de naissance: </strong>None</p>
              <p class="card-text"><strong>Genre: </strong>Homme</p>
              <p class="card-text">
                <strong>Bio: </strong>{{ this.etudiant[0].description }}
              </p>
              <div class="text-center">
                <inertia-link
                  :href="'/etudiant/edit/' + this.etudiant[0].user_id"
                  class="btn btn-sm"
                  style="background-color: #3563a9; color: #fff"
                >
                  Mise à jour
                </inertia-link>
              </div>
            </div>
            <h6 class="card-header" style="color: blue">COMPETENCES</h6>
            <p class="ml-5">{{ this.etudiant[0].competences }}</p>
          </div>
        </div>

        <div class="col-md-5 mt-4" v-if="this.feusseuls[0] != null">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-3 mt-4" id="">
                <div class="card-header" style="height: 55px; padding: 5px">
                  <img
                    class="rounded-circle border border-warning d-inline"
                    v-if="this.user[0].avatar != null"
                    :src="'/uploads/avatar/' + this.user[0].avatar"
                    alt="user"
                    width="40px"
                    height="40px"
                  />
                  <img
                    class="rounded-circle border border-warning d-inline"
                    v-else
                    src="/uploads/avatar/avatar.png"
                    alt="user"
                    width="40px"
                    height="40px"
                  />
                  <div
                    class="text-muted font-weight-bold dropdown d-inline ml-2"
                  >TEXT</div>

                  <inertia-link
                    href=""
                    class="float-right mr-2"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="fas fa-ellipsis-h mt-3 text-secondary"></i
                  ></inertia-link>
                  <!-- debut du list dropdown -->
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <inertia-link
                      class="dropdown-item text-danger delete"
                      href="POST_ETUDIANT"
                    >
                      Delete
                    </inertia-link>
                    <inertia-link class="dropdown-item" href="#"
                      >Signalez</inertia-link
                    >
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -32px"></p>
                  <small class="text-muted ml-5">{{
                    this.feusseuls[0].titre
                  }}</small>
                </div>
                <img
                  v-if="
                    this.feusseuls[0].extension == 'jpeg' ||
                    this.feusseuls[0].extension == 'jpg' ||
                    this.feusseuls[0].extension == 'png'
                  "
                  :src="'uploads/' + this.feusseuls[0].file"
                  width="1000"
                  height="500"
                  alt=""
                  class="card-img-top card-infoImg"
                />
                <video
                  controls
                  v-if="this.feusseuls[0].extension == 'mp4'"
                  width="445"
                  height="400"
                >
                  <source
                    :src="'/uploads/videos/' + this.feusseuls[0].file"
                    type="video/mp4"
                    class="card-img-top card-infoImg"
                  />
                </video>

                <div class="card-body">
                  <p class="card-text">{{ this.feusseuls[0].contenu }}</p>
                  <small class="text-muted ml-5">
                    Nombre de likes : {{ this.feusseuls[0].like }}
                  </small>
                </div>
                <div class="card-footer text-muted text-center">
                  <h6 class="card-header">4 Novembre 2020</h6>

                  <p class="text-left ml-2">
                    <inertia-link :href="'/Feusseul/Show/'+this.feusseuls[0].id" class="float-right mr-2 text-primary">
                      Voir plus...
                    </inertia-link>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>


    <div class="col-md-5 mt-4" v-else>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-3 mt-4" id="">
                <div class="card-header" style="height: 55px; padding: 5px">
                    <p class="text-center mt-2">Rien a afficher</p>
                </div>
              </div>
            </div>
          </div>
    </div>

        <div class="col-md-3 mt-4">
          <div class="card mr-4 ml-2 mb-3 mt-4">
            <div class="card-body">
              <div class="text-center">
                <i
                  class="fa fa-binoculars"
                  aria-hidden="true"
                  style="font-size: 40px; color: #3563a9"
                  s
                ></i>
              </div>
            </div>
          </div>

          <!-- Trois derniers posts -->

          <div class="card ml-2 mr-4 mb-3">
            <div class="row no-gutters"
                v-for="annonce in annonces"
                :key="annonce.id">
              <div class="col-md-4">
                <img
                  :src="'uploads/'+annonce.image"
                  width="100"
                  height="300"
                  class="card-img img-fluid pimg"
                  alt=""
                />
              </div>
              <div
                class="col-md-8"
              >
                <div class="card-body">
                  <inertia-link class="text-dark" :href="'/Annonce/'+annonce.id">
                    <h5 class="card-title">{{ annonce.titre }}</h5>
                  </inertia-link>
                  <p class="card-text"></p>
                  <h6 class="card-text">
                    <small class="text-muted">
                      {{ annonce.description }}
                    </small>
                  </h6>
                  <p>{{ annonce.contenu | truncate(27) }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FileInput from "../../Shared/FileInput";
export default {
    components:{
        FileInput
    },
  name: "Dashboard",
  props: ["etudiant", "user", "files", "feusseuls", "annonces"],
};
</script>

<style scoped>
body {
  background-color: lightgrey;
  padding: 0;
  margin: 0;
}

.col-mb-3 {
  display: grid;
  justify-content: center;
  align-content: center;
  min-height: 100vh;
}

h3 {
  text-align: justify;
}

.shadow {
  display: flex;
}
</style>
