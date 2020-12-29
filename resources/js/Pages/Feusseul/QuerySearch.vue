<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h4
                class="card-title text-center text-dark"
                v-if="this.countQuery == 0"
              >
                0 resultat
              </h4>

              <h4
                class="card-title text-center text-dark"
                v-if="this.countQuery == 1"
              >
                {{ this.countQuery }} resultat
              </h4>

              <h4
                class="card-title text-center text-dark"
                v-else-if="this.countQuery > 1"
              >
                {{ this.countQuery }} resultats
              </h4>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-4 mb-4">
          <div class="card mb-3 mb-4" v-for="item in query" :key="item.id">
            <div class="card-header" style="height: 55px; padding: 5px">
              <img
              v-if="item.user.avatar != null"
                class="rounded-circle border border-warning d-inline"
                :src="'/uploads/avatar/'+item.user.avatar"
                alt="user"
                width="40px"
                height="40px"
              />
              <img
              v-else
                class="rounded-circle border border-warning d-inline"
                :src="'/uploads/avatar/avatar.png'"
                alt="user"
                width="40px"
                height="40px"
              />
              <div
                class="text-muted font-weight-bold dropdown d-inline ml-2"
              >{{ item.user.name }}</div>
              <a
                href=""
                class="float-right mr-2"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                ><i class="fas fa-ellipsis-h fa-2x mt-2 text-secondary"></i
              ></a>
              <a href=""></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-danger delete" href="">Delete</a>

                <a class="dropdown-item" href="#">Signalez</a>
              </div>
              <p style="margin-top: -32px"></p>
              <small class="text-muted ml-5"></small>
            </div>
            <img
            v-if="
              item.extension == 'jpeg' ||
              item.extension == 'jpg' ||
              item.extension == 'png'
            "
            :src="'/uploads/'+item.file" class="card-img-top card-infoImg" alt="fesseul image" />
            <video
            controls
            v-if="
              item.extension == 'mp4' ||
              item.extension == 'ogg'
            "
            height="500"
          >
            <source
              :src="'/uploads/videos/' + item.file"
              type="video/mp4"
            />
          </video>
            <div class="card-body">
              <p class="card-text"></p>
            </div>
            <div class="card-footer text-muted text-center">
              <p class="text-left ml-2"></p>
              <p class="text-left ml-2">
                <inertia-link :href="'/Feusseul/Show/'+item.id" class="float-right mr-2">Voir plus...</inertia-link>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["query", "countQuery"],
};
</script>

<style>
</style>style
