<template>
    <div>
        <center>
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>Login</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Login</p>

                    <form @submit.prevent="login">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" v-model="form.email" >

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <small class="text-danger" style="color:red;" v-if="errors.email">{{errors.email[0]}}</small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password" >

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <small class="text-danger" style="color:red;" v-if="errors.password">{{errors.password[0]}}</small>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>



                    <p class="mb-1">
                        <router-link to="/forget" class="text-center">I forgot my password</router-link>
                    </p>
                    <p class="mb-0">
                        <router-link to="/register" class="text-center">Register a new membership</router-link>

                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        </center>
        </div>

</template>
<script type="text/javascript">

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
                email:null,
                password:null
            },
            errors:{}
        }
    },
    methods:{
            login()
        {
                axios.post('/api/auth/login',this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
                    this.$router.push({ name: 'home'})
                })
                .catch(error => this.errors = error.response.data.errors)
                .catch(
                    Toast.fire({
                        icon: 'warning',
                        title: 'Invalid Email or Password'
                    })
                )

        }
    }
}

</script>
<style>



</style>
