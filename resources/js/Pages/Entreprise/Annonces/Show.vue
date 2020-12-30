<template>
    <div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
    
            </div>
            <div class="col-md-8">
                <div class="card mb-3 mt-4">
                    <div class="card-header" style="height: 55px; padding : 5px">
                        <img :src="'/uploads/'+this.annonce[0].image"  class="rounded-circle border border-warning d-inline"
                             alt="user" width="40px" height="40px">
                        <div class="text-muted  d-inline ">By :<small>Ouz</small></div>
                        <inertia-link :href="''" class="float-right mr-2 " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-ellipsis-h mt-3 text-secondary "></i></inertia-link>
                        <!-- debut du list dropdown -->
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
                            <a class="dropdown-item text-danger  delete" :href="''">Delete</a>
                            <a class="dropdown-item" :href="''">Modifier</a>
    
                            <a class="dropdown-item" :href="''">Signalez</a>
                        </div>
    
                        <!-- fin du list -->
                        <p style="margin-top: -32px;"></p> <small class="text-muted ml-5"></small> </p>
                    </div>
                        <div class="card-body ">
                       <!--  <h5 class="card-title text-center"> -->
                           <img :src="'/uploads/'+this.annonce[0].image" alt="" height="500px" width="700px">
                        <!-- </h5> -->
                        <p class="card-text text-center"><strong>{{ this.annonce[0].titre }}</strong></p>
                        <p class="card-text text-center">{{ this.annonce[0].description || truncate(27) }}</p>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <p class="float-left d-inline  ml-2"></p>
    
                        <p class="text-center d-inline ml-2">
    
                      <!--   <form>
    
                            <button type="submit" class="btn btn-danger">
                                Annulez
                            </button>
    
                            <button type="submit" class="btn btn-primary ">
                                Postulez
                            </button>
    
                            <p class="text-center d-inline ml-2">
                                <button disabled="disabled" name=""
                                    class="btn btn-primary ">Postulez</button>
                            </p>
    
                        </form> -->
    
    
    
                        </p>
                        <p class="float-right d-inline mr-2 total">0</p>
    
    
                    </div>
                </div>
    
                <!-- Debut card pour voir les personnes qui sont interrest du post-->
    
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img :src="'/uploads/'+this.annonce[0].image"  class="card-img img-fluid" alt="annonce-job"
                                    style="width: 50px; height : 50px; border-radius : 50%">
                                <p>
                                    <a class="btn btn-sm btn-danger text-white m-2" data-toggle="modal"
                                        data-target="#exampleModal">
    
                                    </a>
                                </p>
                            </div>
                        </div>
    
                    </div>
                    <div class="card-footer text-muted text-center">
                        Nombre de vue(s)
                    </div>
    
                </div>
    
                <!-- modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Message </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <input type="hidden" name="receiver_id" value="">
                                </form>
                                    <div class="form-group">
                                        <textarea class="form-control form-control" name="message" id="textarea" cols="30"
                                            rows="3" placeholder="Message...."></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Envoyez</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- modal -->
    
    
    
                <!-- Fin card stat -->
    
            </div>
    
            <div class="col-md-2">
    
            </div>
        </div>
    </div>





       <!--  <div class="container">
            <div class="row">
                <inertia-link class="m-5" href="/Annonce">
                    <button class="btn btn-primary">Voir</button>
                </inertia-link>
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
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        name: "Show",
        props:['annonce','entreprise'],
    }
</script>

<style>

</style>
