<template>
    <div class="container mt-2 ">
        <div class="col-md-12 mt-4 bg-gray-100">
            <div class="row">
                <!-- les 4 tags les plus utilisé  -->

                <!-- fin du div des tags -->
            </div>

            <div class="row my-2">
                <div
                    :key="annonce.id"
                    class="col-md-4 mb-4 resize"
                    v-for="annonce in annonces"
                >
                    <div class="card mb-2" id="" style="cursor: pointer">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <strong>{{ annonce.titre }}</strong>
                            </h5>
                        </div>

                        <img
                            :src="'/uploads/' + annonce.image"
                            alt="Card image cap"
                            class="card-img-top img-fluid card-infoImgg"
                            id="img_card"
                            style="height: 200px; width: 354px"
                        />

                        <div class="card-body">
                            <p>{{ annonce.description | truncate(27) }}</p>

                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <small style="float: left">
                                Posté par :
                                <strong>
                                    {{ annonce.user.name }}
                                </strong>
                            </small>
                        </div>

                        <!-- div tags -->

                        <!-- fin div tag -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <small v-if="annonce.nbreDeVus != null"
                                >vu(s) :
                                    <strong>
                                        {{ annonce.nbreDeVus }}
                                    </strong>
                                </small
                                >
                                <small v-else
                                >vu(s) :
                                    <strong>
                                        0
                                    </strong>
                                </small
                                ><br/>
                                <br/>
                                <small class="text-muted">
                                    <inertia-link :href="'/Annonce/' + annonce.id">
                                        Afficher
                                    </inertia-link>
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
        name: "ShowAll",
        props: ["annonces"],
    };
</script>

<style>
</style>
