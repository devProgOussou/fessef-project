<template>
  <div>
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
            <inertia-link :href="'/uploadingFile'">
              Ajouter Cv et LM
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
        <div class="col-md-8" v-if="this.files[0] != null">
          <embed
            :src="'/uploads/files/CV/' + this.files[0].CV"
            width="500"
            height="500"
            type="application/pdf"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  props: ["etudiant", "user", "files"],
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
