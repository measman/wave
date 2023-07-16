<?= $this->extend('templates/admin_template') ?>
<?= $this->section('title') ?>
Dashboard
<?= $this->endSection('title') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Currencies</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- /.row -->
        <!-- Main row -->
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="col text-right">
                    <button type="button" name="add_currency" id="add_currency" class="btn btn-success btn-sm">Add
                        Currency</button>
                </div>
                </br>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="currencyList" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<div id="currencyModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="post" id="currency_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Currency</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="txtname" class="form-control" placeholder="Name">
                        <span id="txtname_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="txtcountry" class="form-control" placeholder="Country">
                        <span id="txtcountry_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="txtcode" class="form-control" placeholder="Code">
                        <span id="txtcodey_error" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">

                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>