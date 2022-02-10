<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stock In</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stock In</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
date_default_timezone_set("Asia/Colombo");
// Return current date from the remote server
$date = date('y-m-d');

?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <div align="right">
                        <a class="button" href="<?php echo base_url() ?>assets/data.csv" download="">
                            <button type="button" class="btn btn-info">Download Demo File</button>
                        </a>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <form method="post" action="<?php echo base_url('portal/stock/uploadExcel'); ?>" name="upload_excel" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="row">

                                <div class="form-group">

                                    <input type="hidden" class="form-control" id="credit_cid" name="credit_cid" value="<?php echo $_SESSION['passed_user_national']; ?>">
                                </div>

                               
                                <div class="form-group">
                                    <label for="user_note">Date of Cheque</label>
                                    <input type="date" class="form-control" id="stock_date" name="stock_date" value="<?php echo date('Y-m-d'); ?>">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail1">Stock Description</label>
                                <textarea rows="5" class="form-control" id="stock_desc" name="stock_desc" placeholder="Lorry Description"></textarea>
                                </div>
                           
                                <div class="form-group">
                                    <label for="user_eno">Upload File</label>
                                    <input type="file" class="form-control" name="file" id="file" accept=".csv" required>
                                </div>

                             </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submit" name="Import" class="btn btn-primary" data-loading-text="Loading...">Save Changes</button>


                    </form>


                </div>

            </div>






        </div>



</div>
</div>

</div>

</section>

</div>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


