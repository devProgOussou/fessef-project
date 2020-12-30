<template>
  <div>
    <div class="container">
      <div class="row">
        <!-- Card resultat -->
        <div class="col-md-12 mt-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h4
                class="card-title text-center text-dark"
                v-if="this.queryCount == 0"
              >
                0 resultat
              </h4>

              <h4
                class="card-title text-center text-dark"
                v-if="this.queryCount == 1"
              >
                {{ this.queryCount }} resultat
              </h4>

              <h4
                class="card-title text-center text-dark"
                v-else-if="this.queryCount > 1"
              >
                {{ this.queryCount }} resultats
              </h4>
            </div>
          </div>
        </div>
        <!-- Fin du barre de resultat -->

        <div class="container-fluid">
          <div class="row">
            <!-- Debut du Card de resultat -->
            <div class="col-md-2 mt-4 mb-4"></div>
            <!-- Fin du Card de resultat -->

            <!-- Debut du Section de Centrale -->
            <div class="col-md-8 mt-4 mb-4">
              <!-- debut du card resultat du recherche -->
              <div class="row">
                <div
                  class="col-md-4"
                  v-for="profil in searchingProfile"
                  :key="profil.id"
                >
                  <!-- {{this.searchingProfile}} -->
                  <div class="card raduis-card mb-2">
                    <div
                      class="card-body bg-danger"
                      style="height: 80px; background-color: #ff0000"
                    ></div>
                    <div class="card-body m-auto">
                      <img
                        v-if="profil.user.avatar != null"
                        :src="'/uploads/avatar/' + profil.user.avatar"
                        class="rounded-circle shadow-sm"
                        alt="image"
                        width="125"
                        height="125"
                        style="margin-top: -80px"
                      />
                      <img
                        v-else
                        :src="'/uploads/avatar/avatar.png'"
                        class="rounded-circle shadow-sm"
                        alt="image"
                        width="125"
                        height="125"
                        style="margin-top: -80px"
                      />
                    </div>
                    <!-- <div class="card-body" style="height : 100px;"></div> -->
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item text-center">
                        <h5 class="card-title">
                          <br />
                          <small class="text-muted"
                            ><i
                              class="fas fa-map-marker-alt text-danger"
                              aria-hidden="true"
                            ></i>
                            {{ profil.user.name }}
                          </small>
                        </h5>
                      </li>
                    </ul>
                    <div class="card-body text-center">
                      <a
                        class="btn btn-danger text-white"
                        data-toggle="modal"
                        data-target="#cvPdf"
                      >
                        CV
                      </a>
                      <a
                        class="btn btn-danger text-white"
                        data-toggle="modal"
                        data-target="#lettreM"
                      >
                        Lettre Motivation
                      </a>
                      <a
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#exampleModal"
                      >
                        <i
                          type="button"
                          class="fa fa-plus text-white"
                          aria-hidden="true"
                        ></i>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- modal CV-->
                <div
                  class="modal fade"
                  id="cvPdf"
                  tabindex="-1"
                  aria-labelledby="cvLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" v-for="profil in searchingProfile" :key="profil.id">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="cvLabel">
                          Curriculum vitæ de @{{profil.user.name}}
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
                        <iframe
                          :src="'/uploads/files/CV/' + profil.CV"
                          width="100%"
                          height="600px"
                        >
                        </iframe>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- fin modal CV-->

                <!-- modal message -->
                <div
                  class="modal fade"
                  id="exampleModal"
                  tabindex="-1"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form>
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
                              id="text"
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
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- fin modal -->

              <!-- modal LM-->
              <div
                class="modal fade"
                id="lettreM"
                tabindex="-1"
                aria-labelledby="lettreMLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog" v-for="profil in searchingProfile" :key="profil.id">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="lettreMLabel">
                        Lettre de motivation de @{{profil.user.name}}
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
                      <iframe
                        :src="'/uploads/files/LM/' + profil.LM"
                        width="100%"
                        height="600px"
                      >
                      </iframe>
                    </div>
                  </div>
                </div>
                <!-- fin modal LM-->
              </div>

              <!-- Fin du barre de recherche -->
            </div>
            <!-- Debut du Section de Centrale -->
            <div class="col-md-2 mt-4 mb-4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["queryCount", "searchingProfile"],
};
</script>

<style scoped>
</style>
