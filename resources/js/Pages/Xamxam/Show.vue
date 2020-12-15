<template>
    <div>
        <div class="container">
            <div class="row">
                <inertia-link class="m-5" href="/xamxam">
                    <button class="btn btn-primary">Voir</button>
                </inertia-link>
                <div class="col-md-10 offset-1 ml-3 m-5">
                        <img :src="'/uploads/'+this.xamxam[0].image" alt="" height="500px" width="1000px">
                    <p class="text-center">
                        <strong>{{ this.xamxam[0].titre }}</strong>
                    </p>
                    <p>
                        {{ this.xamxam[0].contenu }}
                    </p>
                    <p>
                        <small>{{ this.xamxam[0].tags }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props:['xamxam'],
    }
</script>

<style>

</style>
