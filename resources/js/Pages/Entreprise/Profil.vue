<template>
	<div class="container-fluid">
        <div class="row">
                <div class="col-md-12 m-auto">
                    <div class="card shadow-sm  mb-4" style="height: 90px;">
                        <div class="ml-4">
                        <img :src="'asset/img/defarsci.png'" class="img-thumbnail shadow-sm text-left ml-4 w-100 h-50" alt="image" style="margin-top: 75px; border : solid 5px #fff;">
                        <inertia-link :href="'/Entreprise/editAvatar/'+this.entreprise[0].user_id" class=" btn-sm mt-4"
                            style=" margin-right: 50px; float: right; background-color: #3563a9; color: white;">Mise à jour</inertia-link>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
        <div class="col-md-4">
                   <div class="card mr-2 ml-4 mb-3 mt-4  shadow-sm">
                    <img v-if="this.user[0].avatar != null" :src="'/uploads/avatar/'+this.user[0].avatar" alt="" style="width:100%;height: 300px">
                        <img v-else src="/uploads/avatar/avatar.png" alt="" style="width:100%;height: 300px">
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
                            <inertia-link :href="'/entreprise/edit/'+this.entreprise[0].user_id" class="btn btn-sm"
                                style="background-color: #3563a9; color:#fff;">
                                Mise à jour
                            </inertia-link>
                        </div>  
                    </div>
                </div>  
                </div>
                </div>
	</div>
</template>
<script>
    import Logout from '../../Shared/Logout'

    export default {
        name: "Profil",
        components: {
            Logout
        },
        props: ['entreprise', 'user', 'xamxams', 'annonces'],
    }
</script>