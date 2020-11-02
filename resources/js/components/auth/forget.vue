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
                        <p class="login-box-msg">Forget Password</p>

                        <form action="../../index3.html" method="post">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Exiting Email" v-model="form.email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <!-- /.col -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>




                        <p class="mb-0">
                            <router-link to="/" class="text-center">Back to login</router-link>

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
                    email:null

                },
                errors:{}
            }
        },

    }

</script>
<style>


</style>
