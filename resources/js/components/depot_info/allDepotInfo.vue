<template>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="p-2 flex-grow-1 bd-highlight">Depot Information</h3>
            <div class="p-2 bd-highlight">
                <button type="button" @click="newModel"class="btn btn-info" data-toggle="modal" data-target="#modal-create">
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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Delivery Point</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="depotInfo in depotInfos" :key="depotInfo.id">
                    <td style="width: 70px;">{{depotInfo.id}}</td>
                    <td style="width: 150px;">{{depotInfo.code}}</td>
                    <td>{{depotInfo.name}}</td>
                    <td>{{depotInfo.address}}</td>
                    <td>{{depotInfo.delivery_point_id}}</td>
                    <td style="width: 150px;">
                        <a type="button"
                           class="btn btn-primary"
                           data-toggle="modal" @click="editModal(depotInfo)">
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
                    <th>Name</th>
                    <th>Address</th>
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
                        <h4 class="modal-title" v-show="!editmode">Add New Depot </h4>
                        <h4 class="modal-title" v-show="editmode">Update Depot </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updatedepotInfos() : createdepotInfos()">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           v-model="depotInfosForm.name"
                                           class="form-control" id="name"
                                           placeholder="Delivery Point Entry"
                                           :class="{ 'is-invalid': depotInfosForm.errors.has('name') }">
                                    <has-error :form="depotInfosForm" field="name"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           v-model="depotInfosForm.address"
                                           class="form-control" id="address"
                                           placeholder="Delivery Point Entry"
                                           :class="{ 'is-invalid': depotInfosForm.errors.has('address') }">
                                    <has-error :form="depotInfosForm" field="address"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="del_point_id" class="col-sm-2 col-form-label">Delivery Point</label>
                                <div class="col-sm-10">
                                    <select id ="del_point_id"
                                            v-model="depotInfosForm.delivery_point_id"
                                            class="form-control select2"
                                            style="width: 100%;">
                                        <option v-for="deliveryPoint in deliveryPoints"
                                                v-bind:value="deliveryPoint.id"
                                            selected="selected">{{deliveryPoint.del_point_name}}</option>
                                    </select>
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
                depotInfos:[],
                deliveryPoints:[],
                depotInfosForm: new Form({
                    id:'',
                    code:'',
                    name:'',
                    address:'',
                    delivery_point_id:'',
                })
            }
        },

        methods:{
            newModel(){
                this.editmode = false;
                this.depotInfosForm.reset();
                $('#modal-create').modal('show');

            },
            editModal(depotInfo){
                this.editmode = true;
                this.depotInfosForm.reset();
                $('#modal-create').modal('show');
                this.depotInfosForm.fill(depotInfo);
            },
            DepotInfo(){
                console.log('Create Depot')
            },
            loadeDepotInfo(){
                axios.get("/api/depotInfo").then(response => {
                    this.depotInfos = response.data;

                });
            },
            loadeDeliveryPoint(){
                axios.get("/api/deliveryPoint").then(response => {
                    console.log(response.data);
                    this.deliveryPoints = response.data;

                });
            },
            createdepotInfos(){
                //console.log("sub");
                this.depotInfosForm.post('/api/depotInfo')
                    .then(
                        ({ data }) => {
                            this.depotInfosForm.name='';
                            this.depotInfosForm.address='';
                            this.depotInfosForm.delivery_point_id='';

                            $('#modal-create').modal('hide');
                            this.loadeDepotInfo();
                        })
            },
            updatedepotInfos(){
                this.depotInfosForm.put(`/api/depotInfo/`+this.depotInfosForm.id)
                    .then(()=>{
                        console.log('success');
                    })
                    .catch(()=>{
                        console.log('faild');
                    });
                $('#modal-create').modal('hide');
                this.loadeDepotInfo();
            },
            deleteDeliveryPoint(depotInfo){
                axios.delete(`/api/depotInfo/${depotInfo.id}`)
                    .then(() => {
                        console.log('Delete');
                    });
                let index = this.depotInfos.indexOf(depotInfo);
                this.depotInfos.splice(index, 1);
            }
        },
        mounted() {

            this.loadeDeliveryPoint();
            this.loadeDepotInfo();

        }

    }
</script>

<style scoped>

</style>
