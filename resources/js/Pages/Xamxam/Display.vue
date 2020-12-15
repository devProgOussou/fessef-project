<template>
    <div>
        <div class="container">
            <div class="row">
                <inertia-link class="m-5" href="/xamxam/create">
                    <button class="btn btn-dark">Creer</button>
                </inertia-link>
                <inertia-link class="m-5" href="/xamxam">
                    <button class="btn btn-primary">Voir</button>
                </inertia-link>
                <div class="col-md-12">
                    <table class="table table-dark">
                        <tr>
                            <td>ID</td>
                            <td>TITRE</td>
                            <td>TAGS</td>
                            <td>IMAGE</td>
                            <td>CONTENU</td>
                            <td>ACTIONS</td>
                        </tr>
                        <tr v-for="xamxam in xamxams" :key="xamxam.id">
                            <td>{{ xamxam.id }}</td>
                            <td>{{ xamxam.titre }}</td>
                            <td>{{ xamxam.tags | truncate(20) }}</td>
                            <td><img :src="'http://mkeita.defarsci.com/fessef/public/uploads/'+xamxam.image" height="200px" width="255px"></td>
                            <td>{{ xamxam.contenu | truncate(27) }}</td>
                            <td>
                                <inertia-link :href="'http://mkeita.defarsci.com/fessef/public/xamxam/show/'+xamxam.id">
                                    <button class="btn btn-info btn-sm btn-round">Afficher</button>
                                </inertia-link>
                                <inertia-link :href="'http://mkeita.defarsci.com/fessef/public/xamxam/edit/'+xamxam.id">
                                    <button class="btn btn-sm btn-warning btn-round">Editer</button>
                                </inertia-link>
                                <inertia-link :href="'http://mkeita.defarsci.com/fessef/public/xamxam/destroy/'+xamxam.id">
                                    <button class="btn btn-sm btn-danger btn-round">Supprimer</button>
                                </inertia-link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Xamxam",
        props:['xamxams'],
    }
</script>

<style>

</style>
