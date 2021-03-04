<template>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="p-2 flex-grow-1 bd-highlight">Buyer Information</h3>
            <div class="p-2 bd-highlight">
                <button type="button" @click="newModel"
                        class="btn btn-info" data-toggle="modal"
                        data-target="#modal-create">
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body overflow-auto" style="height: 500px;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 100px;">Code</th>
                    <th>Buyer Name</th>
                    <th>Street</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="buyer in buyers" :key="buyer.id">
                    <td style="width: 100px;">{{buyer.id}}</td>
                    <td style="width: 150px;">{{buyer.name}}</td>
                    <td>{{buyer.address}}</td>
                    <td>{{buyer.country_id}}</td>
                    <td>{{buyer.phone}}</td>
                    <td>{{buyer.email}}</td>
                    <td>{{buyer.buyer_type}}</td>
                    <td style="width: 150px;">
                        <a type="button"
                           class="btn btn-primary" data-toggle="modal" 
                           @click="editModal(buyer)"
                           data-target="#modal-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger"
                         @click="deleteBuyer(buyer)"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>Code</th>
                    <th>Buyer Name</th>
                    <th>Streed</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /Buyer  Create And Update Modal Start -->
        <div class="modal fade" id="modal-create">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-show="!editmode">Buyer Add New </h4>
                        <h4 class="modal-title" v-show="editmode">Update Buyer </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateBuyer() : createBuyer()">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Buyer Name</label>
                                        <input type="text"
                                               v-model="buyersForm.name"
                                               class="form-control"
                                               placeholder="Buyer Name Entry"
                                               :class="{ 'is-invalid': buyersForm.errors.has('name') }">
                                        <has-error :form="buyersForm" field="name"></has-error>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Type</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.buyer_type"
                                            placeholder="Enter ...">
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Street With HL No</label>
                                        <input type="text"
                                               v-model="buyersForm.address"
                                               class="form-control"
                                               placeholder="Street With HL No Entry"
                                               :class="{ 'is-invalid': buyersForm.errors.has('address') }">
                                        <has-error :form="buyersForm" field="address"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Area</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.area"
                                            placeholder="Area Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>City</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.city"
                                            placeholder="City Enter ...">
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>State</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.state"
                                            placeholder="State Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select
                                                v-model="buyersForm.country_id"
                                                class="form-control select2"
                                                style="width: 100%;">
                                            <option v-for="country in countries"
                                                    v-bind:value="country.id"
                                                    selected="selected">{{country.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.phone"
                                            placeholder=" Phone Enter ...">
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.fax"
                                            placeholder="Fax Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.zip_code"
                                            placeholder="Zip Code Enter ...">
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text"
                                               v-model="buyersForm.email"
                                               class="form-control"
                                               placeholder="Email Entry"
                                               >
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Web</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="buyersForm.web"
                                            placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" v-show="!editmode" class="btn btn-primary">Save changes</button>
                            <button type="submit"  v-show="editmode" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /Buyer Create And Update Modal End -->
    </div>
    <!-- /.card -->
</template>

<script>
    export default {
        data(){
            return{
                editmode:false,
                buyers:[],
                countries:[],
                buyersForm: new Form({
                    id:'',
                    name:'',
                    address:'',
                    area:'',
                    city:'',
                    state:'',
                    phone:'',
                    fax:'',
                    zip_code:'',
                    email:'',
                    web:'',
                    buyer_type:'',
                    country_id:'',

                })
            }
        },
        methods:{
            newModel(){
                this.editmode = false;
                this.buyersForm.reset();
                $('#modal-create').modal('show');

            },
            editModal(buyer){
                this.editmode = true;
                this.buyersForm.reset();
                $('#modal-create').modal('show');
                this.buyersForm.fill(buyer);
            },
            loadeBuyer(){
                axios.get("/api/buyerInfo").then(response => {
                    this.buyers = response.data;

                });
            },
            loadeCountry(){
                axios.get("/api/country").then(response => {
                    //console.log(response.data);
                    this.countries = response.data;

                });
            },
            createBuyer(){
                this.buyersForm.post('/api/buyerInfo')
                    .then(
                        ({ data }) => {
                            this.buyersForm.name='';
                            this.buyersForm.address='';
                            this.buyersForm.area='';
                            this.buyersForm.city='';
                            this.buyersForm.state='';
                            this.buyersForm.phone='';
                            this.buyersForm.fax='';
                            this.buyersForm.zip_code='';
                            this.buyersForm.email='';
                            this.buyersForm.web='';
                            this.buyersForm.buyer_type='';
                            this.buyersForm.country_id='';

                            $('#modal-create').modal('hide');
                            this.loadeBuyer();
                        })
                         .catch(error => {
                               console.log(error.response)
                          });
            },
            updateBuyer(){
                this.buyersForm.put(`/api/buyerInfo/`+this.buyersForm.id)
                    .then(()=>{
                        console.log('success');
                    })
                    .catch(()=>{
                        console.log('faild');
                    });
                $('#modal-create').modal('hide');
                this.loadeBuyer();
            },
            deleteBuyer(buyer){
                axios.delete(`/api/buyerInfo/${buyer.id}`)
                    .then(() => {
                        console.log('Delete');
                    });
                let index = this.buyers.indexOf(buyer);
                this.buyers.splice(index, 1);
            }
        },
        mounted() {
            this.loadeBuyer();
            this.loadeCountry();
        }
    }
</script>

<style scoped>

</style>
