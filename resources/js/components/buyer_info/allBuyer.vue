<template>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="p-2 flex-grow-1 bd-highlight">Buyer Information</h3>
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
                    <th style="width: 100px;">Code</th>
                    <th>Buyer Name</th>
                    <th>Street</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Zip Code</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 100px;">Hr001</td>
                    <td style="width: 150px;">H&M</td>
                    <td>Sunny Truns International</td>
                    <td>dsaer</td>
                    <td>sdfdsf</td>
                    <td>aweterytr</td>
                    <td>London</td>
                    <td>356498498</td>
                    <td>fax-5454</td>
                    <td>3564</td>
                    <td>hnm@gmail.com</td>
                    <td>Foregin</td>
                    <td style="width: 150px;">
                        <a type="button"
                           class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger">
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
                    <th>Area</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Zip Code</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /Buyer  Create Modal Start -->
        <div class="modal fade" id="modal-create">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Buyer Add New</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /Buyer Create Modal End -->

        <!-- /Buyer Edit Modal Start -->
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Buyer Update</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /Buyer Edit Modal End -->
    </div>
    <!-- /.card -->
</template>

<script>
    export default {
        name: "allBuyer"
    }
</script>

<style scoped>

</style>
