<template>
    <div>
        <h2 class="text-center mb-2 ">Task Management System</h2>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <td scope="col"><h5>Task Title</h5></td>
                    <td scope="col"><h5>Task Description</h5></td>
                    <td scope="col"><h5>Assign User</h5></td>
                    <td scope="col"></td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="task in tasks" :key="task.id">
                    <td>{{ task.title }}</td>
                    <td>{{ task.description }}</td>
                    <td>{{ task.userID }}</td>
                <td>

                     <button class="btn btn-danger" data-toggle="button"
                             aria-pressed="false"
                             @click="remove(task.id)" > Delete
                    </button>

                    <button :data-target=" '#myModal' + task.id" data-toggle="button"
                            aria-pressed="false"
                            class="btn btn-success m-1"
                            @click="showModal = true">Edit
                    </button>

                    <router-link :to="{ name: 'admin'}"
                                 class="btn btn-primary"
                                 data-toggle="button"
                                 aria-pressed="false"
                                 autocomplete="off">Back
                    </router-link>
                </td>

                <!--        ShowModal-part-->
                <div class="test">
                    <div :id=" 'myModal' + task.id" class="modal-fade">
                        <transition name="fade">
                            <div v-if="showModal" class="modal-overlay" @click="showModal = false"
                            ></div>
                        </transition>
                    </div>
                    <transition v-if="showModal" name="slide">
                        <div @click.stop>
                            <div v-for="task in tasks">
                                <div class="form-group">
                            <textarea id="title" v-model="form.title" class="form-control p-4"
                                      name="title"
                                      placeholder="Enter Task Title"
                                      type="title">
                            </textarea>

                                </div>
                                <div class="form-group">
                            <textarea id="description" v-model="form.description"
                                      class="form-control p-4"
                                      name="description"
                                      type="description">
                            </textarea>
                                </div>


                                <div class="form-group">
                            <textarea id="assign"
                                      v-model="form.userID"
                                      class="form-control p-4"
                                      placeholder="Assign a User"
                                      type="assign">
                            </textarea>
                                </div>

                                <button
                                    class="btn btn-primary" type="submit" @click="update(task.id)">Submit
                                </button>
                                <button class="btn btn-primary" @click="showModal = false"> Close Modal</button>
                            </div>
                        </div>
                    </transition>
                </div>
            </tr>
                </tbody>
        </table>
        </div>
    </div>
</template>
<script>

export default {
    data(){
        return{
            tasks:[],
            users: [],
            showModal: false,
            form: {
                title: "",
                description: "",
                userID: ""
            },
        }
    },
    methods:{
        update(id){
            axios({
                method: 'put',
                url: '/api/update/' + id,
                data: this.form
            }).then(() => {
                this.showModal = false;
                this.$emit('TaskChanged');
            });
        },
        getList(){
            axios.get('api/task')
                .then(response=>{
                    this.tasks = response.data
                })
                .catch(error => {
                    console.log(error);
                })
        },
        getUsersList(){
            axios.get('api/users')
                .then(response=>{
                    this.users = response.data
                })
                .catch(error => {
                    console.log(error);
                })
        },
        remove(id){
            axios.post('/api/remove/' + id)
                .then(response => {
                    if(response.status == 200){
                        this.$emit('TaskChanged');
                    }
                }).catch(error => {
                console.log(error);
            })
        },
    },
    created() {
        this.getList();
        this.getUsersList();
    }
}
</script>
<style scoped>
.modal-overlay{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    background-color: rgba(0, 0, 0, 0.3);
    border-radius: 16px
}
.fade-enter-active,
.fade-leave-active{
    transition: opacity 1s;
}
.fade-enter,
.fade-leave-to{
    opacity: 0.2;
}
.test{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 99;
    width: 30vw;
    background-color: transparent;
    border-radius: 25px;
    padding: 25px;
    height: 90vh;
}
.btn-primary{
    margin: 5px;
    padding: 5px
}
/*table{*/
/*    border: 1px solid black;*/
/*}*/
/*tr{*
/*    border: 1p'x solid black;*/
/*}*/
/*tbody{*/
/*    border: 1px solid black;*/
/*}*/
.text-center{
    color: #1b4b72;
}
.container{
    padding: 25px;
}
td{
    border: 1px solid black;
}
/*thead{*/
/*    background-color: #ffa500;*/
/*}*/
/*tbody{*/
/*    background-color: #f5f5dc;*/
/*}*/
</style>
