<!-- Content Wrapper. Contains page content -->
<script src="https://code.jquery.com/jquery-3.5.0.js">
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        View Inventory
                    </h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">DataTables</li></ol> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <?php
    date_default_timezone_set("Asia/Colombo");
    // Return current date from the remote server
    $date = date('d-m-y h:i:s');

    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <!-- /.card-header -->



                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with default features</h3> -->
                            <div align="right">


                                <a class="btn btn-primary" href="<?php echo base_url(); ?>portal/stock/action/stockin" class="nav-link">
                                    Add Stock In
                                </a>

                            </div>





                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive ">
                            <table id="example1" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Stock ID</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Get Price</th>
                                        <th scope="col">Sell Price </th>
                                        <?php if (isset($_SESSION['admin'])) { ?> <th scope="col">Action</th> <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    foreach ($get_inventory as $row) {
                                    ?>
                                        <tr>

                                            <td> <?php echo $i; ?></td>
                                            <td> <?php echo $row->inv_sto_id; ?></td>
                                            <td><?php echo $row->inv_pro_id; ?></td>
                                            <td><?php echo $row->inv_qtc; ?></td>
                                            
                                            <td align="right"><?php echo number_format($row->inv_get, 2); ?></td>
                                            <td align="right"><?php echo number_format($row->inv_sell, 2); ?></td>


                                            <?php if (isset($_SESSION['admin'])) { ?> 
                                                <td align="center">

                                                    <form id="myFrom" method="post" action="<?php echo base_url('portal/stock/delete_inventory'); ?>">

                                                        <input type="hidden" value="<?php echo $row->inv_id; ?>" id="inv_id" name="inv_id">

                                                        <a href="#myModal" class="btn btn btn-danger " data-toggle="modal">
                                                            Delete
                                                        </a>

                                                    </form>
                                                </td><?php } ?>

                                        </tr>
                                    <?php
                                        $i++;
                                    }

                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Stock ID</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Get Price</th>
                                        <th scope="col">Sell Price </th>
                                        <?php if (isset($_SESSION['admin'])) { ?> <th scope="col">Action</th> <?php } ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Credit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('portal/credit/importFile'); ?>" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div class="row">

                            <div class="form-group">
                                <label for="user_eno">Date</label>
                                <input type="date" class="form-control" id="credit_date" name="credit_date" placeholder="Product Name">
                            </div>

                            <div class="form-group">
                                <label for="user_eno">Lorry Number</label>
                                <input type="text" class="form-control" id="credit_lorry" name="credit_lorry" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="user_eno">Collector</label>
                                <input type="text" class="form-control" id="credit_collect" name="credit_collect" placeholder="Product Name">
                            </div>

                            <div class="form-group">

                                <input type="hidden" class="form-control" id="credit_cid" name="credit_cid" value="<?php echo $_SESSION['passed_user_national']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="user_eno">Uploader</label>
                                <input type="file" class="form-control" t name="uploadFile" accept=".xls, .xlsx" required>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="credit_add" id="credit_add" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>



<script>
    $('#confirmDelete').click(function() {
        $('#myFrom').submit();
    });
</script>