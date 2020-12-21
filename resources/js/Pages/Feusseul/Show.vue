<template>
    <div>
        <div class="container">
            <div class="row">
                <!--                <inertia-link class="m-5" href="/Feusseuls">-->
                <!--                    <button class="btn btn-primary">Voir tout</button>-->
                <!--                </inertia-link>-->
                <div class="col-md-10 offset-1 ml-3 mb-5">
                    <img :src="'/uploads/'+this.feusseul[0].file" alt="" height="400px"
                         v-if="this.feusseul[0].extension == 'jpeg'" width="1000px">
                    <video controls height="400px" v-if="this.feusseul[0].extension == 'mp4'" width="1000px">
                        <source :src="'/uploads/videos/' +this.feusseul[0].file" type="video/mp4">
                    </video>
                    <p class="text-center">
                        <strong>{{ this.feusseul[0].titre }}</strong>
                    </p>
                    <p>
                        {{ this.feusseul[0].contenu }}
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="form-group offset-5">
                        <span v-if="this.feusseul[0].like != null">{{ this.feusseul[0].like }}</span>
                        <span v-if="this.feusseul[0].like == null">0</span>
                        <inertia-link :href="'/Feusseul/like/'+this.feusseul[0].id">
                            <i class="btn btn-sm btn-info">J'aime</i>
                        </inertia-link>
                    </div>
                    <h5 class="offset-5">Les commentaires recentes</h5>
                    <div class="col-md-5 offset-3 shadow mb-5" v-for="item in commentaires"  :key="item.id">
                                <p>{{  item.commentaires }}</p>
                                <small class="offset-7">
                                    <small>Poster par : </small>
                                    <strong>{{ item.user.name }}</strong>
                                </small>
                    </div>
                    <form @submit.prevent="handleSubmit">
                        <div class="form-group">
                    <textarea class="form-control" id="description" name="commentaires" rows="3"
                              v-model="form.commentaires"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-success btn col-md-5 offset-3">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props: ['feusseul', 'commentaires'],
        data() {
            return {
                form: {
                    commentaires: null,
                    feusseul_id: this.feusseul[0].id,
                }
            }
        },
        methods: {
            handleSubmit() {
                const data = new FormData();

                data.append("commentaires", this.form.commentaires);
                data.append("feusseul_id", this.form.feusseul_id);

                this.$inertia.post('/Feusseul/comments', data, {
                    onSuccess: () => {
                        this.form.commentaires = '';
                        this.flashMessage.info({
                            message: ("Commentaire poster avec success")
                        });
                    }
                });
            }
        }
    }
</script>

<style>

</style>
