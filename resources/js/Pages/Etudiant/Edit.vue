<template>
    <div>
        <FlashMessage :position="'right bottom'"></FlashMessage>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img v-if="this.user[0].avatar != null" :src="'/uploads/avatar/'+this.user[0].avatar" alt="" style="width:100%">
                        <img v-else src="/uploads/avatar/avatar.png" alt="" style="width:100%">
                        <inertia-link :href="'/Etudiant/editAvatar/'+this.etudiant[0].user_id">
                            <button class="btn btn-sm btn-dark">modifier avatar</button>
                        </inertia-link>
                        <h1>{{ this.etudiant[0].nom }} {{this.etudiant[0].prenom}}</h1>
                        <strong>Adresse</strong>
                        <p>{{this.etudiant[0].adresse}}</p>
                        <strong>Competences</strong>
                        <p>{{ this.etudiant[0].competences }}</p>
                        <strong>Description</strong>
                        <!--                        <p>{{this.competences[0].description}}</p>-->
                        <div style="margin: 24px 0;">

                        </div>
                        <p>
                            <inertia-link :href="'/Etudiant/edit/'+this.etudiant[0].user_id">
                                Modifier profil
                            </inertia-link>
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="col-md-8">
                        <form @submit.prevent="handleSubmit" class="mb-5">
                            <div class="form-group">
                                <file-input label="avatar *" v-model="form.avatar"/>
                                <img src="" alt="" height="100px" width="100px">
                            </div>
                            <div class="form-group">
                                <input
                                    :placeholder="this.etudiant[0].nom"
                                    class="form-control"
                                    required
                                    type="text"
                                    v-model="form.nom"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    :placeholder="this.etudiant[0].prenom"
                                    class="form-control"
                                    required
                                    type="text"
                                    v-model="form.prenom"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    :placeholder="this.etudiant[0].adresse"
                                    class="form-control"
                                    required
                                    type="text"
                                    v-model="form.adresse"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    :placeholder="this.etudiant[0].telephone"
                                    class="form-control"
                                    required
                                    type="text"
                                    v-model="form.telephone"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    :placeholder="this.etudiant[0].competences"
                                    class="form-control"
                                    required
                                    type="text"
                                    v-model="form.competences"
                                />
                            </div>
                            <div class="form-group">
                    <textarea
                        class="form-control col-md-12"
                        :placeholder="this.etudiant[0].description"
                        required
                        rows="5"
                        v-model="form.description"
                    >

                    </textarea>
                            </div>
                            <button
                                class="btn btn-round btn-outline-primary col-md-5 offset-4"
                                type="submit"
                            >
                                Submit
                            </button>
                            <br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FileInput from "../../Shared/FileInput";
    export default {
        name: "Edit",
        components:{
            FileInput
        },
        props: {
            etudiant: Array,
            user: Array
        },
        data()
        {
            return {
                form: {
                    nom: this.etudiant[0].nom,
                    prenom: this.etudiant[0].prenom,
                    adresse: this.etudiant[0].adresse,
                    telephone: this.etudiant[0].telephone,
                    competences: this.etudiant[0].competences,
                    description: this.etudiant[0].description,
                    avatar: null,
                }
            }
        },
        methods: {
            handleSubmit()
            {
                const data = new FormData();
                data.append("nom", this.form.nom);
                data.append("prenom", this.form.prenom);
                data.append("telephone", this.form.telephone);
                data.append("adresse", this.form.adresse);
                data.append("competences", this.form.competences);
                data.append("description", this.form.description);
                data.append("avatar", this.form.avatar || "");

                this.$inertia.post('/Etudiant/update/' + this.etudiant[0].user_id, data, {
                    onSuccess: () => {
                        this.flashMessage.info({
                            message: "Votre profil a ete modifier avec success!",
                            time: 5000,
                        });
                    },
                })
            }
        },
        get_avatar()
        {}
    }
</script>

<style scoped>
    h1 {

        margin-left: 20px;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin-left: 20px;
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

    button:hover, a:hover {
        opacity: 0.7;
    }

</style>
