<template>
    <div>
        <h2 class="text-center pb-5">User Page</h2>
        <table class="table">
            <thead>
            </thead>
            <tbody>
            <tr>
                <td scope="col"><h4>Title</h4></td>
                <td scope="col"><h4>Description</h4></td>
            </tr>
            <tr v-for="task in tasks">
                <td>{{ task.title }}</td>
                <td>{{ task. description }}</td>

            </tr>
            </tbody>
            <router-link :to="{ name: 'admin'}" class="text-primary ml-2">Back</router-link>
        </table>
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
            axios.get('api/tasksList')
                .then(response=>{
                    this.tasks = response.data
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

}



</script>
