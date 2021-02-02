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
                            <div class="input-group col-lg-8 mb-4">
                                <div class="input-group-prepend">
                                </div>
                                <h1>Create An Account</h1>
                            </div>

                            <!-- Name -->
                            <div class="input-group col-lg-8 mb-4">
                                <div class="input-group-prepend" :class="{ 'form-group--error': $v.form['name'].$error }">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>

                                <input id="name" class="form-control bg-white border-left-0 border-md" name="name" placeholder="Name"
                                       type="text" v-model="form.name" v-model.trim="$v.form['name'].$model">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div :class="{ 'form-group--error': $v.form['name'].$error }">
                                    <span class="error" v-if="!$v.form['name'].required" style="color: red">Field is required</span>
                                    <span class="error" v-if="!$v.form['name'].minLength" style="color: red">Name must have at least {{$v.form['name'].$params.minLength.min}} letters.</span>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="input-group col-lg-8 mb-4">
                                <div class="input-group-prepend" :class="{ 'form-group--error': $v.form['email'].$error }">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                 <i class="far fa-envelope"></i>
                            </span>

                                <input id="email" class="form-control bg-white border-left-0 border-md" name="email" placeholder="Email Address"
                                       type="email" v-model="form.email" v-model.trim="$v.form['email'].$model">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <span class="error" v-if="!$v.form['email'].required" style="color: red">Field is required</span>
                            </div>

                            <!-- Password -->
                            <div class="input-group col-lg-8 mb-4">
                                <div class="input-group-prepend" :class="{ 'form-group--error': $v.form['password'].$error }">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                                <input id="password" class="form-control bg-white border-left-0 border-md" name="password" placeholder="Password"
                                       type="password" v-model="form.password" v-model.trim="$v.form['password'].$model">
                                </div>
                                </div>

                            <div class="col-lg-8">
                                <span class="error" v-if="!$v.form['password'].required" style="color: red">Field is required</span>
                                <span class="error" v-if="!$v.form['password'].minLength" style="color: red">Name must have at least {{$v.form['password'].$params.minLength.min}} letters.</span>

                            </div>

                            <!-- Login Button -->
                            <div class="input-group col-lg-8 mb-4" @click="formSubmit">
                                <button class="btn btn-primary btn-block py-2" >Login</button>
                            </div>


                            <!-- Already Registered -->
                            <div class="text-center w-100 col-lg-8 mb-4">
                                <p class="text-muted font-weight-bold">Already Registered?
                                    <router-link :to="{ name: 'login'}" class="text-primary ml-2">Sign In</router-link>
                                </p>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { required, minLength} from 'vuelidate/lib/validators'
export default {
    data() {
        return {
            form:{
                name: '',
                email: '',
                password: '',
                isAdmin:false,
            }
        }
    },
    validations:{
        form:{
            name:{
                required,
                minLength: minLength(3)
            },
            email: {
                required,
            },
            password:{
                required,
                minLength: minLength(4)
            }
        }
    },
    methods: {
        formSubmit() {
            axios({
                method: 'post',
                url: '/api/registration',
                data:this.form
            }).then(() => {
                this.$router.push({name: "user"});
            });
        }
    }
}
</script>

