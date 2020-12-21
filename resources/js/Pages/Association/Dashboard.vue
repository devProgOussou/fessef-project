<template>
  <div>
    <div class="container">
      <div class="row">
        <!-- debut du section à 6 col -->
        <!-- la class qui contient bgurl dans le css de profile.css "main" -->
        <div class="col-md-8 mt-2">
          <div class="card mb-3">
            <div id="container-img">
              <img
                :src="'images/fessef.jpg'"
                class="card-img-top img-fluid"
                alt=""
              />
            </div>
            <p class="text-center">
              <img
                :src="'uploads/avatar/'+this.user[0].avatar"
                alt="image"
                width="100"
                height="100"
                class="shadow-sm img-rounded"
              />
            </p>
            <div class="card-body body-card">
              <h5 class="card-title">
                {{ this.association[0].NomAssociation }}
              </h5>
              <h6 class="card-subtitle mb-2 text-muted">
                {{ this.user[0].email }}
              </h6>
            </div>

            <div class="card-footer text-muted">
              <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link text-primary active"
                    id="pills-home-tab"
                    data-toggle="pill"
                    :href="'#pills-home'"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true"
                  >
                    <svg
                      width="2em"
                      height="2em"
                      viewBox="0 0 16 16"
                      class="bi bi-binoculars"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"
                      />
                    </svg>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link text-primary"
                    id="pills-contact-tab"
                    data-toggle="pill"
                    :href="'#pills-contact'"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false"
                  >
                    <svg
                      width="2em"
                      height="2em"
                      viewBox="0 0 16 16"
                      class="bi bi-book"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
                      />
                    </svg>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link text-primary"
                    id="pills-profile-tab"
                    data-toggle="pill"
                    :href="'#pills-profile'"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false"
                  >
                    <svg
                      width="2em"
                      height="2em"
                      viewBox="0 0 16 16"
                      class="bi bi-bookmark-check"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"
                      />
                      <path
                        fill-rule="evenodd"
                        d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"
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
              class="tab-pane fade show active"
              id="pills-home"
              role="tabpanel"
              aria-labelledby="pills-home-tab"
            >
              <div class="card mb-3 mt-4" id="">
                <div class="card-header" style="height: 55px; padding: 5px">
                  <!--  <img class="rounded-circle border border-primary d-inline"
                                        :src="'asset/img/fessef2.jpg' " alt="user" width="40px" height="40px">

                                    <img class="rounded-circle border border-primary d-inline"
                                        :src="'asset/img/fessef4.jpg'" alt="user" width="40px" height="40px"> -->

                  <div
                    class="text-muted font-weight-bold dropdown d-inline ml-2 text-center"
                  >
                    Profils
                  </div>

                  <a
                    :href="''"
                    class="float-right mr-2"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="fas fa-ellipsis-h mt-3 text-secondary"></i
                  ></a>
                  <!-- debut du list dropdown -->
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item text-danger delete" :href="''" id=""
                      >Delete</a
                    >
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -20px">
                    <small class="text-muted ml-5"> </small>
                  </p>
                </div>

                <div class="card-body">
                  <img
                    :src="'images/fessef.jpg'"
                    class="card-img-top"
                    alt="..."
                    width="1000"
                    height="300"
                  />
                  <h5>Titre : Ingenieur IA</h5>
                  <p>
                    <a :href="''" class="text-dark">
                      Nombre de d'interet : 1
                    </a>
                  </p>
                  <img
                    class="rounded-circle border border-primary d-inline"
                    :src="'images/fessef.jpg'"
                    alt="user"
                    width="40px"
                    height="40px"
                  /><br />
                  <button class="btn" style="background: #3563a9; color: white">
                    <span class="float-left d-inline ml-2">{{
                      this.association[0].NomAssociation
                    }}</span>
                  </button>
                  <button class="btn" style="background: #3563a9; color: white">
                    <i class="fa fa-book"></i>
                  </button>
                </div>
                <!-- <div class="card-footer text-muted text-center"> -->

                <!--    <p class="float-right d-inline mr-2">0</p> -->
                <!-- </div> -->
              </div>
            </div>
            <!--Debut  table 1 -->
            <div
              class="tab-pane fade show active"
              id="pills-home"
              role="tabpanel"
              aria-labelledby="pills-home-tab"
            >
              <div class="card mb-3 mt-4" id="">
                <div class="card-header" style="height: 55px; padding: 5px">
                  <img
                    class="rounded-circle border border-primary d-inline"
                    :src="'images/fessef.jpg '"
                    alt="user"
                    width="40px"
                    height="40px"
                  />

                  <div
                    class="text-muted font-weight-bold dropdown d-inline ml-2"
                  ></div>

                  <a
                    :href="''"
                    class="float-right mr-2"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="fas fa-ellipsis-h mt-3 text-secondary"></i
                  ></a>
                  <!-- debut du list dropdown -->
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item text-danger delete" href="''" id=""
                      >Delete</a
                    >
                  </div>

                  <!-- fin du list -->
                  <p style="margin-top: -20px">
                    <small class="text-muted ml-5"> </small>
                  </p>
                </div>

                <div class="card-body">
                  <img
                    :src="'images/fessef.jpg'"
                    class="card-img-top"
                    alt="..."
                    width="1000"
                    height="500"
                  />
                  <h5 class="card-title float-left">Ingenieur IA</h5>
                  <p class="card-text"></p>
                </div>
                <div class="card-footer text-muted text-center">
                  <p class="float-left d-inline ml-2">3 Novembre 2020</p>
                  <p class="text-center d-inline ml-2"></p>
                  <a :href="''" class="text-primary"> Voir plus... </a>

                  <p class="float-right d-inline mr-2">0</p>
                </div>
              </div>
            </div>
            <!-- Fin table 1 -->

            <!-- Debut table 2 -->
            <div
              class="tab-pane fade"
              id="pills-contact"
              role="tabpanel"
              aria-labelledby="pills-contact-tab"
            >
              <div class="card my-2">
                <div class="card-body text-center">
                  <h3>Mes Annonces</h3>
                </div>
              </div>

              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img
                      :src="'images/fessef.jpg'"
                      class="card-img"
                      alt="annonce-job"
                      style="width: 100%; height: 100%"
                    />
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <a :href="''" class="text-primary">
                        <h5 class="card-title text-dark">Developpeur Web</h5>
                      </a>
                      <p class="card-text">
                        <a :href="''" class="text-dark">...</a>
                      </p>
                      <p class="card-text">
                        <small class="text-muted">Depuis </small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin table 2 -->

            <!-- Debut table 3 -->
            <div
              class="tab-pane fade"
              id="pills-profile"
              role="tabpanel"
              aria-labelledby="pills-profile-tab"
            >
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">Profils</h3>
                </div>
              </div>

              <div class="card m-2">
                <img
                  :src="'images/fessef.jpg'"
                  class="card-img img-fluid pimg"
                  alt="annonce-job"
                  style="width: 100%; height: 150px"
                />

                <div class="card-body">
                  <h5>Titre : Ingenieur IA</h5>
                  <p>
                    <a :href="''" class="text-dark">
                      Nombre de d'interet : 1
                    </a>
                  </p>

                  <!-- images des personnes qui sont interresés -->
                  <div class="row">
                    <div class="col-md-2 ml-2 text-center">
                      <img
                        :src="'uploads/avatar/avatar.png'"
                        class="card-img img-fluid shadow-sm"
                        alt="annonce-job"
                        style="
                          width: 50px;
                          height: 50px;
                          border-radius: 50%;
                          border: 2px solid #3563a9;
                          margin-bottom: 3px;
                        "
                      />
                      <p class="btn-group">
                        <a
                          class="btn btn-sm diall mr-1"
                          id=""
                          data-toggle="modal"
                          data-target="#exampleModal"
                          style="background-color: #3563a9; color: #fff"
                        >
                        </a>

                        <!-- Deuxieme button -->
                        <a
                          type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#exampleModaldesc"
                          style="
                            background-color: #3563a9;
                            color: #fff;
                            border: none;
                          "
                        >
                          <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                          <i class="fa fa-book" aria-hidden="true"></i>
                        </a>
                        <!-- fin du deuxieme button -->
                      </p>
                    </div>

                    <!-- modal pour chater-->
                    <div
                      class="modal fade"
                      id="exampleModal"
                      tabindex="-1"
                      aria-labelledby="exampleModalLabel"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                              Message
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
                            <input type="hidden" name="receiver_id" value="" />
                            <div class="form-group">
                              <textarea
                                class="form-control form-control"
                                name="message"
                                id="textarea"
                                cols="30"
                                rows="3"
                                placeholder="Message...."
                              ></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-dismiss="modal"
                            >
                              Close
                            </button>
                            <button type="submit" class="btn btn-success">
                              Envoyez
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- fin du modal chat -->

                    <!-- Debut modal desc -->
                    <div
                      class="modal fade"
                      id="exampleModaldesc"
                      tabindex="-1"
                      aria-labelledby="exampleModalLabel"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                              @<strong> </strong>
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
                            <div class="alert alert-danger" role="alert">
                              <h4 class="alert-heading">Desolé !!</h4>
                              <p><strong></strong> ne s'est pas décrit...</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a
                              class="btn btn-warning mr-2"
                              data-toggle="modal"
                              data-target="asset/img/LM/listeexperiencesetudiant1.docx"
                              >Lettre Motivation</a
                            >
                            <a
                              class="btn btn-warning margin-d"
                              data-toggle="modal"
                              data-target="asset/img/CV/evaluationdegredemaitrise1.docx"
                            >
                              Cv
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- fin modal desc -->
                  </div>
                  <!-- Fin du  -->
                </div>
              </div>
            </div>
            <!-- Fin table 3 -->
          </div>
        </div>
        <!-- Fin du section à 6 col  -->

        <!-- Debut du section à 3 col  -->
        <div class="col-md-4">
          <!-- Debut Du Formulaire De Recherche -->
          <form class="form-inline my-3">
            <div class="form-row">
              <div class="form-group col-md-8">
                <input
                  type="search"
                  name="search"
                  class="form-control"
                  id=""
                  placeholder="Recherche Profiles"
                />
              </div>
              <div class="form-group col-md-4">
                <button
                  type="submit"
                  class="btn"
                  style="background-color: #3563a9; color: #fff"
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

            <ul class="list-group list-group-flush text-left">
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

            <div class="card-body">Veillez decrire votre association</div>

            <div class="card-footer text-muted text-center">
              <inertia-link
                :href="'/association/edit/'+this.association[0].user_id"
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
                <inertia-link :href="'/Annonce/Create'" class="text-dark">
                  Ajoutez une annonce
                </inertia-link>
              </li>
              <li class="list-group-item">
                <inertia-link :href="'/xamxam/create'" class="text-dark">
                  Xamlel
                </inertia-link>
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
export default {
  name: "Dashboard",
  components: {},
  props: ["association", "user", "xamxams", "annonces", "messages"],
};
</script>

<style scoped>
</style>
