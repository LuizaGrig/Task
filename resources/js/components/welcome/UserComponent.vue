<template>
    <div>
        <h2 class="text-center mb-2 ">Task Management System</h2>
        <div class="container cont pt-5">
            <table class="table">
                <thead>
                <tr>
                    <td scope="col"><h5>Task Title</h5></td>
                    <td scope="col"><h5>Task Description</h5></td>
                    <td scope="col"><h5>Assign User</h5></td>
                </tr>
                <tr v-for="task in tasks">
                    <td>{{ task.title }}</td>
                    <td>{{ task.description }}</td>
                    <td>{{ task.userID }}</td>
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</template>



<script>
export default{
    data(){
        return{
            tasks:[]
        }
    },
    created() {
        this.getTasksList();
    },
    methods:{
        getTasksList(){
            console.log(this.tasks)
            axios.get('api/tasksList' )
                .then(response=>{
                    this.tasks = response.data
                }).catch(error => {
                    console.log(error);
                })
        }
    },
}
</script>




<style scoped>
.cont{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
td{
    text-align: center;
}
h5{
    text-align: center;
}
</style>
