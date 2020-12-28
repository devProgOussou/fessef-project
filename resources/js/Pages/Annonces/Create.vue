<template>
    <div>
        <FlashMessage :position="'right bottom'"></FlashMessage>
        <div class="container">
            <div class="row">
                <h2 class="offset-5 mt-3" style="color: #3563a9;">Creer une annone</h2>
                <div class="col-md-10 offset-1 mt-2 mb-5">
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
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                      v-model="form.description"></textarea>
                        </div>
                        <div class="form-group">
                            <file-input id="image" label="image" v-model="form.image"/>
                        </div>
                        <button type="submit" class="btn btn-outline-primary offset-4 btn-round col-md-5">Submit</button>
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
                    description: null,
                    contenu: null,
                    image: null,
                }
            }
        },
        methods: {
            handleSubmit() {
                const data = new FormData()
                data.append("titre", this.form.titre)
                data.append("description", this.form.description)
                data.append("contenu", this.form.contenu)
                data.append("image", this.form.image)

                this.$inertia.post('/Annonce/Store', data,
                    {
                        onSuccess: () => {
                            this.flashMessage.info({
                                message: "Votre annonce a ete poste avec success!",
                                time: 5000,
                            });
                        },
                    }
                );
            },
        },
    }
</script>
