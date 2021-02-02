<template>
    <div>
        <h1>Examples page</h1>
        <div >
            <p> Original message: {{ message }} </p>
            <p> Computed message: {{ reverseMessage ()}}</p>
            <p>Date: {{ now }}</p>
        </div>
        <input v-model="message">
        <div class="container">
        </div>

        <ul>
            <li v-for="item in items" > {{ item.name }}</li>
        </ul>

    </div>
</template>

<script>
export default {
    data(){
        return{
            message: 'Hello world',
            items: [
                {name: 'Telephone'},
                {name: 'TV'}
            ]
        }

    },
    methods: {
        reverseMessage: function(){
            return this.message.split(''). reverse(). join('')
        }
    },
    computed: {
        now: function (){
            return Date.now()
        }
    }
}
</script>
