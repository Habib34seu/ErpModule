<template>
    <div class="card">
            <div class="card-header d-flex bd-highlight">
                <h3 class="p-2 flex-grow-1 bd-highlight">Country</h3>
                <div class="p-2 bd-highlight">
                    <a class="btn btn-info"><i class="far fa-plus-square"></i></a>
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
                        <tr>
                            <td style="width: 70px;">1</td>
                            <td style="width: 150px;">BD</td>
                            <td>Bangladesh</td>
                            <td style="width: 150px;">
                                <a class="btn btn-primary">
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
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</template>

<script>
    export default {
        name: "allCountry"
    }
</script>

<style scoped>

</style>
