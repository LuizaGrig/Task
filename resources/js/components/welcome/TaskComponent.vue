<template>
    <div>
        <h2 class="text-center mb-2 " >Task Management System</h2>
        <table class="table">
            <tbody>
            <tr>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

                <tr v-for="task in tasks">
                    <td>{{ task.title }}</td>
                    <td>{{ task. description }}</td>
                    <td>{{ task. userID }}</td>
                    <button @click="remove(task.id)" class="trashcan">
                        <i class="fa fa-trash" aria-hidden="true" style="color: #761b18"></i>
                    </button>
                    <div  @click="showModal = true">
                        <button>
                            <i class="fa fa-list-alt" aria-hidden="true" style="color: #556B2F"></i>
                        </button>
                    </div>
                </tr>
            </tbody>


            <router-link :to="{ name: 'admin'}" class="text-primary ml-2">Back</router-link>
        </table>

<!--        ShowModal-part-->

        <div class="test">
            <div class="modal-fade">
                <transition name="fade">
                    <div class="modal-overlay" v-if="showModal" @click="showModal = false"></div>
                </transition>


            </div>

            <transition name="slide" v-if="showModal" >
                <div @click.stop>
                    <div>
                        <div class="form-group" >
                            <textarea type="title" class="form-control" id="title"
                                      aria-describedby="emailHelp"
                                      name="title"
                                      placeholder="Enter Task Title"
                                      v-model="form.title"
                            >   </textarea>

                        </div>

                        <div class="form-group">
                            <textarea type="description" class="form-control"
                                      id="description" placeholder="Description"
                                      name="description"
                                      v-model="form.description"
                            >  </textarea>
                        </div>

                        <div class="form-group">
                            <textarea type="assign"
                                      class="form-control"
                                      id="assign"
                                      placeholder="Assign a User"
                                      v-model="form.userID"
                            ></textarea>
                        </div>

                        <button v-for="task in tasks"
                            type="submit" class="btn btn-primary" @click="update(task.id)">Submit</button>
                        <button class="btn btn-primary" @click="showModal = false"> Close Modal</button>
                    </div>
                </div>
            </transition>


        </div>



    </div>
</template>

<script>

export default {
    data(){
        return{
            tasks:[],
            users: [],
            showModal: true,
            form: {
                title: "",
                description: "",
                userID: ""
            }
        }
    },
methods:{
    // openModal(id){
    //         // console.log(id)
    //     },
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
    update(id){
        axios({
            method: 'get',
            url: '/api/update' + id,
            data: this.form
        }).then(() => {
            this.$router.push({name: "login"});
        });
    }
},
    created() {
        this.getList();
        this.getUsersList();
    }
}
</script>


<style>
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
    height: 60vh;
}
.btn-primary{
    margin: 5px;
    padding: 5px
}

.label{
    color: #222;
    font-size: 16px;
    font-weight: 900;
    margin-bottom: 10px;
}
.text-center{
    color: #1b4b72;
}
</style>
