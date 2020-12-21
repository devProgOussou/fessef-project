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
                            <th scope="col">contenu</th>
                            <th scope="col">Fichier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr :key="feusseul.id" v-for="feusseul in feusseuls">

                            <td>{{feusseul.titre}}</td>

                            <td>{{ feusseul.contenu | truncate(27) }}</td>
                            <td>
                                <img v-if="feusseul.extension == 'jpeg' || feusseul.extension == 'jpg' || feusseul.extension == 'png'" :src="'uploads/'+feusseul.file" height="200px" width="255px" alt=""/>
                                <video controls v-if="feusseul.extension == 'mp4'" height="200px" width="255px">
                                    <source :src="'/uploads/videos/' +feusseul.file" type="video/mp4">
                                </video>
                            </td>
                            <td>
                                <inertia-link :href="'/Feusseul/Show/'+feusseul.id" class="btn btn-primary btn-sm">
                                    Afficher
                                </inertia-link>
                            </td>
                            <td>
                                <inertia-link :href="'/Feusseul/Edit/'+feusseul.id" class="btn btn-warning btn-sm">
                                    Modifier
                                </inertia-link>
                            </td>
                            <td>
                                <inertia-link :href="'/Feusseul/Delete/'+feusseul.id" class="btn btn-danger btn-sm">
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
        props: ['feusseuls'],
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
