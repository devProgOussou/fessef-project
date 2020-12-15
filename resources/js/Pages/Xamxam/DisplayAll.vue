<template>
    <div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div :key="xamxam.id" class="col-md-3" v-for="xamxam in xamxams">
                        <div class="card mb-3 box-shadow item-details">
                            <img
                                :src="'/uploads/' +xamxam.image"
                                alt="Card image cap"
                                class="card-img-top"
                                style="height: 200px; width: 254px;"
                            />
                            <div class="card-body">
                                <p>
                                    <strong>{{ xamxam.titre }}</strong>
                                </p>
                                <p class="card-text">{{ xamxam.tags }}</p>
                                <p>{{ xamxam.contenu | truncate(27) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small style="float: left">
                                        Posté par :
                                        <strong>
                                            {{ xamxam.user.name }}
                                        </strong>
                                    </small>
                                    <small class="text-muted">
                                        <inertia-link href="">
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
        name: "DisplayAll",
        props: ['xamxams'],
    }
</script>

<style>

</style>
