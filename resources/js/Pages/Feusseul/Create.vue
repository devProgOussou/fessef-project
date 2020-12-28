<template>
    <div>
        <FlashMessage :position="'right bottom'"></FlashMessage>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <form @submit.prevent="handleSubmit">
                        <div class="form-group">
                            <label for="titre">titre</label>
                            <input class="form-control" id="titre" name="titre" type="text" v-model="form.titre">
                        </div>
                        <div class="form-group">
                            <label for="contenu">Contenu</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="3"
                                      v-model="form.contenu"></textarea>
                        </div>
                        <div class="form-group">
                            <file-input id="Image/Video" label="Image/Video" v-model="form.file"/>
                        </div>
                        <button
                            class="btn btn-round btn-outline-success col-md-5 offset-4"
                            type="submit"
                        >
                            Creer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FileInput from "../../Shared/FileInput";

    export default {
        components: {
            FileInput
        },
        data() {
            return {
                form: {
                    titre: null,
                    contenu: null,
                    file: null,
                }
            }
        },
        methods: {
            handleSubmit() {
                const data = new FormData()
                data.append("titre", this.form.titre)
                data.append("contenu", this.form.contenu)
                data.append("file", this.form.file)

                this.$inertia.post('/Feusseul/Store', data,
                    {
                        onSuccess: () => {
                            this.flashMessage.info({
                                message: "Votre Feusseul a ete poste avec success!",
                                time: 5000,
                            });
                        },
                    }
                );
            },
        },
    }
</script>
