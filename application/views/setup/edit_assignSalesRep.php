<!-- Content Wrapper. Contains page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Assign Sales Rep Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Assign Sales Rep</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?php
date_default_timezone_set("Asia/Colombo");
// Return current date from the remote server
$date = date('d-m-y h:i:s');

?>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Assign Sales Rep Data</h3>


        </div>
        <!-- /.card-header -->
        <form method="post" action="<?php echo base_url('portal/setup/update_assignSaleRep'); ?>">
         
          <div class="card-body">
          
          <?php 
          
          foreach ($get_assignedById as $row) { 
            $record_id = $row->assign_record_id;
            $lor_id = $row->assign_lor_id;
            $emp_id = $row->assign_emp_id;
          }
          ?>
          
            <div class="row">
            
                           <div class="form-group">
                            <label for="user_eno">Sales Rep</label>
                            <input type="text" disabled value="<?php echo $emp_id; ?>">
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


                <input  type=hidden class="form-control" id="updated_date" name="updated_date" value="<?php echo $date; ?>">
                <input  type=hidden class="form-control"name="record_id" value="<?php echo $record_id; ?>" >


              </div>

              <div class="form-group">
                <br>
                <br>

                <button type="submit" name="update_assignSaleRep" class="btn btn-info">Update Edit Assign Sales Rep</button>
              </div>
            </div>

        </form>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
     

      <!-- /.row -->
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
</div>
</section>
</div>
