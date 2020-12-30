<template>

    <div class="container-fluid ">
        <div class="row my-2">
            <div class="col-md-2"></div>

            <div class="col-md-8 m-4">

                <div class="card " id="">

                    <img  :src="'/uploads/'+this.xamxam[0].image" class="card-img-top img-fluid card-infoImgg" alt="...">


                    <div class="card-body">
                        <h5 class="card-title text-center"><a class="text-dark" href="">
                                <strong>{{ this.xamxam[0].titre }}</strong>
                            </a></h5>
                        <p class="text-center text-muted">{{ this.xamxam[0].created_at|timeformat }} </p>
                        <p class="card-text">
                        {{ this.xamxam[0].contenu }}
                        </p>
                        <p>
                        <small> Tag : {{ this.xamxam[0].tags }}</small>
                    </p>
                    </div>
                    <div class="card-footer text-muted text-center">

                        <p class="float-left d-inline  ml-2">
                            <b>

                            </b>
                        </p>
                        <p class="text-center d-inline ml-2">
                            <a class="text-muted" href=" # ">

                            </a>
                        </p>
                        <p class="float-right d-inline mr-2">
                            <a class="text-primary" href="#">

                            </a>
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-2"></div>
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
