<template>
<div>
    <FlashMessage :position="'right bottom'"></FlashMessage>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mr-2 ml-4 mb-3 mt-4  shadow-sm">
                    <img v-if="this.user[0].avatar != null" :src="'/uploads/avatar/'+this.user[0].avatar" alt="" style="width:100%">
                        <img v-else src="/uploads/avatar/avatar.png" alt="" style="width:100%">
                         <inertia-link :href="'/Entreprise/editAvatar/'+this.entreprise[0].user_id">
                            <button class="btn btn-primary mt-1" style="margin-left:80px;">modifier avatar</button>
                        </inertia-link>
                    <h6 class="card-header" style="color: blue;text-align: center;">PROFIL INFOS</h6>
                    <div class="card-body mt-4 text-center" >
                    
                        <!-- <h5 class="card-title"></h5> -->
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        
                        <p class="card-text"><strong>Nom: </strong>{{ this.entreprise[0].NomEntreprise }}</p>
                        <p class="card-text"><strong>Domaine: </strong>{{this.entreprise[0].domaineActivites}}</p>
                        <p class="card-text"><strong>Lien: </strong>{{this.entreprise[0].lien}}</p>
                        <p class="card-text"><strong>Adresse: </strong>{{this.entreprise[0].adresse}}</p>
                        <p class="card-text"><strong>Téléphone: </strong>{{this.entreprise[0].telephone}}</p>
                        <!-- <p class="card-text"><strong>Bio:</strong></p> -->
                        <div class="text-center">
                            <inertia-link :href="'/association/edit/'+this.entreprise[0].user_id" class="btn btn-sm"
                                style="background-color: #3563a9; color:#fff;">
                                Mise à jour
                            </inertia-link>
                        </div>
                       
                    </div>
                    <!-- <h6 class="card-header" style="color: blue;">COMPETENCES</h6> -->
                </div>
            </div>
            <div class="col-md-8">
                <h3 style="text-align:center">Modification du profil</h3>
                <form @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <label for="from.avatar">Image du profil</label>
                        <div class="col-md-6">
                            <file-input id="form.avatar" label="avatar" v-model="form.avatar"/>

                            <div class="avatar img-fluid img-circle" style="margin-top:10px">
                                <!--                        <img :src="get_avatar()" height="50" width="50"/>-->
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm btn-block">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import FileInput from "../../Shared/FileInput";

    export default {
        name: 'EditAvatar',
        components: {
            FileInput
        },
        props: ['user', 'entreprise'],
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
                data.append("avatar", this.form.avatar);
                this.$inertia.post('/Entreprise/updateAvatar/' + this.user[0].id, data, {
                    onSuccess: () => {
                        this.flashMessage.info({
                            message: "Votre photo profil a ete modifier avec success!",
                            time: 5000,
                        });
                    },
                })
            },
            //For getting Instant Uploaded Photo
            // get_avatar() {
            //     let photo = (this.form.avatar.length > 100) ? this.form.avatar : "uploads/" + this.form.avatar;
            //     return photo;
            //
            // },
        }
    }
</script>

<style scoped>
 

</style>
