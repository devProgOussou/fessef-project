<template>
  <div>
    <!--Section Profil du Stagiaire-->

    <div class="container">
      <div class="row">
        <div class="col-md-12 m-auto">
          <div class="card shadow-sm mb-4" style="height: 90px">
            <div class="ml-4">
              <img
                :src="'/uploads/avatar/' + this.user[0].avatar"
                alt="image"
                class="img-thumbnail shadow-sm text-left ml-4"
                height="25"
                style="margin-top: 40px; border: solid 5px #fff"
                v-if="this.user[0].avatar != null"
                width="50"
              />

              <img
                alt="image"
                class="img-thumbnail shadow-sm text-left ml-4"
                height="25"
                src="/uploads/avatar/avatar.png"
                style="margin-top: 40px; border: solid 5px #fff"
                v-else
                width="50"
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
                >Mise à jour
              </inertia-link>
            </div>

            <div class="text-center ml-4"></div>
          </div>
        </div>

        <div class="col-md-4 mt-4">
          <div class="card mr-2 ml-4 mb-3 mt-4 shadow-sm">
            <h6 class="card-header" style="color: blue">PROFIL INFOS</h6>
            <div class="card-body mt-1">
              <h3
                class="badge badge-danger mb-2"
                v-if="this.etudiant[0].CV == null"
              >
                Completez votre profil avant de postuler
              </h3>

              <p class="card-text">
                Prénom et nom :
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
              <p class="card-text">
                <strong>Date de naissance: </strong
                >{{ this.etudiant[0].dateDeNaissance }}
              </p>
              <p class="card-text">
                <strong>Genre: </strong>{{ this.etudiant[0].genre }}
              </p>
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
              <div class="card mb-3 mt-4"
              v-for="feusseul in feusseuls"
              :key="feusseul.id"
              >
                <div class="card-header" style="height: 55px; padding: 5px">
                  <!-- <img
                    :src="'/uploads/avatar/' + this.user[0].avatar"
                    alt="user"
                    class="rounded-circle border border-warning d-inline"
                    height="40px"
                    v-if="this.user[0].avatar != null"
                    width="40px"
                  /> -->
                  <img
                    alt="user"
                    class="rounded-circle border border-warning d-inline"
                    height="40px"
                    src="/uploads/avatar/avatar.png"

                    width="40px"
                  />
                  <!-- <p class="ml-5" style="margin-top: -2em;">{{ this.user[0].name}}</p> -->

                  <a
                    aria-expanded="false"
                    aria-haspopup="true"
                    class="float-right mr-2"
                    data-toggle="dropdown"
                    href=""
                    id="dropdownMenuButton"
                    type="button"
                    ><i class="fas fa-ellipsis-h mt-3 text-secondary"></i
                  ></a>
                  <!-- debut du list dropdown -->
                  <div
                    aria-labelledby="dropdownMenuButton"
                    class="dropdown-menu"
                  >
                    <inertia-link
                      class="dropdown-item text-danger delete"
                      href="POST_ETUDIANT"
                    >
                      Delete
                    </inertia-link>
                    <inertia-link class="dropdown-item" href="#"
                      >Signalez
                    </inertia-link>
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -35px"></p>
                  <small class="text-muted ml-5"></small>
                </div>
                <img
                  :src="'uploads/' + feusseul.file"
                  alt=""
                  class="card-img-top card-infoImg"
                  height="400"
                  v-if="
                    feusseul.extension == 'jpeg' ||
                    feusseul.extension == 'jpg' ||
                    feusseul.extension == 'png'
                  "
                  width="1000"
                />
                <video
                  controls
                  height="400"
                  v-if="feusseul.extension == 'mp4'"
                  width="445"
                >
                  <source
                    :src="'/uploads/videos/' + feusseul.file"
                    class="card-img-top card-infoImg"
                    type="video/mp4"
                  />
                </video>

                <div class="card-body">
                  <p class="card-text">
                    {{ feusseul.contenu | truncate(27) }}
                  </p>
                  <small class="text-muted ml-5">
                    Nombre de likes : {{ feusseul.like }}
                  </small>
                </div>
                <div class="card-footer text-muted text-center">
                  <p class="card-header">
                    {{ feusseul.created_at | timeformat }}
                  </p>

                  <p class="text-left ml-2">
                    <inertia-link
                      :href="'/Feusseul/Show/' + feusseul.id"
                      class="float-right mr-2 text-primary"
                    >
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
                  aria-hidden="true"
                  class="fa fa-binoculars"
                  style="font-size: 40px; color: #3563a9"
                ></i>
              </div>
            </div>
          </div>

          <!-- Trois derniers posts -->
          <div class="col-md-12 mt-5">
            <div
              v-for="annonce in annonces"
              :key="annonce.id"
              class="card ml-2 mr-4 mb-3"
            >
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img
                    :src="'uploads/' + annonce.image"
                    alt=""
                    class="ml-3 mt-4 card-img img-fluid pimg"
                    height="300"
                    width="100"
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <inertia-link
                      :href="'/Annonce/' + annonce.id"
                      class="text-dark"
                    >
                      <p class="card-title">{{ annonce.titre }}</p>
                    </inertia-link>
                    <p class="card-text"></p>
                    <h6 class="card-text">
                      <small class="text-muted">
                        {{ annonce.description | truncate(27) }}
                      </small>
                    </h6>
                  </div>
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
  components: {
    FileInput,
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
