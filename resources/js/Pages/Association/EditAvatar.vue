<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 m-auto">
                    <div class="card shadow-sm mb-4" style="height: 90px">
                        <div class="ml-4">
                            <img
                                    :src="'/uploads/avatar/' + this.user[0].avatar"
                                    alt="image"
                                    class="img-thumbnail shadow-sm text-left ml-4"
                                    height="25"
                                    style="margin-top: 40px; border: solid 5px #fff"
                                    v-if="this.user[0].avatar != null"
                                    width="50"
                            />

                            <img
                                    alt="image"
                                    class="img-thumbnail shadow-sm text-left ml-4"
                                    height="25"
                                    src="/uploads/avatar/avatar.png"
                                    style="margin-top: 40px; border: solid 5px #fff"
                                    v-else
                                    width="50"
                            />
                            <inertia-link
                                    :href="'/Association/editAvatar/' + this.association[0].user_id"
                                    class="btn btn-sm mt-4"
                                    style="
                  margin-right: 50px;
                  float: right;
                  background-color: #3563a9;
                  color: #fff;
                "
                            >Mise à jour
                            </inertia-link
                            >
                        </div>

                        <div class="text-center ml-4"></div>
                    </div>
                </div>

                <div class="col-md-4 mt-4">
                    <div class="card mr-2 ml-4 mb-3 mt-4 shadow-sm">
                        <h6 class="card-header" style="color: blue">PROFIL INFOS</h6>
                        <div class="card-body mt-4">
                            <h5 class="card-title"></h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>

                            <p class="card-text">
                                Nom de l'association :
                                <strong
                                >
                                    {{ this.association[0].NomAssociation }}</strong
                                >
                            </p>
                            <p class="card-text">
                                <strong>E-mail: </strong>{{ this.user[0].email }}
                            </p>
                            <p class="card-text">
                                <strong>Phone: </strong>{{ this.association[0].telephone }}
                            </p>
                            <p class="card-text"><strong>Date de creation: </strong>{{
                                this.association[0].dateDeCreation
                                }}</p>
                            <p class="card-text">
                                <strong>description: </strong>{{ this.association[0].description }}
                            </p>
                            <p class="card-text">
                                <strong>Domaine d'activite: </strong>{{ this.association[0].domaineActivites }}
                            </p>
                            <p class="card-text">
                                <strong>Adresse web : </strong>{{ this.association[0].lien }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mt-5">
                    <form @submit.prevent="handleSubmit" class="mb-5">
                        <div class="form-group">
                            <div class="col-md-6">
                                <file-input
                                        id="form.avatar"
                                        label="avatar"
                                        v-model="form.avatar"
                                />
                            </div>
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
    import FileInput from "../../Shared/FileInput";

    export default {
        name: "Edit",
        components: {
            FileInput
        },
        props: {
            association: Array,
            user: Array
        },
        data() {
            return {
                form: {
                    avatar: null,
                }
            }
        },
        methods: {
            handleSubmit() {
                const data = new FormData();
                data.append("avatar", this.form.avatar || "");

                this.$inertia.post('/Association/UpdateAvatar/' + this.association[0].user_id, data, {
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
    body {
        background-color: lightgrey;
        padding: 0;
        margin: 0;
    }

    .col-mb-3 {
        display: grid;
        justify-content: center;
        align-content: center;
        min-height: 100vh;
    }

    h3 {
        text-align: justify;
    }

    .shadow {
        display: flex;
    }
</style>
