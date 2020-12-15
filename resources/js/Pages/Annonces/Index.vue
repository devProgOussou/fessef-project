<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"></li>
                    </ul>

                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">titre</th>
                            <th scope="col">description</th>
                            <th scope="col">contenu</th>
                            <th scope="col">image</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr :key="annonce.id" v-for="annonce in annonces">

                            <td>{{annonce.titre}}</td>
                            <td>{{annonce.description}}</td>

                            <td>{{ annonce.contenu | truncate(27) }}</td>
                            <td>
                                <img :src="'uploads/'+annonce.image" height="200px" width="255px"/>
                            </td>
                            <td>
                                <inertia-link :href="'/Annonces/Show/'+annonce.id" class="btn btn-primary btn-sm">
                                    Afficher
                                </inertia-link>
                            </td>
                            <td>
                                <inertia-link :href="'/Annonce/Edit/'+annonce.id" class="btn btn-warning btn-sm">
                                    Modifier
                                </inertia-link>
                            </td>
                            <td>
                                <inertia-link :href="'/Annonce/Delete/'+annonce.id" class="btn btn-danger btn-sm">
                                    Supprimer
                                </inertia-link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['annonces'],
        watch: {
            title: {
                immediate: true,
                handler(title) {
                    document.title = title
                },
            },
        },
    }
</script>
