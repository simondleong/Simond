// resources/assets/js/components/ChatMessages.vue

<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.sender.first_name }}
                        {{ message.sender.last_name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['messages']
    };
</script>