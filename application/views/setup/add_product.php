<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Product Management
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
                <div class="col-12">
                    <!-- /.card-header -->



                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with default features</h3> -->
                            <div align="right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Add New Product
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Description</th>
                                        <th>CID</th>
                                        <th>Date</th>
                                        <th>Active</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($get_pro as $get_pros) {


                                    ?>

                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_pros->pro_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_pros->pro_sku; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_pros->pro_desc; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_pros->pro_cid; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_pros->pro_date; ?>
                                            </td>

                                            <td>
                                                <?php if ($get_pros->pro_active == 1) {
                                                ?>
                                                    <span class="badge badge-success">Active</span><?php
                                                                                                } else { ?>
                                                    <span class="badge badge-danger">Deactive</span>
                                                <?php   } ?>
                                            </td>


                                            <td style="text-align:center">

                                                <div class="row">


                                                    <div class="col">




                                                        <form method="post" action="<?php echo base_url('portal/setup/change_pro_status'); ?>">
                                                            <input type="hidden" value="<?php echo $get_pros->pro_id; ?>" id="pro_id" name="pro_id">
                                                            <input type="hidden" value="<?php echo $get_pros->pro_active; ?>" id="pro_active" name="pro_active">

                                                            <?php if ($get_pros->pro_active == 1) { ?> <button class="btn btn btn-secondary " type="submit" name="active_btn"><span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                    Deactive
                                                                </button> <?php } else { ?>
                                                                <button class="btn btn btn-success " type="submit" name="active_btn"> <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                    Active
                                                                </button> <?php } ?>



                                                        </form>

                                                    </div>

                                                    <div class="col">

                                                        <a class="btn btn btn-primary " href="<?php echo '' . base_url('portal/setup/action/edit_collector?emp_id=') . $get_pros->pro_id . ''; ?>">Edit</a>

                                                    </div>





                                                </div>

                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    //end if


                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Description</th>
                                        <th>CID</th>
                                        <th>Date</th>
                                        <th>Active</th>
                                        <th>Action</th>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="<?php echo base_url('portal/setup/add_pro'); ?>">
                    <div class="modal-body">
                        <div class="row">



                            <div class="form-group">
                                <label for="user_eno">Product Name</label>
                                <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label for="user_eno">Product SKU</label>
                                <input type="text" class="form-control" id="pro_sku" name="pro_sku" placeholder="Enter Product SKU">
                            </div>
                            <div class="form-group">
                                <label for="user_eno">Product Description</label>
                                <textarea   rows="5" class="form-control" id="pro_desc" name="pro_desc" placeholder="Enter Product Description"> </textarea>
                            </div>
                            <div class="form-group">

                                <input type="hidden" class="form-control" id="pro_date" name="pro_date" value="<?php echo $date;  ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="pro_add" id="pro_add" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>