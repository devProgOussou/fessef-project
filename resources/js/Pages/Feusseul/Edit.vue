<template>
    <div>
        <inertia-link class="m-5" href="/Annonce">
            <button class="btn btn-primary">Voir</button>
        </inertia-link>
        <FlashMessage :position="'right bottom'"></FlashMessage>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-5" style="margin-top: 7rem">
                    <form @submit.prevent="handleSubmit">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                :placeholder="this.feusseul[0].titre"
                                v-model="form.titre"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <file-input v-model="form.file" label="fichier *" />
                        </div>
                        <div class="form-group">
              <textarea
                  class="form-control col-md-12"
                  rows="5"
                  v-model="form.contenu"
                  :placeholder='this.feusseul[0].contenu'
                  required
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
        props:{
            feusseul: Array
        },
        data()
        {
            return {
                form: {
                    titre: this.feusseul[0].titre,
                    file: null,
                    contenu: this.feusseul[0].contenu,
                }
            }
        },
        methods: {
            handleSubmit()
            {
                const data = new FormData();
                data.append("titre", this.form.titre);
                data.append("file", this.form.file);
                data.append("contenu", this.form.contenu);

                this.$inertia.post('/Feusseul/Update/'+this.feusseul[0].id, data,
                    {
                        onSuccess: () => {
                            this.flashMessage.info({
                                message: "Votre feusseul a ete modifier avec success!",
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
