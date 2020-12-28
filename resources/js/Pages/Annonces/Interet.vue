<template>
    <div>
        <FlashMessage :position="'right bottom'"></FlashMessage>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <img :src="'/uploads/'+this.annonce[0].image" alt="" height="500px" width="1000px">
                    <p class="text-center">
                        <strong>{{ this.annonce[0].titre }}</strong>
                    </p>
                    <p>
                        {{ this.annonce[0].contenu }}
                    </p>
                    <p>
                        <small>{{ this.annonce[0].description }}</small>
                    </p>
                    <ul :key="user.id" class="list-group" v-for="user in userInteresse">
                        <li>{{ user.user_name }} =>
                            <inertia-link :href="'/User/Profile/'+user.user_id">Voir profil</inertia-link>
                        </li>
                    </ul>
                    <small>Nombre d'interesse : </small><strong>{{ this.nbreInteresses }}</strong>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props: [
            'annonce', 'userInteresse', 'nbreInteresses'
        ],
        methods: {

        },
    };
</script>

<style>

</style>
