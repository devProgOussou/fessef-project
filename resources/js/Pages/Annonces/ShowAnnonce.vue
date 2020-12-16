<template>
    <div>
        <div class="container">
            <div class="row">
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

                    <form @submit.prevent="handleSubmit">
                        <button class="btn btn-primary">Interesse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props:['annonce'],
        methods: {
            handleSubmit()
            {
                const data = new FormData();
                data.append("annonce_id", this.annonce[0].id);

                this.$inertia.post('/Annonce/interesse/'+this.annonce[0].id,data,
                    {
                        onSuccess: () => {
                            this.flashMessage.info({
                                message: "Merci pour l'interet!",
                                time: 10000,
                            });
                        },
                    }
                );
            },
        },
    };
</script>

<style>

</style>
