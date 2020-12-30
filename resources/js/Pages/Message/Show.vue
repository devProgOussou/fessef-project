<template>
  <div >
    <FlashMessage :position="'right bottom'"></FlashMessage>
    




    <div class="container-fluid">

    <div class="row">
        <div class="col-md-2 "></div>

        <div class="col-md-8">

            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h4 class="card-title text-center text-dark">Message(s) </h4>
                </div>
            </div>

        </div>

        <div class="col-md-2"></div>
    </div>
</div>

<div class="container-fluid ">
    <div class="row">
        <!-- Debut Liste des messages -->
        <div class="col-lg-4 col-md-4 col-sm-6">

            <div class="card d-none d-sm-block  mb-3 mt-4" id="div1">


                <div class="row no-gutters border-bottom " v-for="item in users" :key="item.id">

                    <div class="col-md-4  text-center  bg-danger ">
                        <inertia-link :href="'/Message/Show/' + item.sender_id">
                        <img
                      v-if="item.avatar != null"
                      :src="'/../uploads/avatar' + item.avatar"
                      alt="sunil"
                          class="card-img shadow-sm"  style="border-radius: 50%;
                        height: 70px; width: 70px;  margin-top : 35px;"/>
                    <img
                      v-else
                      :src="'/../uploads/avatar/avatar.png'"
                      alt="sunil" class="card-img shadow-sm"  style="border-radius: 50%;
                        height: 70px; width: 70px;  margin-top : 35px;"
                    />
                       </inertia-link>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title "><a  class="text-dark"> {{ item.user.name }} </a>
                            </h5>
                            <p class="card-text">  {{ item.messages }}</p>
                            <p class="card-text"><small class="text-muted"> {{ item.created_at }} </small></p>
                        </div>
                    </div>

                </div>



            </div>
            <!-- Fin du card Senders  -->

        </div>
        <!-- Fin de la Liste des messages -->




        <!-- Debut de la liste -->
        <div class="col-lg-5 col-md-5 col-sm-6 ">
            <!-- Debut de la Liste des messages -->
            <div class="card mt-4  mb-4 cardbottom">

                <div v-for="message in messages" :key="message.id" class="card-body incoming_msg" id="madiv" >
   
              <div v-if="message.sender_id == userid">
              
                    <!-- Debut des message  -->
                 <div class="row mb-2  p-2" id="madivv">
                <img
                  v-if="message.avatar != null"
                  :src="
                    '../http://localhost:8000/uploads/avatar/' + message.avatar
                  "
                  alt="sunil"
                />
                <img
                  v-else
                  :src="'http://localhost:8000/uploads/avatar/avatar.png'"
                  alt="sunil" height="20px" width="20px"
                />
              </div>
                <div class="received_msg">
                <div class="received_withd_msg" >
                  <p class="bg-success"  style=" color:white;border-radius: 25px; padding : 10px; ">{{ message.messages }}</p>
                  <!-- <span class="time_date"> 11:01 AM | June 9</span> -->
                </div>
              </div>
               </div>
              <div
              class=" outgoing_msg" 
              v-else
            >
              <div class="sent_msg">
                <p class="bg-danger" style="border-radius: 25px; padding : 10px; "
                            id="contenuee ">{{ message.messages }}</p>
                <!-- <span class="time_date"> 11:01 AM | June 9</span> -->
              </div>
            </div>
                    

                    <!-- Fin des messages -->
                </div>

                <div class="card-footer text-center dflex mt-4">
                    <form @submit.prevent="handleSubmit"  class="form-inline ">

                        
                        <div class="form-group text-center " id="text">
                            <input class="form-control" required
                  v-model="form.messages" width="30" name="message" placeholder="Message..." cols="62"
                                rows="1" />
                        </div>
                        <button type="submit" class="btn btn-danger ml-2">
                            <i class="fa fa-paper-plane " aria-hidden="true"></i>
                        </button>
                    </form>
                </div>

            </div>
            <!-- Fin de la Listes -->

        </div>
        <!-- Fin de la liste -->

        <!-- Debut Liste des messages -->
        <div class="col-lg-3 col-md-3 col-sm-6">
            <!-- Debut du card Senders -->
            <div class="card d-none d-sm-block mt-4">


                <form @submit.prevent="handleUpdate">
                 <ul v-for="item in messreceiver" :key="item.id" class="list-group list-group-flush text-left">
                    <li  class="list-group-item"> Envoyé par
                        <inertia-link :href="'/Message/Show/' + item.sender_id">
                            <b>
                                :  {{ item.user.name }} <inertia-link :href="'/Message/Update/'+item.id" style="text-decoration:none" class="btn btn-danger btn-sm">
                                    Supprimer
                                </inertia-link> 

                            </b>
                        </inertia-link>
                        
                        <p class="card-text">
                            <small class="text-muted">
                                {{ item.created_at }}
                            </small>
                        </p>
                    </li>
                </ul>
          </form>

            </div>
            <!-- Fin du card Senders  -->

        </div>
        <!-- Fin de la Liste des messages -->

    </div>
</div>
    
     
  </div>
</template>

<script>
export default {
  props: ["messageSend", "messageReceive",'messages','userid','users',"messsender","messreceiver"],
  data() {
    return {
      form: {
        messages: null,
      },
      sender_id: this.sender_id,
      receiver_id: this.receiver_id,
      messageID: this.message_id,
    };
  },
  mounted: function () {
    this.sender_id = this.messages[0].sender_id;
    this.receiver_id = this.messages[0].receiver_id;
    this.messageID = this.messages[0].id;
    console.log(messages);
  },
  methods: {
    handleSubmit() {
      const data = new FormData();

      data.append("messages", this.form.messages);
      data.append("sender_id", this.sender_id);
      data.append("receiver_id", this.receiver_id);
      data.append("messageID", this.messageID);

      this.$inertia.post("/Message/Send", data, {
        onSuccess: () => {
          this.form.messages = null;
        },
      });
    },
    handleUpdate() {
      this.$inertia.post('/Message/Update/'+this.messages[0].id);
    },
  },

};
</script>

<style scoped>
.container {
  max-width: 700px;
  margin: auto;
}
img {
  max-width: 100%;
}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%;
  border-right: 1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac {
  margin: 20px 0 0;
}

.recent_heading {
  float: left;
  width: 40%;
}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
  padding: 0px;
}
.headind_srch {
  padding: 10px 29px 10px 20px;
  overflow: hidden;
  border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input {
  border: 1px solid #cdcdcd;
  border-width: 0 0 1px 0;
  width: 80%;
  padding: 2px 0 4px 6px;
  background: none;
}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon {
  margin: 0 0 0 -27px;
}

.chat_ib h5 {
  font-size: 15px;
  color: #464646;
  margin: 0 0 8px 0;
}
.chat_ib h5 span {
  font-size: 13px;
  float: right;
}
.chat_ib p {
  font-size: 14px;
  color: #989898;
  margin: auto;
}
.chat_img {
  float: left;
  width: 80%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people {
  overflow: hidden;
  clear: both;
}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat {
  height: 400px;
  overflow-y: scroll;
}

.active_chat {
  background: #ebebeb;
}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
}
.received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg {
  width: 57%;
}
.mesgs {
  float: left;
  padding: 20px 10px 0 20px;
  width: 50%;
}

.sent_msg p {
  background: none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0;
  color: #fff;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.outgoing_msg {
  overflow: hidden;
  
}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {
  border-top: 1px solid #c4c4c4;
  position: relative;
}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging {
  padding: 0 0 50px 0;
}
.msg_history {
  height: 400px;
  overflow-y: auto;
}
</style>
