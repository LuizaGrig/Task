
<template>
    <div>
        Result Skip Results Iframe
        EDIT ON
        <!-- template for the modal component -->
            <transition name="modal">
                <div class="modal-mask" @click="close" v-show="show">
                    <div class="modal-container" @click.stop>
                        <div class="modal-header">
                            <h3>New Post</h3>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">
                                Title
                                <input class="form-control">
                            </label>
                            <label class="form-label">
                                Body
                                <textarea rows="5" class="form-control"></textarea>
                            </label>
                        </div>
                        <div class="modal-footer text-right">
                            <button class="modal-default-button" @click="savePost()">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </transition>



        <!-- app -->
        <div id="app">
            <modal :show="showModal" @close="showModal = false"></modal>
            <button id="show-modal" @click="showModal = true">New Post</button>
        </div>
    </div>
</template>
<script>
// Vue.component('modal', {
//     template: '#modal-template',
//     props: ['show'],
//     methods: {
//         close: function () {
//             this.$emit('close');
//         },
//         savePost: function () {
//             // Some save logic goes here...
//
//             this.close();
//         }
//     }
// });
//
// new Vue({
//     el: '#app',
//     data: {
//         showModal: false
//     }
// });



</script>

<style>
* {
    box-sizing: border-box;
}

.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    transition: opacity .3s ease;
}

.modal-container {
    width: 300px;
    margin: 40px auto 0;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
    font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.text-right {
    text-align: right;
}

.form-label {
    display: block;
    margin-bottom: 1em;
}

.form-label > .form-control {
    margin-top: 0.5em;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.5em 1em;
    line-height: 1.5;
    border: 1px solid #ddd;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}



</style>t>
