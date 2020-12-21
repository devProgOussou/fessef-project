<template>
  <div>
    <FlashMessage :position="'right bottom'"></FlashMessage>

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

        <div class="col-md-8 mt-5">
          <form @submit.prevent="handleSubmit" class="mb-5">
            <div class="form-group">
              <file-input label="curriculum vitae" v-model="form.cv" />
            </div>
            <div class="form-group">
              <file-input label="Lettre de motivation" v-model="form.lm" />
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
import FileInput from "../../../Shared/FileInput";

export default {
  name: "Dashboard",
  components: {
    FileInput,
  },
  props: ["etudiant", "user"],

  data() {
    return {
      form: {
        cv: null,
        lm: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const data = new FormData();

      data.append("cv", this.form.cv);
      data.append("lm", this.form.lm);

      this.$inertia.post("/uploadingFile", data, {
        onSuccess: () => {
          this.flashMessage.info({
            message: "Vos fichiers ont ete ajouter avec success!",
            time: 5000,
          });
        },
      });
    },
  },
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
