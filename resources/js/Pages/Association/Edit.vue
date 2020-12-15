<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img v-if="this.user[0].avatar != null" :src="'/uploads/avatar/'+this.user[0].avatar" alt="" style="width:100%">
                        <img v-else src="/uploads/avatar/avatar.png" alt="" style="width:100%">
                        <h1>{{ this.association[0].NomAssociation }}</h1>
                        <strong>secteur</strong>
                        <p class="title">{{this.association[0].domaineActivites}}</p>
                        <inertia-link :href="this.association[0].lien">{{this.association[0].lien}}</inertia-link>
                        <strong>adresse</strong>
                        <p>{{this.association[0].adresse}}</p>
                        <div style="margin: 24px 0;">

                        </div>
                        <p>
                            <inertia-link :href="'/association/edit/'+this.association[0].user_id">Modifier profil
                            </inertia-link>
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <form @submit.prevent="handleSubmit" class="mb-5">
                        <div class="form-group">
                            <file-input label="avatar *" v-model="form.avatar"/>
                            <img :src="get_avatar" alt="" height="100px" width="100px">
                        </div>
                        <div class="form-group">
                            <input
                                :placeholder="this.association[0].NomAssociation"
                                class="form-control"
                                required
                                type="text"
                                v-model="form.NomAssociation"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                :placeholder="this.user[0].email"
                                class="form-control"
                                required
                                type="text"
                                v-model="form.email"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                :placeholder="this.association[0].adresse"
                                class="form-control"
                                required
                                type="text"
                                v-model="form.adresse"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                :placeholder="this.association[0].telephone"
                                class="form-control"
                                required
                                type="text"
                                v-model="form.telephone"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                :placeholder="this.association[0].lien"
                                class="form-control"
                                required
                                type="text"
                                v-model="form.lien"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                :placeholder="this.association[0].NomAssociation"
                                class="form-control"
                                required
                                type="text"
                                v-model="form.domaineActivites"
                            />
                        </div>
                        <div class="form-group">
                    <textarea
                        class="form-control col-md-12"
                        placeholder=""
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
</template>

<script>
    import Logout from '../../Shared/Logout'
    import FileInput from "../../Shared/FileInput";

    export default {
        name: "Edit",
        components: {
            Logout,
            FileInput
        },
        props: {
            association: Array,
            user: Array
        },
        data() {
            return {
                form: {
                    NomAssociation: this.association[0].NomAssociation,
                    adresse: this.association[0].adresse,
                    telephone: this.association[0].telephone,
                    lien: this.association[0].lien,
                    domaineActivites: this.association[0].domaineActivites,
                    description: this.association[0].description,
                    avatar: null,
                    email: this.user[0].email,
                    // password: this.user[0].password,
                }
            }
        },
        methods: {
            handleSubmit() {
                const data = new FormData();
                data.append("NomAssociation", this.form.NomAssociation);
                data.append("adresse", this.form.adresse);
                data.append("telephone", this.form.telephone);
                data.append("lien", this.form.lien);
                data.append("domaineActivites", this.form.domaineActivites);
                data.append("description", this.form.description);
                data.append("avatar", this.form.avatar || "");
                data.append("email", this.form.email);

                this.$inertia.post('/association/update/' + this.association[0].user_id, data, {
                    onSuccess: () => {
                        this.flashMessage.info({
                            message: "Votre profil a ete modifier avec success!",
                            time: 5000,
                        });
                    },
                })
            },
            get_avatar() {
                let photo = (this.form.avatar.length > 100) ? this.form.avatar : "uploads/" + this.form.avatar;
                return photo;
            },
        }
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
