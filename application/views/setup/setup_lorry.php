<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Lorry Management
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
                                    Add New Lorry
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Added Date</th>
                                        <th>CID</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($get_lorry as $get_lorrys) {

                                    ?>

                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_lorrys->lor_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_lorrys->lor_detail; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_lorrys->lor_date; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_lorrys->lor_cid; ?>
                                            </td>

                                            <td>
                                                <?php if ($get_lorrys->lor_active == 1) { ?>
                                                    <span class="badge badge-success">Active</span><?php
                                                                                                } else { ?>
                                                    <span class="badge badge-danger">Deactive</span>
                                                <?php   } ?>
                                            </td>

                                            <td style="text-align:center">

                                                <div class="row">


                                                    <div class="col">

                                                        <form method="post" action="<?php echo base_url('portal/setup/change_lorry_status'); ?>" <?php if ($get_lorrys->lor_active == 1) {
                                                                                                                                                        echo "hidden";
                                                                                                                                                    }
                                                                                                                                                    ?>>
                                                            <input type="hidden" value=" <?php echo $get_lorrys->lor_id; ?>" id="lor_id" name="lor_id">
                                                            <input type="hidden" value="<?php {
                                                                                            echo 1;
                                                                                        } ?>" name="lor_status">
                                                            <button class="btn btn btn-success " type="submit" name="active_btn"> 
                                                                Active
                                                            </button>
                                                        </form>


                                                        <form method="post" action="<?php echo base_url('portal/setup/change_lorry_status'); ?>" <?php if ($get_lorrys->lor_active == 0) {
                                                                                                                                                        echo "hidden";
                                                                                                                                                    }
                                                                                                                                                    ?>>
                                                            <input type="hidden" value=" <?php echo $get_lorrys->lor_id; ?>" id="lor_id" name="lor_id">
                                                            <input type="hidden" value="<?php {
                                                                                            echo 0;
                                                                                        } ?>" name="lor_status">
                                                            <button class="btn btn btn-secondary " type="submit" name="deactive_btn">
                                                                Deactive
                                                            </button>
                                                        </form>

                                                    </div>

                                                    <div class="col">

                                                        <a class="btn btn btn-primary " href="<?php echo '' . base_url('portal/setup/action/edit_lorry?lor_id=') . $get_lorrys->lor_id . ''; ?>">Edit</a>

                                                    </div>


                                                    <!-- <div class="col">
                                                    <form method="post" action="<?php echo base_url('portal/setup/delete_lorry'); ?>">

                                                    <input type="hidden" value=" <?php echo $get_lorrys->lor_id; ?>" id="lor_id" name="lor_id">
                                                    <button class="btn btn btn-danger ">
                                                        Delete
                                                    </button>
                                                    </form>
                                                    </div> -->


                                                </div>





                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }

                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Added Date</th>
                                        <th>CID</th>
                                        <th>Status</th>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Lorry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('portal/setup/add_lorry'); ?>">
                    <div class="modal-body">

                        <div class="row">

                            <div class="form-group">
                                <label for="user_eno">Lorry Name</label>
                                <input type="text" class="form-control" id="lor_name" name="lor_name" placeholder="Lorry Name">
                            </div>

                            <div class="form-group">
                                <label for="user_tpno">Description</label>
                                <textarea type="textarea" row="5" class="form-control" id="lor_detail" name="lor_detail" rows="3" placeholder="Description"> </textarea>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="lorry_add" id="lorry_add" value="<?php echo $date ?>;" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>