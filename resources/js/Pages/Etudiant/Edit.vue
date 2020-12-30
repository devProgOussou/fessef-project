<template>
  <div>
    <FlashMessage :position="'right bottom'"></FlashMessage>
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
            <div class="card-body mt-4">
              <h5 class="card-title"></h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>

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

        <div class="col-md-8 mt-5">
          <form @submit.prevent="handleSubmit" class="mb-5">
            <div class="form-group">
              <input
                class="form-control"
                placeholder="Nom"
                required
                type="text"
                v-model="form.nom"
              />
            </div>
            <div class="form-group">
              <input
                class="form-control"
                placeholder="Prenom"
                required
                type="text"
                v-model="form.prenom"
              />
            </div>
            <div class="form-group">
              <input
                class="form-control"
                placeholder="Adresse"
                required
                type="text"
                v-model="form.adresse"
              />
            </div>
            <div class="form-group">
              <input
                class="form-control"
                placeholder="Telephone"
                required
                type="text"
                v-model="form.telephone"
              />
            </div>
            <div class="form-group">
              <input
                class="form-control"
                placeholder="Competences"
                required
                type="text"
                v-model="form.competences"
              />
            </div>
            <div class="col-md-6">
              <file-input id="form.avatar" label="CV(pdf)" v-model="form.CV" />
            </div>
            <div class="col-md-6">
              <file-input id="form.LM" label="LM(pdf)" v-model="form.LM" />
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <input
                  autofocus
                  class="form-control"
                  id="dateDeNaissance"
                  name="dateDeNaissance"
                  required
                  type="date"
                  v-model="form.dateDeNaissance"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <select
                  class="custom-select"
                  id="genre"
                  name="genre"
                  v-model="form.genre"
                >
                  <option value="Homme">Homme</option>
                  <option value="Femme">Femme</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <textarea
                class="form-control col-md-12"
                placeholder="Description"
                required
                rows="5"
                v-model="form.description"
              >
              </textarea>
            </div>
            <button
              class="btn btn-round btn-outline-primary col-md-5 offset-4"
              type="submit"
            >
              Submit
            </button>
            <br />
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FileInput from "../../Shared/FileInput";

export default {
  name: "Edit",
  components: {
    FileInput,
  },
  props: {
    etudiant: Array,
    user: Array,
  },
  data() {
    return {
      form: {
        nom: this.etudiant[0].nom,
        prenom: this.etudiant[0].prenom,
        adresse: this.etudiant[0].adresse,
        telephone: this.etudiant[0].telephone,
        competences: this.etudiant[0].competences,
        description: this.etudiant[0].description,
        dateDeNaissance: this.etudiant[0].dateDeNaissance,
        genre: this.etudiant[0].genre,
        CV: null,
        LM: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const data = new FormData();
      data.append("nom", this.form.nom);
      data.append("prenom", this.form.prenom);
      data.append("telephone", this.form.telephone);
      data.append("adresse", this.form.adresse);
      data.append("competences", this.form.competences);
      data.append("description", this.form.description);
      data.append("CV", this.form.CV);
      data.append("LM", this.form.LM);
      data.append("dateDeNaissance", this.form.dateDeNaissance);
      data.append("genre", this.form.genre);

      this.$inertia.post("/etudiant/update/" + this.etudiant[0].user_id, data, {
        onSuccess: () => {
          this.flashMessage.info({
            message: "Votre profil a ete modifier avec success!",
            time: 5000,
          });
        },
      });
    },
  },
  get_avatar() {},
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
