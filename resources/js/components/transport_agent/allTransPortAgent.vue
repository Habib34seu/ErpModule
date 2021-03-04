<template>
    <div class="card">
            <div class="card-header d-flex bd-highlight">
                <h3 class="p-2 flex-grow-1 bd-highlight">Transport Agent</h3>
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
                            <th style="width: 70px;">ID</th>
                            <th style="width: 150px;">Code</th>
                            <th>Name</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="country in countries" :key="country.id">
                            <td style="width: 70px;">{{country.id}}</td>
                            <td style="width: 150px;">{{country.code}}</td>
                            <td>{{country.name}}</td>
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
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
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
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                                        <div class="col-sm-10">
                                            <input type="text"  v-model="countryForm.code" name="code"
                                                   class="form-control" id="code"
                                                   placeholder="Country Code Entry"
                                                   :class="{ 'is-invalid': countryForm.errors.has('code') }">
                                            <has-error :form="countryForm" field="code"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" v-model="countryForm.name"
                                                   class="form-control" id="name"
                                                   placeholder="Country Entry"
                                                   :class="{ 'is-invalid': countryForm.errors.has('name') }">
                                                   <has-error :form="countryForm" field="name"></has-error>
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
                countryForm: new Form({
                    id:'',
                    code:'',
                    name:'',
                })
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
                    //console.log(response.data);
                    this.countries = response.data;

                });
            },
            createCountry(){
                //console.log("sub");
                this.countryForm.post('/api/country')
                    .then(
                        ({ data }) => {

                            this.countryForm.code='';
                            this.countryForm.name='';

                            $('#modal-create').modal('hide');
                            this.loadeCountry();
                        })
            },
            updateCountry(){
                this.countryForm.put(`/api/country/`+this.countryForm.id)
                .then(()=>{
                    console.log('success');
                })
                .catch(()=>{
                    console.log('faild');
                });
                $('#modal-create').modal('hide');
                this.loadeCountry();
            },
            deleteCountry(country){
                axios.delete(`/api/country/${country.id}`)
                    .then(() => {
                    console.log('Delete');
                });
                let index = this.countries.indexOf(country);
                this.countries.splice(index, 1);
            }
        },
        mounted() {
            this.loadeCountry();
        }
    }
</script>

<style scoped>

</style>
