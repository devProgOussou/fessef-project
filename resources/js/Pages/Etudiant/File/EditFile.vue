<template>
  <div>
    <FlashMessage :position="'right bottom'"></FlashMessage>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img
              v-if="this.user[0].avatar != null"
              :src="'/uploads/avatar/' + this.user[0].avatar"
              alt=""
              style="width: 100%"
            />
            <img
              v-else
              src="/uploads/avatar/avatar.png"
              alt=""
              style="width: 100%"
            />
            <inertia-link
              :href="'/Etudiant/editAvatar/' + this.etudiant[0].user_id"
            >
              <button class="btn btn-sm btn-dark">modifier avatar</button>
            </inertia-link>
            <h1>{{ this.etudiant[0].nom }} {{ this.etudiant[0].prenom }}</h1>
            <strong>Adresse</strong>
            <p>{{ this.etudiant[0].adresse }}</p>
            <strong>Competences</strong>
            <p>{{ this.etudiant[0].competences }}</p>
            <strong>Description</strong>
            <!--                        <p>{{this.competences[0].description}}</p>-->
            <div style="margin: 24px 0"></div>
            <p>
              <inertia-link
                :href="'/etudiant/edit/' + this.etudiant[0].user_id"
              >
                Modifier profil
              </inertia-link>
            </p>
          </div>
        </div>
        <div class="col-md-8">
            <h1 class="text-center">Modifier le CV et le LM</h1>
            <p class="display-5 text-center">Vous avez un CV et une lettre de motivation</p>
          <form @submit.prevent="handleSubmit" class="mb-5">
            <div class="form-group">
              <file-input label="nouveau curriculum vitae" v-model="form.cv" />
            </div>
            <div class="form-group">
              <file-input label="nouvelle lettre de motivation" v-model="form.lm" />
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

      this.$inertia.post('/updateFile/'+this.etudiant[0].id, data, {
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
h1 {
  margin-left: 20px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin-left: 20px;
  text-align: center;
  font-family: arial, cursive;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover,
a:hover {
  opacity: 0.7;
}
</style>
