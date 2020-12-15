<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card box-shadow">
                        <img v-if="this.user[0].avatar != null" :src="'/uploads/avatar/'+this.user[0].avatar" alt="" style="width:100%">
                        <img v-else src="/uploads/avatar/avatar.png" alt="" style="width:100%">
                        <inertia-link :href="'/Entreprise/editAvatar/'+this.entreprise[0].user_id">
                            <button class="btn btn-sm btn-dark">modifier avatar</button>
                        </inertia-link>
                        <h1>{{ this.entreprise[0].NomEntreprise }}</h1>
                        <strong>secteur</strong>
                        <p class="title">{{this.entreprise[0].domaineActivites}}</p>
                        <inertia-link :href="this.entreprise[0].lien">{{this.entreprise[0].lien}}</inertia-link>
                        <strong>adresse</strong>
                        <p>{{this.entreprise[0].adresse}}</p>
                        <strong>telephone</strong>
                        <p>{{this.entreprise[0].telephone}}</p>
                        <div style="margin: 24px 0;">

                        </div>
                        <p>
                            <inertia-link :href="'/entreprise/edit/'+this.entreprise[0].user_id">
                                Modifier profil
                            </inertia-link>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1>Last xamxam poster</h1>
                    <div :key="xamxam.id" class="card mb-3" v-for="xamxam in xamxams">
                        <img :src="'uploads/'+xamxam.image" alt="" class="card-img-top" height="180px" width="733px">
                        <div class="card-body">
                            <h5 class="card-title">{{xamxam.titre}}</h5>
                            <h5 class="card-title">{{xamxam.tags}}</h5>
                            <p class="card-text">{{xamxam.contenu | truncate(27) }}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1>Last annonce poster</h1>
                    <div :key="annonce.id" class="card mb-3" v-for="annonce in annonces">
                        <img :src="'uploads/'+annonce.image" alt="" class="card-img-top" height="180px" width="733px">
                        <div class="card-body">
                            <h5 class="card-title">{{annonce.titre}}</h5>
                            <h5 class="card-title">{{annonce.description}}</h5>
                            <p class="card-text">{{annonce.contenu | truncate(27) }}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
        name: "Dashboard",
        components: {
            Logout
        },
        props: ['entreprise', 'user', 'xamxams', 'annonces'],
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
