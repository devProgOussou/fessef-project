<template>
    <div>
        <div class="container">
            <div class="row">
                <inertia-link class="m-5" href="/Feusseuls">
                    <button class="btn btn-primary">Voir tout</button>
                </inertia-link>
                <div class="col-md-10 offset-1 ml-3 m-5">
                    <img :src="'/uploads/'+this.feusseul[0].file" alt="" height="500px"
                         v-if="this.feusseul[0].extension == 'jpeg'" width="1000px">
                    <video controls height="500px" v-if="this.feusseul[0].extension == 'mp4'" width="1000px">
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
                    <form @submit.prevent="handleSubmit">
                        <div class="form-group offset-4">
                            <span>{{ this.feusseul[0].commentaires. }}</span>
                            <input class="btn-outline-primary btn btn-sm" name="like" placeholder="J'aime" v-model="form.like">
                            <input class="btn-outline-danger btn btn-sm" name="dislike" placeholder="Je n'aime pas"
                                   v-model="form.dislike">
                        </div>
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
        props: ['feusseul'],
        data() {
            return {
                form: {
                    commentaires: null,
                    like: null,
                    dislike: null,
                }
            }
        },
        methods: {
            handleSubmit() {
                const data = new FormData();
                data.append("like", this.form.commentaires);
                data.append("dislike", this.form.dislike);
                data.append("commentaires", this.form.commentaires);

                this.$inertia.post('/comments', data, {
                    onSuccess: () => {
                        this.flashMessagfe.info({
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
