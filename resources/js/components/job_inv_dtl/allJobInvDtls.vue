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
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" v-show="!editmode">Add New Country </h4>
                                <h4 class="modal-title" v-show="editmode">Update Country </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? updateCountry() : createCountry()">
                                <div class="modal-body">
                                    <tr v-for="(shipmentJobInvoiceDetail, k) in shipmentJobInvoiceDetails" :key="k">
                                       
                                        <td>
                                            <input class="form-control" type="text" v-model="shipmentJobInvoiceDetail.product_no" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" v-model="shipmentJobInvoiceDetail.product_name" />
                                        </td>
                                        <td>
                                            <input class="form-control text-right" type="number" min="0" step=".01" 
                                            v-model="shipmentJobInvoiceDetail.product_price" @change="calculateLineTotal(invoice_product)"
                                            />
                                        </td>
                                        <td>
                                            <input readonly class="form-control text-right" type="number" min="0" step=".01"
                                             v-model="shipmentJobInvoiceDetail.line_total" />
                                        </td>
                                         <td scope="row" class="trashIconContainer">
                                            <i class="far fa-trash-alt" @click="deleteRow(k, invoice_product)"></i>
                                        </td>
                                    </tr>
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
                shipmentJobInvoiceDetails:[],
                //  : new Form({
                //     job_inv_id:'',
                //     buyer_id:'',
                //     country_id:'',
                //     job_no:'',
                //     inv_no:'',
                //     inv_value:'',
                //     inv_date:'',
                //     article_no:'',
                //     order_no:'',
                // })
            }
        },
        methods:{
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
            loadeJobInvDtl(){
                axios.get("/api/jobInvDetails").then(response => {
                    this.shipmentJobInvoiceDetails = response.data;
                });
            },
            
        },
        mounted() {
            this.loadeCountry();
            this.loadeJobInvDtl();
        }
    }
</script>

<style scoped>

</style>
