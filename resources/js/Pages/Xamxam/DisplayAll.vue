<template>
  <div class="container mt-2">
    <!--modal ajout xamxam-->

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
            <h5 class="modal-title" id="exampleModalLabel">Partagez</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="handleSubmit">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="TITRE"
                  v-model="form.titre"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="TAGS"
                  v-model="form.tags"
                  required
                />
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <file-input v-model="form.image" label="Image" />
                </div>
              </div>
              <div class="form-group">
                <textarea
                  class="form-control col-md-12"
                  rows="5"
                  v-model="form.contenu"
                  required
                  placeholder="CONTENU"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary">Xamalé</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- fin modal ajout xamxam-->
    <a
      href="#"
      class="btn btn-lg btn-warning m-2"
      data-toggle="modal"
      data-target="#exampleModal"
      data-whatever=""
    >
      Xamalé
    </a>

    <div class="">

      <div class="row my-2">
        <div
          class="col-md-3 mb-4 resize"
          :key="xamxam.id"
          v-for="xamxam in xamxams"
        >
          <div class="card mb-2" id="" style="cursor: pointer">
            <div class="card-body">
              <h5 class="card-title text-center">
                <strong>{{ xamxam.titre }}</strong>
              </h5>
            </div>

            <img
              :src="'/uploads/' + xamxam.image"
              class="card-img-top img-fluid card-infoImgg"
              alt="Card image cap"
              style="height: 200px; width: 354px"
              id="img_card"
            />

            <div class="card-body">
              <p class="card-text">{{ xamxam.tags }}</p>
              <p>{{ xamxam.contenu | truncate(27) }}</p>

              <small style="float: right">
                Posté par :
                <strong>
                  {{ xamxam.user.name }}
                </strong>
              </small>
            </div>

            <!-- div tags -->

            <!-- fin div tag -->

            <div class="card-footer">
              <p class="float-right d-inline mr-2">
                <small class="text-muted">
                  <inertia-link :href="'/xamxam/show/' + xamxam.id">
                    Afficher
                  </inertia-link>
                </small>
              </p>
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
  name: "DisplayAll",
  props: ["xamxams"],
  components: {
    FileInput,
  },
  data() {
    return {
      form: {
        titre: null,
        image: null,
        tags: null,
        contenu: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      const data = new FormData();
      data.append("titre", this.form.titre);
      data.append("tags", this.form.tags);
      data.append("image", this.form.image);
      data.append("contenu", this.form.contenu);

      this.$inertia.post("/xamxam", data, {
        onSuccess: () => {
          this.sending = false;
          this.flashMessage.info({
            message: "Votre annonce a ete poste avec success!",
            time: 5000,
          });
        },
      });
    },
  },
};
</script>

<style>
</style>
