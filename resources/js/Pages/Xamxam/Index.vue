<template>
    <div>
        <FlashMessage :position="'right bottom'"></FlashMessage>
        <div class="container">
            <div class="row">
                <inertia-link class="m-5" href="/xamxam">
                    <button class="btn btn-primary">Voir</button>
                </inertia-link>
                <div class="col-md-8 mt-5" style="margin-top: 7rem">
                    <form @submit.prevent="handleSubmit">
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
                            <file-input v-model="form.image" label="image *" />
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
                        <button
                            type="submit"
                            class="btn btn-round btn-outline-primary col-md-5 offset-4"
                        >
                            Submit
                        </button>
                        <br />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FileInput from "../../Shared/FileInput";
    export default {
        name: "Index",
        components:{
            FileInput
        },
        data()
        {
            return {
                form: {
                    titre: null,
                    image: null,
                    tags: null,
                    contenu: null,
                }
            }
        },
        methods: {
            handleSubmit()
            {
                const data = new FormData();
                data.append("titre", this.form.titre);
                data.append("tags", this.form.tags);
                data.append("image", this.form.image);
                data.append("contenu", this.form.contenu);

                this.$inertia.post('/xamxam', data,
                    {
                        onSuccess: () => {
                            this.sending = false;
                            this.flashMessage.info({
                                message: "Votre annonce a ete poste avec success!",
                                time: 5000,
                            });
                        },
                    }
                );
            },
        },
    };
</script>


<style>

</style>
