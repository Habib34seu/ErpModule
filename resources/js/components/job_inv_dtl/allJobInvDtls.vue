<template>
    <div class="card">
            <div class="card-header d-flex bd-highlight">
                <h3 class="p-2 flex-grow-1 bd-highlight">Shipment Job Invoice Detail</h3>
                <div class="p-2 bd-highlight">
                    <button type="button" class="btn btn-info" @click="newModel">
                        <i class="far fa-plus-square"></i> Add New
                    </button>
                </div>
            </div>
        <!-- /.card-header -->
          <div class="card-body overflow-auto" style="height: 500px;">
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 150px;">Buyer Name</th>
                            <th style="width: 150px;">Country</th>
                            <th>Order No</th>
                            <th>Article No</th>
                            <th>Job No</th>
                            <th>Invoice No</th>
                            <th>Invoice Value</th>
                            <th>Invoice Date</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="shipmentJobInvoiceDetail in shipmentJobInvoiceDetails" 
                                :key="shipmentJobInvoiceDetail.job_inv_id">
                            <td style="width: 150px;">{{shipmentJobInvoiceDetail.buyer_id}}</td>
                            <td style="width: 150px;">{{shipmentJobInvoiceDetail.country_id}}</td>
                            <td>{{shipmentJobInvoiceDetail.order_no}}</td>
                            <td>{{shipmentJobInvoiceDetail.article_no}}</td>
                            <td>{{shipmentJobInvoiceDetail.job_no}}</td>
                            <td>{{shipmentJobInvoiceDetail.inv_no}}</td>
                            <td>{{shipmentJobInvoiceDetail.inv_value}}</td>
                            <td>{{shipmentJobInvoiceDetail.inv_date}}</td>
                            <td style="width: 150px;">
                                <a type="button"
                                   class="btn btn-primary"
                                   data-toggle="modal" @click="editModal(country)">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a @click="deleteCountry(country)"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 70px;">Buyer Name</th>
                            <th style="width: 150px;">Country</th>
                            <th>Order No</th>
                            <th>Article No</th>
                            <th>Job No</th>
                            <th>Invoice No</th>
                            <th>Invoice Value</th>
                            <th>Invoice Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /Country Create Modal Start -->
                <div class="modal fade" id="modal-create">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" v-show="!editmode">Add Shipment Job Invoice </h4>
                                <h4 class="modal-title" v-show="editmode">Update Country </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? updateCountry() : creaInvShipDtl()">
                                <div class="modal-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>

                                                        <th style="width: 150px;">Buyer Name</th>
                                                        <th style="width: 150px;">Country</th>
                                                        <th>Order No</th>
                                                        <th>Article No</th>
                                                        <th>Job No</th>
                                                        <th>Invoice No</th>
                                                        <th>Invoice Value</th>
                                                        <th>Invoice Date</th>
                                                        <th>Action</th>
                                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(jobInvDtlForm, k) in jobInvDtlForms" :key="k">
                                                <td>
                                                    <div>
                                                        <select
                                                            v-model="jobInvDtlForm.buyer_id"
                                                            class="form-control select2"
                                                            style="width: 100%;">
                                                        <option v-for="buyer in buyers"
                                                                v-bind:value="buyer.id"
                                                                selected="selected">{{buyer.name}}</option>
                                                    </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <select
                                                            v-model="jobInvDtlForm.country_id"
                                                            class="form-control select2"
                                                            style="width: 100%;">
                                                        <option v-for="country in countries"
                                                                v-bind:value="country.id"
                                                                selected="selected">{{country.name}}</option>
                                                    </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="jobInvDtlForm.order_no"
                                                            placeholder="Order No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="jobInvDtlForm.article_no"
                                                            placeholder="Article No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="jobInvDtlForm.job_no"
                                                            placeholder="Job No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="jobInvDtlForm.inv_no"
                                                            placeholder="Invoice No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="jobInvDtlForm.inv_value"
                                                            placeholder="Invoice Value Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="jobInvDtlForm.inv_date"
                                                            placeholder="Invoice Date Enter ...">
                                                    </div>
                                                </td>

                                                <td>
                                                    <i class="fas fa-minus-circle" @click="remove"></i>
                                                   
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                         <tbody>
                                            <tr >
                                                <td>
                                                    <div>
                                                        <select
                                                            v-model="obj.buyer_id"
                                                            class="form-control select2"
                                                            style="width: 100%;">
                                                        <option v-for="buyer in buyers"
                                                                v-bind:value="buyer.id"
                                                                selected="selected">{{buyer.name}}</option>
                                                    </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <select
                                                            v-model="obj.country_id"
                                                            class="form-control select2"
                                                            style="width: 100%;">
                                                        <option v-for="country in countries"
                                                                v-bind:value="country.id"
                                                                selected="selected">{{country.name}}</option>
                                                    </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="obj.order_no"
                                                            placeholder="Order No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="obj.article_no"
                                                            placeholder="Article No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="obj.job_no"
                                                            placeholder="Job No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="obj.inv_no"
                                                            placeholder="Invoice No Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="obj.inv_value"
                                                            placeholder="Invoice Value Enter ...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="obj.inv_date"
                                                            placeholder="Invoice Date Enter ...">
                                                    </div>
                                                </td>

                                                <td>
                                                    <i class="fas fa-minus-circle" @click="remove"></i>
                                                    <i class="fas fa-plus-circle" @click="add" ></i>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
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
        <!-- /Country Create Modal End -->
    </div>
    <!-- /.card -->

</template>

<script>
    export default {
        data(){
            return{
                editmode:false,
                countries:[],
                buyers:[],
                shipmentJobInvoiceDetails:[],
                obj: {

                        job_inv_id:'',
                        buyer_id:'1',
                        country_id:'1',
                        job_no:'sdfas',
                        inv_no:'sadfas',
                        inv_value:'54546',
                        inv_date:'',
                        article_no:'sdfsd',
                        order_no:'asdasd',

                    },
                    initobj: {
                        job_inv_id:'',
                        buyer_id:'',
                        country_id:'',
                        job_no:'',
                        inv_no:'',
                        inv_value:'',
                        inv_date:'',
                        article_no:'',
                        order_no:'',
                    },
                jobInvDtlForms:[],
            }
        },
        methods:{

            add(index) {
            this.jobInvDtlForms.push(this.obj);
            this.obj={
              ...this.initobj
            }
        },
        remove(index) {
            this.jobInvDtlForms.splice(index, 1);
        },


            newModel(){
                this.editmode = false;

                $('#modal-create').modal('show');

            },
            editModal(country){
                this.editmode = true;

                $('#modal-create').modal('show');
                this.countryForm.fill(country);
            },
            loadeCountry(){
                axios.get("/api/country").then(response => {
                    this.countries = response.data;
                });
            },
            loadeBuyer(){
                axios.get("/api/buyerInfo").then(response => {
                    this.buyers = response.data;

                });
            },
            loadeJobInvDtl(){
                axios.get("/api/jobInvDetails").then(response => {
                    this.shipmentJobInvoiceDetails = response.data;
                });
            },

            creaInvShipDtl(){
               console.log(this.jobInvDtlForms)
               axios.post('/api/jobInvDetails',{ver:this.jobInvDtlForms})
                    .then(
                        ( data ) => {
                          console.log(data.data);

                            // this.countryForm.code='';
                            // this.countryForm.name='';

                            $('#modal-create').modal('hide');
                            this.loadeCountry();
                        })

            },
            
        },
        mounted() {
            this.loadeCountry();
            this.loadeJobInvDtl();
            this.loadeBuyer();
        }
    }
</script>

<style scoped>

</style>
