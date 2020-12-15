<template>
    <div>
        <div class="container">
            <div class="row">
                <inertia-link class="m-5" href="/Annonce">
                    <button class="btn btn-primary">Voir</button>
                </inertia-link>
                <div class="col-md-10 offset-1 ml-3 m-5">
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props:['annonce'],
    }
</script>

<style>

</style>
