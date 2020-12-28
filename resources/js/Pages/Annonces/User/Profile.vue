<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-4">
          <div class="card mr-2 ml-4 mb-3 mt-4 shadow-sm">
            <h6 class="card-header" style="color: blue">PROFIL INFOS</h6>
            <div class="card-body mt-1">
              <img
                v-if="this.user[0].user.avatar != null"
                :src="'/uploads/avatar/' + this.user[0].user.avatar"
                alt=""
                height="190"
                width="190"
              />
              <p class="card-text">
                Prénom et nom :
                <strong
                  >{{ this.user[0].nom }} {{ this.user[0].prenom }}</strong
                >
              </p>
              <p class="card-text">
                <strong>E-mail: </strong>{{ this.user[0].user.email }}
              </p>
              <p class="card-text">
                <strong>Phone: </strong>{{ this.user[0].telephone }}
              </p>
              <p class="card-text">
                <strong>Date de naissance: </strong
                >{{ this.user[0].dateDeNaissance }}
              </p>
              <p class="card-text">
                <strong>Genre: </strong>{{ this.user[0].genre }}
              </p>
              <p class="card-text">
                <strong>Bio: </strong>{{ this.user[0].description }}
              </p>
            </div>
            <h6 class="card-header" style="color: blue">COMPETENCES</h6>
            <p class="text-center">{{ this.user[0].competences }}</p>
            <button
              class="btn btn-round mb-5"
              style="background: #3563a9; color: white"
              data-toggle="modal"
              data-target="#exampleModal"
            >
              <i class="fa fa-envelope"></i> Contacter moi
            </button>
          </div>
        </div>

        <div class="col-md-8 mt-5">
          <ul class="nav nav-tabs bg-white" id="pills-tab" role="tablist">
            <li class="offset-4 nav-item" role="presentation">
              <a
                :href="'#pills-cv'"
                aria-controls="pills-cv"
                aria-selected="false"
                class="nav-link text-primary"
                data-toggle="pill"
                id="pills-cv-tab"
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
                :href="'#pills-lm'"
                aria-controls="pills-lm"
                aria-selected="false"
                class="nav-link text-primary"
                data-toggle="pill"
                id="pills-lm-tab"
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
          <div class="tab-content" id="pills-tabContent">
            <!--Debut  affichage cv -->
            <div
              aria-labelledby="pills-cv-tab"
              class="tab-pane fade show active"
              id="pills-cv"
              role="tabpanel"
            >
              <span class="alert alert-danger" v-if="this.user[0].CV == null">
                Oops aucun cv
              </span>
              <embed
                v-else
                :src="'/uploads/files/CV/' + this.user[0].CV"
                width="729"
                height="500"
                type="application/pdf"
              />
            </div>
            <!--Debut  affichage lm -->
            <div
              aria-labelledby="pills-lm-tab"
              class="tab-pane fade show active"
              id="pills-lm"
              role="tabpanel"
            >
              <span class="alert alert-danger" v-if="this.user[0].LM == null">
                Oops aucune lm
              </span>
              <embed
                v-else
                :src="'/uploads/files/LM/' + this.user[0].LM"
                width="729"
                height="500"
                type="application/pdf"
              />
            </div>
          </div>
        </div>

        <form @submit.prevent="handleSubmit">
          <div
            aria-hidden="true"
            aria-labelledby="myModalLabel"
            class="modal fade"
            id="exampleModal"
            role="dialog"
            tabindex="-1"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">
                    Laissez un message
                  </h4>
                  <button
                    aria-label="Close"
                    class="close"
                    data-dismiss="modal"
                    type="button"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-3">
                  <div class="md-form mb-4">
                    <i class="fas fa-message"></i>
                    <textarea
                      class="form-control col-md-12"
                      required
                      rows="5"
                      v-model="form.messages"
                    ></textarea>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-default">Envoyer</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  props: ["user", "files"],
  data() {
    return {
      form: {
        messages: null,
      },
      receiver_id: this.receiver_id,
    };
  },
  mounted: function () {
    this.receiver_id = this.user[0].user_id;
  },
  methods: {
    handleSubmit() {
      const data = new FormData();

      data.append("messages", this.form.messages);
      data.append("receiver_id", this.receiver_id);

      this.$inertia.post("/Message/SendUser", data, {
        onSuccess: () => {
          this.flashMessage.success({
            message: "Votre Message a ete envoyer avec success!",
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
  max-width: 500px;
  margin-left: 70px;
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
