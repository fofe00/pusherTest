

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('message', require('./components/MessageComponent.vue').default);
const app = new Vue({
    el: '#app',
    data:{
        message:"",
        chat:{
            message:[],
            user:[],
            color:[],

        },
        typing:"",

    },
    watch:{
        message(){
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }
    },
    methods:{
        send(){
           if(this.message!=""){
               console.log(this.message);
               this.chat.message.push(this.message);
               this.chat.color.push('warning');
               this.chat.user.push('you');
               let that=this;
               axios.post('/send', {
                   message: this.message,
               }).then(function (response) {
                       console.log(response);
                   that.message="";
                   }).catch(function (error) {
                       console.log(error);
                   });

           }
        }

    },
    mounted(){
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                console.log(e);
                this.chat.message.push(e.message);
                this.chat.color.push("success");
                this.chat.user.push(e.user.name);
            }).listenForWhisper('typing', (e) => {
                if (e.name!=" "){
                    this.typing="typing ...";
                }else{
                    this.typing=" ";
                }
        });
    }

});
