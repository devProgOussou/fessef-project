<template>
    <div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div :key="annonce.id" class="col-md-3" v-for="annonce in annonces">
                        <div class="card mb-3 box-shadow item-details">
                            <img
                                :src="'/uploads/' +annonce.image"
                                alt="Card image cap"
                                class="card-img-top"
                                style="height: 200px; width: 254px;"
                            />
                            <div class="card-body">
                                <p>
                                    <strong>{{ annonce.titre }}</strong>
                                </p>
                                <p class="card-text">{{ annonce.description | truncate(27) }}</p>
                                <p>{{ annonce.contenu | truncate(27) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small style="float: left">
                                        Posté par :
                                        <strong>
                                            {{ annonce.user.name }}
                                        </strong>
                                    </small>
                                    <small class="text-muted">
                                        <inertia-link :href="'/Annonce/'+annonce.id">
                                            Afficher
                                        </inertia-link
                                        >
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowAll",
        props: ['annonces'],
    }
</script>

<style>

</style>
