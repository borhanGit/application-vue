<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Search Order</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Search Order
                    <router-link to="/order" class="btn btn-sm btn-info" id="add_new"> Today Order</router-link>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <form @submit.prevent="searchDate">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Search by date</label>
                                            <input type="date" required="" class="form-control" v-model="date">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form @submit.prevent="categoryInsert">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Search by month</label>
                                            <select multiple class="form-control" id="exampleFormControlSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                    </div>

                </div>

            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Order  Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">

                            <br>
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">

                                <thead>
                                <tr >
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Vat</th>
                                    <th>Total</th>
                                    <th>Pay</th>
                                    <th>Due</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr v-for="order in orders">
                                    <td>{{ order.name }}</td>
                                    <td>{{ order.qty }}</td>
                                    <td>{{ order.sub_total }}</td>
                                    <td>{{ order.vat }}</td>
                                    <td>{{ order.total }}</td>
                                    <td>{{ order.pay }}</td>
                                    <td>{{ order.due }}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        mounted(){
            if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },
        data(){
            return{
                date:'',
                orders:{},
                errors:{},
            }
        },


        methods:{
            searchDate()
            {
                var data = {date:this.date}
                axios.post('/api/search/order/',data)
                    .then(({data}) => (this.orders = data))
                    .catch(error => this.errors = error.response.data.errors)
            }
            // searchDate(){
            //     axios.post('/api/search/order/',date)
            //         .then(() => {
            //             // this.$router.push({ name: 'category' })
            //             // Notification.success()
            //         })
            //         .catch(error => this.errors = error.response.data.errors)
            //
            // },


        }


    }




</script>

<style>

    #add_new{
        float: right;
    }

</style>
