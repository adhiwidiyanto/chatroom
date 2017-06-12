require('./bootstrap');

window.Vue = require('vue');

Vue.config.devtools = true

Vue.component('chat', require('./components/chat/Chat.vue'));
Vue.component('chat-messages', require('./components/chat/Messages.vue'));
Vue.component('chat-message', require('./components/chat/Message.vue'));
Vue.component('chat-users', require('./components/chat/Users.vue'));

const app = new Vue({
    el: '#app'
});
