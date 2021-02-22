<template>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="p-2 flex-grow-1 bd-highlight">Delivery Pint Information</h3>
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-create">
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body overflow-auto" style="height: 500px;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 70px;">ID</th>
                    <th style="width: 150px;">Code</th>
                    <th>Delivery Point</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="deliveryPoint in deliveryPoints" :key="deliveryPoint.id">
                    <td style="width: 70px;">{{deliveryPoint.id}}</td>
                    <td style="width: 150px;">{{deliveryPoint.code}}</td>
                    <td>{{deliveryPoint.del_point_name}}</td>
                    <td style="width: 150px;">
                        <a type="button"
                           class="btn btn-primary"
                           data-toggle="modal" @click="editModal(deliveryPoint)">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a @click="deleteDeliveryPoint(deliveryPoint)"
                           class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Delivery Point</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /Delivery Point Create And Update Modal Start -->
        <div class="modal fade" id="modal-create">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-show="!editmode">Add New Delivery Point </h4>
                        <h4 class="modal-title" v-show="editmode">Update Delivery Point </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateDeliveryPoint() : createDeliveryPoint()">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="del_point_name"
                                           v-model="deliveryPointsForm.del_point_name"
                                           class="form-control" id="name"
                                           placeholder="Delivery Point Entry"
                                           :class="{ 'is-invalid': deliveryPointsForm.errors.has('del_point_name') }">
                                    <has-error :form="deliveryPointsForm" field="del_point_name"></has-error>
                                </div>
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
        <!-- /Delivery Point  Create And Update Modal End -->
    </div>
    <!-- /.card -->
</template>

<script>
    export default {
        data(){
            return{
                editmode:false,
                deliveryPoints:[],
                deliveryPointsForm: new Form({
                    id:'',
                     code:'',
                    del_point_name:'',
                })
            }
        },

        methods:{
            newModel(){
                this.editmode = false;

                $('#modal-create').modal('show');

            },
            editModal(deliveryPoint){
                this.editmode = true;

                $('#modal-create').modal('show');
                this.deliveryPointsForm.fill(deliveryPoint);
            },
            loadeDeliveryPoint(){
                axios.get("/api/deliveryPoint").then(response => {
                    console.log(response.data);
                    this.deliveryPoints = response.data;

                });
            },
            createDeliveryPoint(){
                //console.log("sub");
                this.deliveryPointsForm.post('/api/deliveryPoint')
                    .then(
                        ({ data }) => {
                            this.deliveryPointsForm.del_point_name='';

                            $('#modal-create').modal('hide');
                            this.loadeDeliveryPoint();
                        })
            },
            updateDeliveryPoint(){
                this.deliveryPointsForm.put(`/api/deliveryPoint/`+this.deliveryPointsForm.id)
                    .then(()=>{
                        console.log('success');
                    })
                    .catch(()=>{
                        console.log('faild');
                    });
                $('#modal-create').modal('hide');
                this.loadeDeliveryPoint();
            },
            deleteDeliveryPoint(deliveryPoint){
                axios.delete(`/api/deliveryPoint/${deliveryPoint.id}`)
                    .then(() => {
                        console.log('Delete');
                    });
                let index = this.deliveryPoints.indexOf(deliveryPoint);
                this.deliveryPoints.splice(index, 1);
            }
        },
        mounted() {
            this.loadeDeliveryPoint();
        }

    }
</script>

<style scoped>

</style>
