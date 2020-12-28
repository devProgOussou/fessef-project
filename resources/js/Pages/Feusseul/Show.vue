<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="card feseul_card post_div" id="">
                    <h5 class="card-header">
                        <img :src="'/uploads/avatar/'+userFeusseul.avatar"
                             alt="user"
                             class="rounded-circle border border-warning d-inline"
                             height="50px"
                             v-if="userFeusseul.avatar != null"
                             width="50px"/>
                        <img alt="user"
                             class="rounded-circle border border-warning d-inline"
                             height="50px"
                             src="/uploads/avatar/avatar.png"
                             v-else
                             width="50px"/>
                        <div class="text-muted font-weight-bold dropdown d-inline ml-2">
                            {{ userFeusseul.name }}
                        </div>
                    </h5>

                    <img
                        :src="'/uploads/' + this.feusseul[0].file"
                        alt="image"
                        class="card-img"
                        v-if="
              this.feusseul[0].extension == 'jpeg' ||
              this.feusseul[0].extension == 'jpg'  ||
              this.feusseul[0].extension == 'png'
            "
                    />
                    <video
                        controls
                        height="400px"
                        v-if="this.feusseul[0].extension == 'mp4'||this.feusseul[0].extension == 'ogg'"
                        width="1000px"
                    >
                        <source
                            :src="'/uploads/videos/' + this.feusseul[0].file"
                            type="video/mp4"
                        />
                    </video>
                    <div class="card-body">

                        <p class="text-center p-4">
                            <strong>{{ this.feusseul[0].titre }}</strong>
                        </p>
                        <p>
                            {{ this.feusseul[0].contenu }}
                        </p>
                    </div>

                    <div class="card-footer text-muted text-center">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="float-left d-inline ml-2"></p>
                            </div>

                            <div class="col-md-2">
                                <p class="text-center d-inline ml-2"></p>

                                <div id="like-section">
                                    <div class="row ">
                 <span v-if="this.feusseul[0].like != null">total like {{
                this.feusseul[0].like
                 }}</span>
                                        <span v-if="this.feusseul[0].like == null"></span>

                                        <inertia-link :href="'/Feusseul/like/' + this.feusseul[0].id">
                                            <i class="btn btn-sm btn-info">J'aime</i>
                                        </inertia-link>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-2">
                                <p class="float-right d-inline total"></p>
                            </div>

                            <!-- <div class="col-md-2">
                              <p class="float-right d-inline total">Vue(s)</p>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- <div class="main-comment-section">

                        </div>  -->

                <hr/>

                <div :key="item.id"
                     class="row my-4"
                     v-for="item in commentaires"
                >
                    <div class="col-md-1"

                    >
                        <img v-if="item.user.avatar != null"
                            :src="'/uploads/avatar/'+item.user.avatar"
                            alt=""
                            class="rounded-circle mx-auto d-block p-2"
                            style="width: 70px; height: 70px"
                        />
                        <img v-else
                             src="/uploads/avatar/avatar.png"
                             alt=""
                             class="rounded-circle mx-auto d-block p-2"
                             style="width: 70px; height: 70px"
                        />

                    </div>
                    <div class="col-md-11 mt-3" style="padding-left: 25px;">
                        <small class="">
                            <strong>{{ item.user.name }}</strong>
                        </small><br>
                        <b>{{ item.commentaires }} </b><br>

                        <span class="badge badge-secondary"> {{ item.created_at }}</span>

                        <div class="reply mx-0">
                            <a
                                aria-controls=""
                                aria-expanded="false"
                                class="text-secondary"
                                data-toggle="collapse"
                                href=""
                                role="button"
                            >
                                <div class="ml-5">
                                    <p class="ml-2">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <small>Repondre</small>
                            </a>

                            <div class="collapse">
                                <div class="card card-body my-2">
                                    <form action="" class="form-inline" method="POST">
                                        <div class="form-group my-2">
                      <textarea
                          class="form-control"
                          cols="60"
                          name="comment"
                          placeholder="Repondre..."
                          rows="1"
                      ></textarea>
                                            <!-- <input type="text" class="form-control"  name="comment" placeholder="Repondre..."> -->
                                            <input name="parentId" type="hidden" value=""/>
                                        </div>
                                        <input name="postId" type="hidden" value=""/>
                                        <button
                                            class="btn btn-primary btn-sm m-2"
                                            id="btnRepondre"
                                            type="submit"
                                        >
                                            Repondre
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <hr/>

                <form @submit.prevent="handleSubmit" class="form-inline">
                    <div class="form-group my-2">
            <textarea
                class="form-control"
                cols="80"
                id="description"
                name="commentaires"
                placeholder="Commentaire..."
                rows="1"
                v-model="form.commentaires"
            ></textarea>
                        <!-- <input type="text" class="form-control"  name="comment" placeholder="Commentaire..."> -->
                    </div>
                    <input name="parentId" type="hidden" value=""/>
                    <input name="postId" type="hidden" value=""/>
                    <button class="btn btn-primary m-2" type="submit">Comment</button>
                </form>

                <hr/>
            </div>

            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props: ["feusseul", "commentaires", "userFeusseul"],
        data() {
            return {
                form: {
                    commentaires: null,
                    feusseul_id: this.feusseul[0].id,
                },
            };
        },
        methods: {
            handleSubmit() {
                const data = new FormData();

                data.append("commentaires", this.form.commentaires);
                data.append("feusseul_id", this.form.feusseul_id);

                this.$inertia.post("/Feusseul/comments", data, {
                    onSuccess: () => {
                        this.form.commentaires = "";
                        this.flashMessage.info({
                            message: "Commentaire poster avec success",
                        });
                    },
                });
            },
        },
    };
</script>

<style>
</style>
