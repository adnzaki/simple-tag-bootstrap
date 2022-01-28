new Vue({
    el: '#app',
    data() {
        return {
            message: '',
            note: '',
        }
    },
    methods: {
        greetings() {
            this.message = 'This message called with Vue.js method!'
            this.note = 'This text was changed with Vue.js as well!'
            alert(this.message)
        }
    },
})