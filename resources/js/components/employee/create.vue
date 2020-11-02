<template>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Insert a new employee</h3>
                    </div>

                    <form @submit.prevent="employeeInsert" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputName">Full Name</label>
                                        <input type="text" v-model="form.name"  class="form-control" id="exampleInputName" placeholder="Full Name" required>
                                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email"  v-model="form.email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" required>
                                        <small class="text-danger" v-if="errors.email">{{ errors.name[0] }}</small>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputAddress">Address</label>
                                        <input type="text" v-model="form.address"  class="form-control" id="exampleInputAddress" placeholder="Address" required>
                                        <small class="text-danger" v-if="errors.address">{{ errors.name[0] }}</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputSalary">Salary</label>
                                        <input type="text" v-model="form.salary" class="form-control" id="exampleInputSalary" placeholder="Salary" required>
                                        <small class="text-danger" v-if="errors.salary">{{ errors.name[0] }}</small>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNID">NID</label>
                                        <input type="text" v-model="form.nid"  class="form-control" id="exampleInputNID" placeholder="NID Number" required>
                                        <small class="text-danger" v-if="errors.nid">{{ errors.name[0] }}</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputDate">Joining Date</label>
                                        <input type="date" v-model="form.joining_date"  class="form-control" id="exampleInputDate" placeholder="Joining Date" required>
                                        <small class="text-danger" v-if="errors.joining_date">{{ errors.name[0] }}</small>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputfile">Image</label>
                                        <input type="file"   class="form-control" id="exampleInputfile" @change="onFileselected">
                                        <small class="text-danger" v-if="errors.photo">{{ errors.name[0] }}</small>
                                    </div>
                                    <div class="col-md-6">
                                        <img :src="form.photo" alt="no file" style="height:40px; width:40px;">

                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</template>
<script>
    export default {
        created() {
            if(!User.loggedIn()){
                this.$router.push({name: '/'})
            }
        },
        data()
        {
            return {
                form:{
                    name:'',
                    email:'',
                    address:'',
                    salary:'',
                    nid:'',
                    joining_date:'',
                    photo:'',

                },
                errors:{},
            }
        },
        methods:{
            onFileselected(event){
                let file=event.target.files[0];
                if (file.size > 1048770){
                    Notification.image_validation()

                }
                else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result

                    };
                    reader.readAsDataURL(file);
                }


            },
            employeeInsert(){
                axios.post('/api/employee/',this.form)
                .then(()=>{
                    this.$router.push({ name: 'employee'})
                    Notification.success()
                })
                .catch(error =>this.errors=error.response.data.errors)

            }

        }

    }

</script>
<style>

</style>
