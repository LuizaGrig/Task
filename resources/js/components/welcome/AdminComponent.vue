<template>
    <div>
        <h1 class="text-center" style="color: #06567B">Create a New Task</h1>
        <div class="container">
            <div class="row py-5 mt-3 align-items-center">
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
                        <!--                        Assign User-->

                        <div class="input-group col-lg-8 mb-4">
                            <div class="input-group-prepend">
                            </div>
                            <multiselect
                                v-model="userIds"
                                :multiple="true"
                                v-bind:options="users"
                                label="name"
                                track-by="id"
                                @input="updateApprovers"
                                placeholder="Assign a User">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
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
</template>


<script>
import Multiselect from 'vue-multiselect'

export default {
    components: { Multiselect },
    data() {
        return {
            users: [],
            form:{
                title: "",
                description: "",
                userID: ""
            },
            userIds: [],
            approvers: [],

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
                })
                .catch(error => {
                    console.log(error);
                })
        },
        updateApprovers(users) {
            let approvers = [];

            users.forEach((user) => {
                approvers.push(this.userIds);
            });
            this.approvers = JSON.parse;

            console.log(typeof (this.approvers));
        },
        submit() {
            console.log(this.userID);
            axios({
                method: 'post',
                url: '/api/admin',
                data: {userID: this.approvers, title: this.form.title, description: this.form.description}
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

<style src="vue-multiselect/dist/vue-multiselect.min.css">
