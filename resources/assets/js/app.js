
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm'));

const app = new Vue({
    el: '#app',

    data: {
        messages: [],
        chat: {}
    },

    created() {
        // this.fetchMessages();
    },

    methods: {
        setChatData(chat) {
            this.chat = chat.chat;
            this.fetchMessages();
            this.listenToChannel();
        },

        fetchMessages() {
            let url = '/messages/' + this.chat.id;
            axios.get(url)
                .then(response => {
                    // handle success
                    this.messages = response.data;
                    this.moveToBottom();
                }).catch(function (error) {
                // handle error
                console.log(error);
            });
        },

        addMessage(message) {
            let url = '/messages/' + this.chat.id;
            axios.post(url, message)
                .then(response => {
                    // handle success
                    this.messages.push(message);
                    this.moveToBottom();
                }).catch(function (error) {
                // handle error
                console.log(error);
            });
        },

        listenToChannel() {
            let channel = Echo.channel('chat.' + this.chat.id)
                .listen('MessageSent', (e) => {
                    this.messages.push({
                        sender: e.user,
                        chat: e.chat,
                        message: e.message.message
                    });
                    this.moveToBottom();
                });
        },

        moveToBottom() {
            let chatPanel = document.getElementById('chat-panel');
            chatPanel.scrollTop = chatPanel.scrollHeight - 100;
        }
    }

});
