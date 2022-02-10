<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Assign Sales Rep to Lorry
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
                                 Assign Sales Rep
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Lorry ID</th>
                                        <th>Sales Rep ID</th>                                     
                                        <th>Assigned CID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;

                                    foreach ($get_assignedSalesRep as $get_assignedSalesReps) {

                                        if($get_assignedSalesReps->assign_emp_role_id == EMP_ROLE_SALES_REP){
                                            
                                        ?>

                                             <tr>
                                            <td>
                                                <?php echo $get_assignedSalesReps->assign_record_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_assignedSalesReps->assign_lor_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_assignedSalesReps->assign_emp_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $get_assignedSalesReps->assign_cid; ?>
                                            </td>
                                                                                       
                                            <td style="text-align:center">

                                            <div class="row">

                                        <div class="col">

                                        <a class="btn btn btn-primary "  href="<?php echo '' . base_url('portal/setup/action/edit_assignSalesRep?record_id=') . $get_assignedSalesReps->assign_record_id . ''; ?>">Edit</a>

                                        </div>

                                        <div class="col">
                                        <form method="post" action="<?php echo base_url('portal/setup/delete_lorry'); ?>">

                                        <input type="hidden" value=" <?php echo $get_assignedSalesReps->assign_lor_id; ?>" id="lor_id" name="lor_id">
                                        <button class="btn btn btn-danger ">
                                            Delete
                                        </button>
                                        </form>
                                        </div>


                                            </div>


                                            </td>
                                        </tr>
                                    <?php
                        }
                    }

?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Lorry ID</th>
                                        <th>Sales Rep ID</th>                                     
                                        <th>Assigned CID</th>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Assign Sales Rep to Lorry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('portal/setup/assign_salesRep_lorry'); ?>">
                    <div class="modal-body">


                        <div class="row">

                        
                         <div class="form-group">
                            <label for="user_eno">Sales Rep</label>
                            <select id="product_cat" name="assign_emp_id"  class="form-control select2" style="width: 100%;">
                              <option  selected disabled>Select Choice</option>
                              <?php $i = 0;

                              foreach ($get_salesEmp as $row1) { ?>
                                
                                <option value=" <?php echo $row1->emp_id; ?>"><?php echo $row1->emp_id; ?> - <?php echo $row1->emp_name; ?></option>
                              <?php
                              }

                              ?>


                            </select>
                          </div>


                          <div class="form-group">
                            <label for="user_eno">Lorry</label>
                            <select id="product_cat" name="assign_lor_id"  class="form-control select2" style="width: 100%;">
                              <option  selected disabled>Select Choice</option>
                              <?php $i = 0;

                              foreach ($get_lorry as $row2) { ?>
                                
                                <option value=" <?php echo $row2->lor_id; ?>"><?php echo $row2->lor_id; ?> - <?php echo $row2->lor_name; ?></option>
                              <?php
                              }

                              ?>


                            </select>
                          </div>

                          <input type="hidden" class="form-control" id="assign_emp_role_id" value="<?php echo EMP_ROLE_SALES_REP; ?>" name="assign_emp_role_id" placeholder="Seat Type">


                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="lorry_assign_salesrep" id="lorry_assign_salesrep" value="<?php echo $date ?>;" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>