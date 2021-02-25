<template>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="p-2 flex-grow-1 bd-highlight">Depot Information</h3>
            <div class="p-2 bd-highlight">
                <button type="button" @click="newModel" class="btn btn-info" data-toggle="modal" data-target="#modal-create">
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
                    <th style="width: 150px;">Vehicle Number</th>
                    <th>Vehicle Description</th>
                    <th>Vehicle Purpose</th>
                    <th>Party</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="vehicleInfo in vehicleInfos" :key="vehicleInfo.id">
                    <td style="width: 70px;">{{vehicleInfo.id}}</td>
                    <td style="width: 150px;">{{vehicleInfo.vehicle_no}}</td>
                    <td>{{vehicleInfo.vehicle_desc}}</td>
                    <td>{{vehicleInfo.vehicle_purpose}}</td>
                    <td>{{vehicleInfo.party}}</td>
                    <td style="width: 150px;">
                        <a type="button"
                           class="btn btn-primary"
                           data-toggle="modal" @click="editModal(vehicleInfo)">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a @click="deleteVehicleInfo(vehicleInfo)"
                           class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Vehicle Number</th>
                    <th>Vehicle Description</th>
                    <th>Vehicle Purpose</th>
                    <th>Party</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /Vehicle Info Create And Update Modal Start -->
        <div class="modal fade" id="modal-create">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-show="!editmode">Add New Vehicle  </h4>
                        <h4 class="modal-title" v-show="editmode">Update Vehicle </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateVehicleInfos() : createVehicleInfos()">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="vehicle_no" class="col-sm-4 col-form-label">Vehicle Number</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                           v-model="vehicleInfosForm.vehicle_no"
                                           class="form-control" id="vehicle_no"
                                           placeholder="Vehicle Number Entry"
                                           :class="{ 'is-invalid': vehicleInfosForm.errors.has('vehicle_no') }">
                                    <has-error :form="vehicleInfosForm" field="vehicle_no"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vehicle_desc" class="col-sm-4 col-form-label">Vehicle Description</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                           v-model="vehicleInfosForm.vehicle_desc"
                                           class="form-control" id="vehicle_desc"
                                           placeholder="Vehicle Description Entry"
                                           :class="{ 'is-invalid': vehicleInfosForm.errors.has('vehicle_desc') }">
                                    <has-error :form="vehicleInfosForm" field="vehicle_desc"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vehicle_purpose" class="col-sm-4 col-form-label">Vehicle Purpose</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                           v-model="vehicleInfosForm.vehicle_purpose"
                                           class="form-control" id="vehicle_purpose"
                                           placeholder="Vehicle Purpose Entry"
                                           :class="{ 'is-invalid': vehicleInfosForm.errors.has('vehicle_purpose') }">
                                    <has-error :form="vehicleInfosForm" field="vehicle_purpose"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="party" class="col-sm-4 col-form-label">Party</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                           v-model="vehicleInfosForm.party"
                                           class="form-control" id="party"
                                           placeholder="Party Entry"
                                           :class="{ 'is-invalid': vehicleInfosForm.errors.has('party') }">
                                    <has-error :form="vehicleInfosForm" field="party"></has-error>
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
        <!-- /Vehicle Info  Create And Update Modal End -->
    </div>
    <!-- /.card -->
</template>

<script>
    export default {
        data(){
            return{
                editmode:false,
                vehicleInfos:[],
                 vehicleInfosForm: new Form({
                     id:'',
                     vehicle_no:'',
                     vehicle_desc:'',
                     vehicle_purpose:'',
                     party:'',
                })
            }
        },

        methods:{
            newModel(){
                this.editmode = false;
                this.vehicleInfosForm.reset();
                $('#modal-create').modal('show');

            },
            editModal(vehicleInfo){
                this.editmode = true;
                this.vehicleInfosForm.reset();
                $('#modal-create').modal('show');
                this.vehicleInfosForm.fill(vehicleInfo);
            },
            loadeVehicleInfo(){
                axios.get("/api/vehicleInfo").then(response => {
                    this.vehicleInfos = response.data;

                });
            },
            createVehicleInfos(){
                this.vehicleInfosForm.post('/api/vehicleInfo')
                    .then(
                        ({ data }) => {
                            this.vehicleInfosForm.vehicle_no='';
                            this.vehicleInfosForm.vehicle_desc='';
                            this.vehicleInfosForm.vehicle_purpose='';
                            this.vehicleInfosForm.party='';
                            $('#modal-create').modal('hide');
                            this.loadeVehicleInfo();
                        })
                    .catch(error => {
                    console.log(error.response)
                });
            },
            updateVehicleInfos(){
                this.vehicleInfosForm.put(`/api/vehicleInfo/`+this.vehicleInfosForm.id)
                    .then(()=>{
                        console.log('success');
                    })
                    .catch(()=>{
                        console.log('faild');
                    });
                $('#modal-create').modal('hide');
                this.loadeVehicleInfo();
            },
            deleteVehicleInfo(vehicleInfo){
                axios.delete(`/api/vehicleInfo/${vehicleInfo.id}`)
                    .then(() => {
                        console.log('Delete');
                    });
                let index = this.vehicleInfos.indexOf(vehicleInfo);
                this.vehicleInfos.splice(index, 1);
            }
        },
        mounted() {
            this.loadeVehicleInfo();
        }

    }
</script>

<style scoped>

</style>
