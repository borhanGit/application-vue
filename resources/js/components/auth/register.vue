<template>
<div>
    <center>
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Register a new account</p>

                    <form @submit.prevent="signup">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Name" v-model="form.name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <small class="text-danger" style="color:red;" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" v-model="form.email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <small class="text-danger" style="color:red;" v-if="errors.email">{{errors.email[0]}}</small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <small class="text-danger" style="color:red;" v-if="errors.password">{{errors.password[0]}}</small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Re type password" v-model="form.password_confirmation">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- /.col -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>




                    <p class="mb-0">
                        <router-link to="/" class="text-center">Already have an account!</router-link>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </center>
</div>
</template>
<script>
    export default {
        created() {
            if(User.loggedIn()){
                this.$router.push({name: 'home'})
            }
        },
        data()
        {
            return {
                form:{
                    name:null,
                    email:null,
                    password:null,
                    password_confirmation:null
                },
                errors:{}
            }
        },
        methods:{
            signup()
            {
                axios.post('/api/auth/signup',this.form)
                    .then(res => {
                        User.responseAfterLogin(res)
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        })
                        this.$router.push({ name: 'home'})
                    })
                    .catch(error => this.errors = error.response.data.errors)

            }
        }
    }

</script>
<style>

</style>
