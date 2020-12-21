<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 m-auto">
          <div class="card shadow-sm mb-4" style="height: 90px">
            <div class="ml-4">
              <img
                v-if="this.user.avatar != null"
                :src="'/uploads/avatar/' + this.user.avatar"
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
                :href="'/Entreprise/editAvatar/' + this.user.id"
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
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "showAll",
  props: ["feusseuls", "etudiant", "association", "entreprise", "user"],
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
