<template>
  <div>
    <FlashMessage :position="'right top'"></FlashMessage>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-4">
          <div
            v-if="this.etudiant[0] != undefined"
            class="mt-4 card raduis-card mb-2"
          >
            <div
              class="card-body bg-danger"
              style="height: 100px; background-color: #ff0000"
            ></div>
            <div class="card-body m-auto">
              <img
                v-if="this.user.avatar != null"
                :src="'uploads/avatar/' + this.user.avatar"
                class="rounded-circle shadow-sm"
                alt="image"
                width="150"
                height="150"
                style="margin-top: -90px"
              />
              <img
                v-else
                :src="'uploads/avatar/avatar.png'"
                class="rounded-circle shadow-sm"
                alt="image"
                width="150"
                height="150"
                style="margin-top: -90px"
              />
            </div>
            <div class="card-body" style="height: 100px">
              <h2 class="text-center card-text">
                <strong
                  >{{ this.etudiant[0].nom }}
                  {{ this.etudiant[0].prenom }}</strong
                >
              </h2>
            </div>
            -
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-center">
                <h5
                  class="card-title"
                  v-if="this.etudiant[0].description != null"
                >
                  {{ this.etudiant[0].description }}
                </h5>
                <h5 class="card-title">Pas encore de descritpion</h5>
              </li>
            </ul>
            <div class="card-body text-center">
              <inertia-link
                class="btn"
                style="background-color: #3563a9; color: #fff"
                :href="'/home'"
                >Voir Profile</inertia-link
              >
            </div>
          </div>

          <div class="card mr-2 ml-2 mb-3 mt-4 shadow-sm">
            <div class="card-body mt-4">
              <h5 class="card-title"></h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>
              <form @submit.prevent="handleSearch">
                <div class="form-group">
                  <label for="search"></label>
                  <input
                    class="form-control"
                    id="search"
                    name="search"
                    type="text"
                    placeholder="chercher"
                    v-model="search.search"
                  />
                </div>
                <button
                  id="buttonSearch"
                  class="btn btn-round btn-danger col-md-5 offset-4"
                  type="submit"
                >
                  chercher
                </button>
              </form>
              <div class="text-center"></div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <!-- Button trigger modal -->
          <button
            type="button"
            class="mt-4 btn btn-danger"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            Feusseul
          </button>

          <!-- Modal -->
          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    Poster Feusseul
                  </h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 mt-5">
                    <form @submit.prevent="handleSubmit">
                      <div class="form-group">
                        <label for="titre">titre</label>
                        <input
                          class="form-control"
                          id="titre"
                          name="titre"
                          type="text"
                          v-model="form.titre"
                        />
                      </div>
                      <div class="form-group">
                        <file-input
                          id="Image/Video"
                          label="Image/Video"
                          v-model="form.file"
                        />
                      </div>
                      <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea
                          class="form-control"
                          id="contenu"
                          name="contenu"
                          rows="3"
                          v-model="form.contenu"
                        ></textarea>
                      </div>
                      <button
                        class="btn btn-round btn-outline-success col-md-5 offset-4"
                        type="submit"
                      >
                        Creer
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row" v-if="this.feusseuls[0] != null">
            <div class="col-md-12">
              <div
                class="card mb-3 mt-4"
                v-for="feusseul in feusseuls"
                :key="feusseul.id"
              >
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
                  <p style="margin-top: -12px"></p>
                  <img
                    v-if="feusseul.user.avatar != null"
                    :src="'uploads/avatar/' + feusseul.user.avatar"
                    alt=""
                    class="rounded-circle img-thumbnail"
                    height="40"
                    width="40"
                  />
                  <img
                    v-else
                    :src="'uploads/avatar/avatar.png'"
                    alt=""
                    class="rounded-circle img-thumbnail"
                    height="40"
                    width="40"
                  />
                  <small class="text-muted ml-1"
                    >{{ feusseul.user.name }} || {{ feusseul.titre }}</small
                  >
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
                  <small class="card-header">{{
                    feusseul.created_at | timeformat
                  }}</small>

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

        <div class="col-md-3 mt-5">
          <div
            class="card ml-2 mr-4 mb-3"
            :key="annonce.id"
            v-for="annonce in annonces"
          >
            <div class="row no-gutters">
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
import FileInput from "../../Shared/FileInput";
export default {
  name: "showAll",
  components: {
    FileInput,
  },
  props: [
    "feusseuls",
    "etudiant",
    "association",
    "entreprise",
    "user",
    "annonces",
  ],
  data() {
    return {
      form: {
        titre: null,
        contenu: null,
        file: null,
      },
      search: {
        search: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const data = new FormData();
      data.append("titre", this.form.titre);
      data.append("contenu", this.form.contenu);
      data.append("file", this.form.file);

      this.$inertia.post("/Feusseul/Store", data, {
        onSuccess: () => {
          this.flashMessage.info({
            message: "Votre Feusseul a ete poste avec success!",
            time: 5000,
          });
        },
      });
    },
    handleSearch() {
      const searching = new FormData();
      searching.append("search", this.search.search);

      if (this.search.search != null) {
        this.$inertia.post("/Feusseul/Search", searching, {
          onSuccess: () => {},
        });
      }
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
