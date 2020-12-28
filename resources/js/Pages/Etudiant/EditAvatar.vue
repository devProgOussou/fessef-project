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
          <form @submit.prevent="handleSubmit">
            <div class="form-group">
              <div class="col-md-6">
                <file-input
                  id="form.avatar"
                  label="avatar"
                  v-model="form.avatar"
                />
              </div>
            </div>
            <button
              class="btn btn-round btn-outline-primary col-md-5 offset-4"
              type="submit"
            >
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FileInput from "../../Shared/FileInput";
export default {
  name: "EditAvatar",
  props: ["etudiant", "user"],
  components: {
    FileInput,
  },
  data() {
    return {
      form: {
        avatar: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const data = new FormData();
      data.append("avatar", this.form.avatar);

      this.$inertia.post("/Etudiant/UpdateAvatar/" + this.user[0].id, data, {
        onSuccess: () => {
          this.flashMessage.info({
            message: "Votre photo profil a ete modifier avec success!",
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
