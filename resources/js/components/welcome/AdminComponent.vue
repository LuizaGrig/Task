<template>
    <div>
        <h1 class="text-center" style="color: #06567B">Create a New Task</h1>
        <div class="container">
            <div class="row py-5 mt-4 align-items-center">
                <div class="col-md-6 pr-lg-12 mb-12 mb-md-0">
                    <img alt="" class="img-fluid mb-2 d-none d-md-block"
                         src="./../views/images/img4.jpg">
                </div>
                <div class="col-md-7 col-lg-6 ml-auto">
                    <div class="row">
                        <div class="input-group col-lg-8 mb-4">
                            <div class="input-group-prepend">
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="input-group col-lg-8 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </span>
                            </div>
                            <input id="title" class="form-control bg-white border-left-0 border-md"
                                   name="title"
                                   placeholder="Enter a Task Title" type="text" v-model="form.title">
                        </div>


                        <!-- Description -->
                        <div class="input-group col-lg-8 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                 <i class="fa fa-list"></i>
                            </span>
                            </div>
                            <textarea id="description"  class="form-control bg-white border-left-0 border-md"
                                       name="description"
                                       placeholder="Enter a Task's Description" type="description" v-model="form.description">
                            </textarea>

</div>
                        <!-- Assign -->
                        <div class="input-group col-lg-8 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            </div>
                            <div>

<!--                                Multiselect-->
                                <multiselect id="assign"
                                             v-model="form.assign"
                                             :options="options"
                                             :clear-on-select="false"
                                             :close-on-select="false"
                                             :multiple="true"
                                             :preselect-first="true" :preserve-search="true"
                                             class="form-control bg-white border-left-0 border-md"
                                             name="value" track-by="name">
                                    <option v-for="option in options"> {{ option.name }}</option>
                                </multiselect>

                        </div>

                        <!-- Login Button -->
                        <div class="input-group col-lg-8 mb-4" >
                            <button class="btn btn-primary btn-block py-2" @click="submit">Submit</button>
                        </div>
                        <div class="input-group col-lg-8 mb-4" >
                            <button class="btn btn-primary btn-block py-2" @click="logout">Logout</button>
                        </div>
                        <div class="text-center w-100 col-lg-8 mb-4">
                            <p class="text-muted font-weight-bold">View the other tasks!
                                <router-link :to="{ name: 'task'}" class="text-primary ml-2">View</router-link>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


</div>
        </div>
    </div>
</template>


<script>
import Multiselect from 'vue-multiselect'

export default {
    components: Multiselect,
    data() {
        return {
            users: [],
            options: [],
            form:{
                title: "",
                description: "",
                assign: ""
            },

        }
    },
    created() {
        this.getUsersList();
    },
    methods: {
        getUsersList(){
            axios.get('api/users')
                .then(response=>{
                    this.users = response.data
                    this.options = response.data
                })
                .catch(error => {
                    console.log(error);
                })
        },

        submit() {
            axios({
                method: 'post',
                url: '/api/admin',
                data: this.form
            }).then(() => {
                this.$router.push({name: "task"});
            });
        },
        logout(){
            axios.post('api/logout').then(()=>{
                this.$router.push({name: 'login'})
            })
        }
    }

}
</script>


