<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 m-auto">
          <div class="card shadow-sm mb-4" style="height: 90px">
            <div class="ml-4">
              <img
                :src="'asset/img/fessef1.jpg'"
                class="img-thumbnail shadow-sm text-left ml-4 w-100 h-50"
                alt="image"
                style="margin-top: 75px; border: solid 5px #fff"
              />
              <inertia-link
                :href="'/Entreprise/editAvatar/' + this.entreprise[0].user_id"
                class="btn-sm mt-4"
                style="
                  margin-right: 50px;
                  float: right;
                  background-color: #3563a9;
                  color: white;
                "
                >Mise à jour</inertia-link
              >
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <!-- Debut Section 1 -->
          <div class="col-md-4">
            <div class="card mr-2 ml-4 mb-3 mt-4 shadow-sm">
              <h6 class="card-header" style="color: blue; text-align: center">
                PROFIL INFOS
              </h6>
              <div class="card-body mt-4 text-center">
                <!-- <h5 class="card-title"></h5> -->
                <h6 class="card-subtitle mb-2 text-muted"></h6>

                <p class="card-text">
                  <strong>Nom: </strong>{{ this.entreprise[0].NomEntreprise }}
                </p>
                <p class="card-text">
                  <strong>Domaine: </strong
                  >{{ this.entreprise[0].domaineActivites }}
                </p>
                <p class="card-text">
                  <strong>Lien: </strong>{{ this.entreprise[0].lien }}
                </p>
                <p class="card-text">
                  <strong>Adresse: </strong>{{ this.entreprise[0].adresse }}
                </p>
                <p class="card-text">
                  <strong>Téléphone: </strong>{{ this.entreprise[0].telephone }}
                </p>
                <!-- <p class="card-text"><strong>Bio:</strong></p> -->
              </div>
            </div>
          </div>
          <!-- Fin Section 1 -->

          <!-- Debut Section 2 -->
          <div class="col-md-6 mt-4">
            <form @submit.prevent="handleSubmit" class="mb-5">
              <!--  <div class="form-group">
                            <file-input label="avatar *" v-model="form.avatar"/>
                            <img :src="get_avatar" alt="" height="100px" width="100px">
                        </div> -->
              <div class="form-group">
                <input
                  :placeholder="this.entreprise[0].NomEntreprise"
                  class="form-control"
                  required
                  type="text"
                  v-model="form.NomEntreprise"
                />
              </div>
              <div class="form-group">
                <input
                  :placeholder="this.entreprise[0].adresse"
                  class="form-control"
                  required
                  type="text"
                  v-model="form.adresse"
                />
              </div>
              <div class="form-group">
                <input
                  :placeholder="this.entreprise[0].telephone"
                  class="form-control"
                  required
                  type="text"
                  v-model="form.telephone"
                />
              </div>
              <div class="form-group">
                <input
                  :placeholder="this.entreprise[0].lien"
                  class="form-control"
                  required
                  type="text"
                  v-model="form.lien"
                />
              </div>
              <div class="form-group">
                <input
                  :placeholder="this.entreprise[0].domaineActivites"
                  class="form-control"
                  required
                  type="text"
                  v-model="form.domaineActivites"
                />
              </div>
              <div class="form-group">
                <textarea
                  class="form-control col-md-12"
                  placeholder=""
                  required
                  rows="5"
                  v-model="form.description"
                >
                </textarea>
              </div>
              <input
                type="submit"
                value="Enregistrer"
                class="btn btn-block btn-primary"
              />
              <br />
            </form>
          </div>
          <!-- Fin Section 2 -->
          <!-- Debut Section 3 -->
          <div class="col-md-2"></div>
          <!-- Fin Section 3 -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Logout from "../../Shared/Logout";
import FileInput from "../../Shared/FileInput";
export default {
  name: "Edit",
  components: {
    Logout,
    FileInput,
  },
  props: {
    entreprise: Array,
    user: Array,
  },
  data() {
    return {
      form: {
        NomEntreprise: this.entreprise[0].NomEntreprise,
        adresse: this.entreprise[0].adresse,
        telephone: this.entreprise[0].telephone,
        lien: this.entreprise[0].lien,
        domaineActivites: this.entreprise[0].domaineActivites,
        description: this.entreprise[0].description,
        avatar: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const data = new FormData();
      data.append("NomEntreprise", this.form.NomEntreprise);
      data.append("adresse", this.form.adresse);
      data.append("telephone", this.form.telephone);
      data.append("lien", this.form.lien);
      data.append("domaineActivites", this.form.domaineActivites);
      data.append("description", this.form.description);
      data.append("avatar", this.form.avatar || "");
      // data.append("email", this.form.email);
      this.$inertia.post(
        "/entreprise/update/" + this.entreprise[0].user_id,
        data,
        {
          onSuccess: () => {
            this.flashMessage.info({
              message: "Votre profil a ete modifier avec success!",
              time: 5000,
            });
          },
        }
      );
    },
    get_avatar() {
      let photo =
        this.form.avatar.length > 100
          ? this.form.avatar
          : "uploads/" + this.form.avatar;
      return photo;
    },
  },
};
</script>

<style scoped>
</style>
