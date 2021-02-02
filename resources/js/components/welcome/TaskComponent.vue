<template xmlns="http://www.w3.org/1999/html">
    <div>
        <h2 class="text-center pb-5">Task Management System</h2>
        <table class="table">
            <thead>
            </thead>
            <tbody>
            <tr class="text-center">
                <td scope="col"><h4>Title</h4></td>
                <td scope="col"><h4>Description</h4></td>
                <td scope="col"><h4>Assign to</h4></td>
            </tr>
                <tr v-for="task in tasks">
                    <td>{{ task.title }}</td>
                    <td>{{ task. description }}</td>
                    <td>{{ task. assign }}</td>
                    <button @click="remove(task.id)" class="trashcan">
                        <i class="fa fa-trash" aria-hidden="true" style="color: #761b18"></i>
                    </button>



                    <!--                    ShowModal-->


                    <button class='button' @click="showModal = true">
                        <i aria-hidden="true" class="fa fa-list" style="color: #1d643b"></i>
                    </button>
                    <div v-if="showModal" class="modal-overlay" @click="showModal = false"></div>
                    <div v-if="showModal" class="modal">
                        <h1>modal text</h1>
                        <button class="btn-close" @click="showModal = false">Close</button>
                        <button>Edit</button>
                    </div>

                </tr>
            </tbody>
            <router-link :to="{ name: 'admin'}" class="text-primary ml-2">Back</router-link>
        </table>
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
                assign: ""
            }
        }
    },
methods:{
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
        console.log('test')
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
                    $('#addNew').modal('hide');
                }
            }).catch(error => {
            console.log(error);
        })
    },
    update(id){
       axios.post('/api/update/' + id)
        .then(response => {
            if(response.status == 200){
                this.$router.push({name: 'update'})
            }
        }).catch(error => {
            console.log(error);
       })
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
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 98;
    background-color: rgba(0, 0, 0, 0.3 );

}
.modal{
    position:fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 98;

    width: 100%;
    max-width: 400px;
    background-color: #FFF;
    border-radius: 16px
}
.btn-close{
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
}


</style>
