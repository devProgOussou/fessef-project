<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-5">
                    <div class="card m-5" v-for="item in user" :key="item.id">
                        <img v-if="item.user.avatar != null" :src="'/uploads/avatar/'+this.user[0].avatar" alt="" style="width:100%">
                        <img v-else src="/uploads/avatar/avatar.png" alt="" style="width:100%">
                        <h1>{{ item.nom }} {{item.prenom}}</h1>
                        <strong>Adresse</strong>
                        <p>{{item.adresse}}</p>
                        <strong>Telephone</strong>
                        <p>{{item.telephone}}</p>
                        <strong>Competences</strong>
                        <p>{{ item.competences }}</p>
                        <strong>Description</strong>
                       <p>{{item.description}}</p>
                        <div style="margin: 24px 0;">
                            <inertia-link href="">Contactez moi</inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Dashboard",
        props:['user'],
    }
</script>

<style scoped>
    h1 {

        margin-left: 20px;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin-left: 70px;
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
