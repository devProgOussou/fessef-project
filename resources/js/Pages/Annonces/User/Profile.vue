<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="card ml-5">
            <img
              v-if="this.user[0].user.avatar != null"
              :src="'/uploads/avatar/' + this.user[0].user.avatar"
              alt=""
            />
            <img v-else src="/uploads/avatar/avatar.png" alt="" />
            <h1>{{ this.user[0].nom }} {{ this.user[0].prenom }}</h1>
            <strong>Adresse</strong>
            <p>{{ this.user[0].adresse }}</p>
            <strong>Telephone</strong>
            <p>{{ this.user[0].telephone }}</p>
            <strong>Competences</strong>
            <p>{{ this.user[0].competences }}</p>
            <strong>Description</strong>
            <p>{{ this.user[0].description }}</p>
            <div style="margin: 24px 0">
              <button
                class="btn btn-info btn-round mb-4"
                data-target="#modalLoginForm"
                data-toggle="modal"
              >
                Contactez moi
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <p v-if="this.files[0] == undefined" class="m-5 alert alert-danger">
            Oops aucun CV ou LM disponible
          </p>
          <div v-else>
              <h2 class="text-center">Curriculum vitae</h2>
            <embed
              :src="'/uploads/files/CV/' + this.files[0].CV"
              width="500"
              height="500"
              type="application/pdf"
            />
            <h2 class="text-center">Lettre de motivation</h2>
            <embed
              :src="'/uploads/files/LM/' + this.files[0].LM"
              width="500"
              height="500"
              type="application/pdf"
            />
          </div>
        </div>
        <form @submit.prevent="handleSubmit">
          <div
            aria-hidden="true"
            aria-labelledby="myModalLabel"
            class="modal fade"
            id="modalLoginForm"
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
