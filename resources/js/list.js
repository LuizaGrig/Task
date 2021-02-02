new Vue({
    el: '#app',

    ready: function() {
        this.fetchMessages();
    },

    methods: {
        fetchMessages: function() {
            this.$http.get('/api/welcome', function(messages) {
                alert(messages);
                this.$set('messages', messages);
            });
        }
    }
});
