<template>
    <div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div :key="feusseul.id" class="col-md-3" v-for="feusseul in feusseuls">
                        <img
                            v-if="feusseul.extension == 'jpeg'"
                            :src="'/uploads/' +feusseul.file"
                            alt="Card image cap"
                            class="card-img-top"
                            style="height: 200px; width: 254px;"
                        />
                        <div>
                            <video controls v-if="feusseul.extension == 'mp4'" width="320px" height="250px">
                                <source :src="'/uploads/videos/' +feusseul.file" type="video/mp4">
                            </video>
                        </div>
                        <div class="card-body">
                            <p>
                                <strong>{{ feusseul.titre }}</strong>
                            </p>
                            <p>{{ feusseul.contenu | truncate(27) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small style="float: left">
                                    Posté par :
                                    <strong>
                                        {{ feusseul.user.name }}
                                    </strong>
                                </small>
                                <small class="text-muted">
                                    <inertia-link :href="'/Feusseul/Show/'+feusseul.id">
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
</template>

<script>
    export default {
        name: "showAll",
        props: ['feusseuls'],
    }
</script>

<style>

</style>
