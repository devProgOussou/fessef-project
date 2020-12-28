<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 m-auto">
          <div class="card shadow-sm mb-4" style="height: 90px">
            <div class="ml-4">
              <img
                :src="'/uploads/avatar/' + this.user.avatar"
                alt="image"
                class="img-thumbnail shadow-sm text-left ml-4"
                height="25"
                style="margin-top: 40px; border: solid 5px #fff"
                v-if="this.user.avatar != null"
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
                :href="'/Entreprise/editAvatar/' + this.user.id"
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
          <div
            class="card mr-2 ml-4 mb-3 mt-4 shadow-sm"
            v-if="this.etudiant[0] != undefined"
          >
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
                <strong>E-mail: </strong>{{ this.user.email }}
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
          <div
            class="card mr-2 ml-4 mb-3 mt-4 shadow-sm"
            v-else-if="this.entreprise[0] != undefined"
          >
            <div class="card-body mt-4">
              <h5 class="card-title"></h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>

              <p class="card-text">
                <strong>{{ this.entreprise[0].NomEntreprise }}</strong>
              </p>
              <p class="card-text">
                <strong>E-mail: </strong>{{ this.user.email }}
              </p>
              <p class="card-text">
                <strong>Lien: </strong>{{ this.entreprise[0].lien }}
              </p>
              <p class="card-text">
                <strong>Adresse: </strong>{{ this.entreprise[0].adresse }}
              </p>
              <p class="card-text">
                <strong>Phone: </strong>{{ this.entreprise[0].telephone }}
              </p>
              <p class="card-text">
                <strong>Domaine: </strong
                >{{ this.entreprise[0].domaineActivites }}
              </p>
              <p class="card-text">
                <strong>Description: </strong
                >{{ this.entreprise[0].description }}
              </p>
              <div class="text-center">
                <inertia-link
                  :href="'/entreprise/edit/' + this.entreprise[0].user_id"
                  class="btn btn-sm"
                  style="background-color: #3563a9; color: #fff"
                >
                  Mise à jour
                </inertia-link>
              </div>
            </div>
          </div>
          <div
            class="card mr-2 ml-4 mb-3 mt-4 shadow-sm"
            v-else-if="this.association[0] != undefined"
          >
            <div class="card-body mt-4">
              <h5 class="card-title"></h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>

              <p class="card-text">
                <strong>{{ this.association[0].NomAssociation }}</strong>
              </p>
              <p class="card-text">
                <strong>E-mail: </strong>{{ this.user.email }}
              </p>
              <p class="card-text">
                <strong>Lien: </strong>{{ this.association[0].lien }}
              </p>
              <p class="card-text">
                <strong>Adresse: </strong>{{ this.association[0].adresse }}
              </p>
              <p class="card-text">
                <strong>Phone: </strong>{{ this.association[0].telephone }}
              </p>
              <p class="card-text">
                <strong>Domaine: </strong
                >{{ this.association[0].domaineActivites }}
              </p>
              <p class="card-text">
                <strong>Description: </strong
                >{{ this.association[0].description }}
              </p>
              <div class="text-center">
                <inertia-link
                  :href="'/association/edit/' + this.association[0].user_id"
                  class="btn btn-sm"
                  style="background-color: #3563a9; color: #fff"
                >
                  Mise à jour
                </inertia-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4" v-if="this.feusseuls[0] != null">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-3 mt-4" v-for="feusseul in feusseuls" :key="feusseul.id">
                <div class="card-header" style="height: 55px; padding: 5px">


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
                  <small class="text-muted ml-5">{{
                    feusseul.titre
                  }}</small>
                </div>
                <img
                  :src="'uploads/' + feusseul.file"
                  alt=""
                  class="card-img-top card-infoImg"
                  height="500"
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
                  <h6 class="card-header">4 Novembre 2020</h6>

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
              <div class="card mb-3 mt-4">Rien a affcher</div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card ml-2 mr-4 mb-3"
              :key="annonce.id"
              v-for="annonce in annonces">
            <div
              class="row no-gutters"
            >
              <div class="col-md-3">
                <img
                  :src="'uploads/' + annonce.image"
                  alt=""
                  class="card-img img-fluid pimg mt-4 ml-1"
                  height="500"
                  width="100"
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <inertia-link
                    :href="'/Annonce/' + annonce.id"
                    class="text-dark"
                  >
                    <small class="card-title">{{ annonce.titre }}</small>
                  </inertia-link>
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
</template>

<script>
export default {
  name: "showAll",
  props: [
    "feusseuls",
    "etudiant",
    "association",
    "entreprise",
    "user",
    "annonces",
  ],
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
