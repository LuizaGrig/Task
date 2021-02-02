<template>
    <div>
        <div class="container">
            <div class="row py-5 mt-4 align-items-center">
                <div class="col-md-4 pr-lg-6 mb-3 mb-md-0">
                    <img alt="" class="img-fluid mb-2 d-none d-md-block"
                         src="./../images/img2.jpg">
                </div>
                <div class="col-md-7 col-lg-6 ml-auto">

                        <div class="row">
                            <!-- Email -->
                            <div class="input-group col-lg-8 mb-4">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="far fa-envelope"></i>
                            </span>
                                </div>
                                <input id="email" class="form-control bg-white border-left-0 border-md" name="email" placeholder="Email Address"
                                       type="email" v-model="form.email">
                            </div>

                            <!-- Password -->
                            <div class="input-group col-lg-8 mb-4">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                                </div>
                                <input id="password" class="form-control bg-white border-left-0 border-md" name="password" placeholder="Password"
                                       type="password" v-model="form.password">
                            </div>

                            <!-- SIgn In Button -->
                            <div class="input-group col-lg-8 mb-4">
                                <button class="btn btn-primary btn-block py-2" @click="login()">Sign In</button>
                            </div>
                        </div>

                        <!-- DoYouRegister -->
                        <div class="text-center w-100 col-lg-8 mb-4">
                            <p class="text-muted font-weight-bold">Do you register?
                                <router-link :to="{ name: 'registration'}" class="text-primary ml-2">Register
                                </router-link>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form:{
                email: '',
                password: '',
                isAdmin:false
            }
        }
    },
    methods: {
        login() {
            axios({
                method: 'post',
                url: '/api/login',
                data: this.form
            }).then(() => {
                this.$router.push({name: "admin"});
            });
        }
    },
}

</script>


