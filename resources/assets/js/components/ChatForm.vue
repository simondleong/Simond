// resources/assets/js/components/ChatForm.vue

<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user', 'chat'],

        data() {
            return {
                newMessage: ''
            }
        },

        created() {
            this.sendChatData();
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    sender: this.user,
                    chat: this.chat,
                    message: this.newMessage
                });

                this.newMessage = ''
            },

            sendChatData() {
                this.$emit('chatdata', {
                    chat: this.chat
                });
            }
        }
    }
</script>