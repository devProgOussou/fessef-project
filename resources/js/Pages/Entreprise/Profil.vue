<template>
  <div>
    <FlashMessage :position="'right bottom'"></FlashMessage>
    <div class="container">
      <div class="row">
        <!-- debut du section à 6 col -->
        <!-- la class qui contient bgurl dans le css de profile.css "main" -->
        <div class="col-md-8 mt-2">
          <div class="card mb-3">
            <div id="container-img">
              <img
                :src="'/images/fessef.jpg'"
                alt=""
                class="card-img-top img-fluid"
              />
            </div>
            <p class="text-center">
              <img
                :src="'/uploads/avatar/' + this.user[0].avatar"
                alt="image"
                class="shadow-sm img-rounded"
                height="100"
                v-if="this.user[0].avatar != null"
                width="100"
              />
              <img
                alt="image"
                class="shadow-sm img-rounded"
                height="100"
                src="/uploads/avatar/avatar.png"
                v-else
                width="100"
              />
            </p>
            <div class="card-body body-card">
              <h5 class="card-title">
                {{ this.entreprise[0].NomEntreprise }}
              </h5>
              <h6 class="card-subtitle mb-2 text-muted">
                {{ this.user[0].email }}
              </h6>
            </div>

            <div class="card-footer text-muted">
              <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a
                    :href="'#pills-home'"
                    aria-controls="pills-home"
                    aria-selected="true"
                    class="nav-link text-primary active"
                    data-toggle="pill"
                    id="pills-home-tab"
                    role="tab"
                  >
                    <svg
                      class="bi bi-binoculars"
                      fill="currentColor"
                      height="2em"
                      viewBox="0 0 16 16"
                      width="2em"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"
                        fill-rule="evenodd"
                      />
                    </svg>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a
                    :href="'#pills-contact'"
                    aria-controls="pills-contact"
                    aria-selected="false"
                    class="nav-link text-primary"
                    data-toggle="pill"
                    id="pills-contact-tab"
                    role="tab"
                  >
                    <svg
                      class="bi bi-book"
                      fill="currentColor"
                      height="2em"
                      viewBox="0 0 16 16"
                      width="2em"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
                        fill-rule="evenodd"
                      />
                    </svg>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a
                    :href="'#pills-profile'"
                    aria-controls="pills-profile"
                    aria-selected="false"
                    class="nav-link text-primary"
                    data-toggle="pill"
                    id="pills-profile-tab"
                    role="tab"
                  >
                    <svg
                      class="bi bi-bookmark-check"
                      fill="currentColor"
                      height="2em"
                      viewBox="0 0 16 16"
                      width="2em"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"
                        fill-rule="evenodd"
                      />
                      <path
                        d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"
                        fill-rule="evenodd"
                      />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- debut du tab content -->
          <div class="tab-content" id="pills-tabContent">
            <!--Debut  table 1 -->
            <div
              aria-labelledby="pills-home-tab"
              class="tab-pane fade show active"
              id="pills-home"
              role="tabpanel"
            >
              <div
                :key="annonce.id"
                class="card mb-3 mt-4"
                v-for="annonce in annonceAll"
              >
                <div class="card-header" style="height: 55px; padding: 5px">
                  <div
                    class="text-muted font-weight-bold dropdown d-inline ml-2 text-center"
                  >
                    <img
                      :src="'uploads/avatar/' + annonce.user.avatar"
                      alt=""
                      class="rounded-circle img-thumbnail"
                      height="40"
                      v-if="annonce.user.avatar != null"
                      width="40"
                    />
                    <img
                      :src="'/uploads/avatar/avatar.png'"
                      alt=""
                      class="rounded-circle img-thumbnail"
                      height="40"
                      v-else
                      width="40"
                    />
                    <small>{{ annonce.user.name }}</small>
                  </div>

                  <a
                    :href="''"
                    aria-expanded="false"
                    aria-haspopup="true"
                    class="float-right mr-2"
                    data-toggle="dropdown"
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
                      :href="'/Annonce/Delete/' + annonce.id"
                      class="dropdown-item text-danger delete"
                      >Delete
                    </inertia-link>
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -20px">
                    <small class="text-muted ml-5"> </small>
                  </p>
                </div>

                <div class="card-body">
                  <img
                    :src="'/uploads/' + annonce.image"
                    alt="..."
                    class="card-img-top"
                    height="300"
                    width="1000"
                  />
                  <h5>Titre : {{ annonce.titre }}</h5>
                  <p>Description : {{ annonce.description }}</p>
                  <p>Contenu : {{ annonce.contenu }}</p>
                </div>
              </div>
            </div>

            <!-- Fin table 1 -->

            <!--Debut Table 2-->
            <div
              aria-labelledby="pills-contact-tab"
              class="tab-pane fade show active"
              id="pills-contact"
              role="tabpanel"
            >
              <div
                :key="annonce.id"
                class="card mb-3 mt-4"
                v-for="annonce in annonces"
              >
                <div class="card-header" style="height: 55px; padding: 5px">
                  <div
                    class="text-muted font-weight-bold dropdown d-inline ml-2 text-center"
                  >
                    <img
                      :src="'/uploads/avatar/' + annonce.user.avatar"
                      alt=""
                      class="rounded-circle img-thumbnail"
                      height="40"
                      v-if="annonce.user.avatar != null"
                      width="40"
                    />
                    <img
                      :src="'/uploads/avatar/avatar.png'"
                      alt=""
                      class="rounded-circle img-thumbnail"
                      height="40"
                      v-else
                      width="40"
                    />
                    <small>{{ annonce.user.name }}</small>
                  </div>

                  <a
                    :href="''"
                    aria-expanded="false"
                    aria-haspopup="true"
                    class="float-right mr-2"
                    data-toggle="dropdown"
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
                      :href="'/Annonce/Delete/' + annonce.id"
                      class="dropdown-item text-danger delete"
                      >Delete
                    </inertia-link>
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -20px">
                    <small class="text-muted ml-5"> </small>
                  </p>
                </div>

                <div class="card-body">
                  <img
                    :src="'/uploads/' + annonce.image"
                    alt="..."
                    class="card-img-top"
                    height="300"
                    width="1000"
                  />
                  <h5>Titre : {{ annonce.titre }}</h5>
                  <p>Description : {{ annonce.description }}</p>
                  <p>Contenu : {{ annonce.contenu }}</p>
                </div>
              </div>
            </div>
            <!-- Fin table 2-->

            <!--Debut table trois-->
            <div
              aria-labelledby="pills-profile-tab"
              class="tab-pane fade show active"
              id="pills-profile"
              role="tabpanel"
            >
              <div
                :key="annonce.id"
                class="card mb-3 mt-4"
                v-for="annonce in interesses"
              >
                <div class="card-header" style="height: 55px; padding: 5px">
                  <div
                    class="text-muted font-weight-bold dropdown d-inline ml-2 text-center"
                  ></div>

                  <a
                    :href="''"
                    aria-expanded="false"
                    aria-haspopup="true"
                    class="float-right mr-2"
                    data-toggle="dropdown"
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
                      :href="'/Annonce/Delete/' + annonce.id"
                      class="dropdown-item text-danger delete"
                      >Delete
                    </inertia-link>
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -20px">
                    <small class="text-muted ml-5"> </small>
                  </p>
                </div>

                <div class="card-body">
                  <img
                    :src="'/uploads/' + annonce.annonce_image"
                    alt="..."
                    class="card-img-top"
                    height="200"
                    width="1000"
                  />
                  <h5 class="text-center mt-2">
                    Titre : {{ annonce.annonce_titre }}
                  </h5>
                  <img
                    :src="'/uploads/avatar/' + annonce.avatar"
                    alt=""
                    class="rounded-circle img-thumbnail"
                    height="40"
                    v-if="annonce.avatar != null"
                    width="40"
                  />
                  <img
                    :src="'/uploads/avatar/avatar.png'"
                    alt=""
                    class="rounded-circle img-thumbnail"
                    height="40"
                    v-else
                    width="40"
                  />
                  <inertia-link
                    :href="'/User/Profile/' + annonce.user_id"
                    class="btn btn-round"
                    style="background: #3563a9; color: white"
                  >
                    <!-- <i class="fa fa-book"></i> {{ annonce.user_name }} -->
                    {{ annonce.user_name }}
                  </inertia-link>
                  <inertia-link
                    :href="'/User/Profile/' + annonce.user_id"
                    class="btn btn-round"
                    style="background: #3563a9; color: white"
                  >
                    <i class="fa fa-user"></i> Voir le profil
                  </inertia-link>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin table trois -->
        </div>
        <!-- Fin du section à 6 col  -->

        <!-- Debut du section à 3 col  -->
        <div class="col-md-4">
          <!-- Debut Du Formulaire De Recherche -->
          <form @submit.prevent="handleSearch" class="form-inline my-3">
            <div class="form-row">
              <div class="form-group col-md-8">
                <input
                  class="form-control"
                  name="search"
                  v-model="search.search"
                  placeholder="Recherche Profiles"
                  type="search"
                />
              </div>
              <div class="form-group col-md-4">
                <button
                  class="btn"
                  style="background-color: #3563a9; color: #fff"
                  type="submit"
                >
                  Recherche
                </button>
              </div>
            </div>
          </form>

          <!-- Fin Du Formulaire De Recherche -->

          <div class="card mb-1">
            <div class="card-header text-center">
              <p class="PTextHeader">Plus d'infos sur la page</p>
            </div>

            <ul
              class="list-group list-group-flush text-left"
              v-if="this.entreprise[0].telephone == null"
            >
              <li class="list-group-item">
                <b> </b>

                Veillez remplir votre numero de telephone
              </li>
              <li class="list-group-item">
                <b></b>

                Veillez remplir votre domaine d'activite
              </li>
              <li class="list-group-item">Veillez remplir Votre adresse</li>
              <li class="list-group-item">
                <b></b>
                <a :href="''" target="_blank"></a>

                Veillez remplir l'adresse de votre site web
              </li>
            </ul>
            <ul class="list-group list-group-flush text-left" v-else>
              <li class="list-group-item">
                <b> </b>

                date de creation : {{ this.entreprise[0].dateDeCreation }}
              </li>
              <li class="list-group-item">
                <b> </b>

                Telephone : {{ this.entreprise[0].telephone }}
              </li>
              <li class="list-group-item">
                <b></b>

                Domaine d'activite : {{ this.entreprise[0].domaineActivites }}
              </li>
              <li class="list-group-item">
                <b></b>
                Adresse : {{ this.entreprise[0].adresse }}
              </li>
              <li class="list-group-item">
                <b></b>
                <inertia-link :href="this.entreprise[0].lien" target="_blank">
                  {{ this.entreprise[0].lien }}
                </inertia-link>
              </li>
            </ul>

            <div class="card-body">{{ this.entreprise[0].description }}</div>

            <div class="card-footer text-muted text-center">
              <inertia-link
                :href="'/association/edit/' + this.entreprise[0].user_id"
                class="btn-sm"
                style="background-color: #3563a9; color: #fff"
              >
                Mise à jour
              </inertia-link>
            </div>
          </div>

          <!-- Debut du deuxieme card pour creer des posts -->
          <div class="card">
            <ul class="list-group list-group-flush text-center">
              <li class="list-group-item">
                <!-- /Annonce/Create -->
                <a
                  :href="''"
                  type="button"
                  class="text-dark"
                  data-toggle="modal"
                  data-target="#exampleModal"
                >
                  Ajoutez une annonce
                </a>
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
                        <h5
                          class="offset-4 modal-title"
                          style="color: #3563a9"
                          id="exampleModalLabel"
                        >
                          Creer une annonce
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
                        <div class="row">
                          <div class="col-md-10 offset-1 mt-2 mb-5">
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
                                  id="image"
                                  label="image"
                                  v-model="form.image"
                                />
                                association
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
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea
                                  class="form-control"
                                  id="description"
                                  name="description"
                                  rows="3"
                                  v-model="form.description"
                                ></textarea>
                              </div>
                              <button
                                type="submit"
                                class="btn btn-outline-primary offset-1 btn-round col-md-5"
                              >
                                Submit
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <a
                  :href="''"
                  class="text-dark"
                  data-toggle="modal"
                  data-target="#exampleModal1"
                >
                  Xamlel
                </a>
                <!-- Modal -->
                <div
                  class="modal fade"
                  id="exampleModal1"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5
                          class="offset-4 modal-title"
                          style="color: #3563a9"
                          id="exampleModalLabel"
                        >
                          Creer xamlel
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
                        <div class="col-md-10 offset-1 mt-2 mb-5">
                          <form @submit.prevent="handleSubmitXamlel">
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="TITRE"
                                v-model="xamlel.titre"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="TAGS"
                                v-model="xamlel.tags"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <file-input
                                v-model="xamlel.image"
                                label="image *"
                              />
                            </div>
                            <div class="form-group">
                              <textarea
                                class="form-control col-md-12"
                                rows="5"
                                v-model="xamlel.contenu"
                                required
                                placeholder="CONTENU"
                              ></textarea>
                            </div>
                            <button
                              type="submit"
                              class="btn btn-round btn-outline-primary col-md-5 offset-1"
                            >
                              Submit
                            </button>
                            <br />
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <!-- Fin du deuxieme card pour creer des posts -->

          <!-- Fin du section à 3 col  -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FileInput from "../../Shared/FileInput";
export default {
  name: "Dashboard",
  components: {
    FileInput,
  },
  props: [
    "entreprise",
    "user",
    "xamxams",
    "annonces",
    "annonceAll",
    "interesses",
  ],
  data() {
    return {
      form: {
        titre: null,
        description: null,
        contenu: null,
        image: null,
      },
      xamlel: {
        titre: null,
        image: null,
        tags: null,
        contenu: null,
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
      data.append("description", this.form.description);
      data.append("contenu", this.form.contenu);
      data.append("image", this.form.image);

      this.$inertia.post("/Annonce/Store", data, {
        onSuccess: () => {
          this.flashMessage.info({
            message: "Votre annonce a ete poste avec success!",
            time: 5000,
          });
        },
      });
    },
    handleSubmitXamlel() {
      const data = new FormData();
      data.append("titre", this.xamlel.titre);
      data.append("tags", this.xamlel.tags);
      data.append("image", this.xamlel.image);
      data.append("contenu", this.xamlel.contenu);

      this.$inertia.post("/xamxam", data, {
        onSuccess: () => {
          this.sending = false;
          this.flashMessage.info({
            message: "Votre xamlel a ete poste avec success!",
            time: 5000,
          });
        },
      });
    },
    handleSearch() {
      const search = new FormData();

      search.append("search", this.search.search);

      this.$inertia.post("/searchProfile", search, {
        onSuccess: () => {},
      });
    },
  },
};
</script>

<style scoped>
</style>
