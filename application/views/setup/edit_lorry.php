<!-- Content Wrapper. Contains page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lorry Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Lorry Edit</li>
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
          <h3 class="card-title">Edit Lorry Data</h3>


        </div>
        <!-- /.card-header -->
        <form method="post" action="<?php echo base_url('portal/setup/update_lorry'); ?>">
         
          <div class="card-body">
          
          <?php 
          
          foreach ($get_lorry_by_id as $row) { 
            $lor_id = $row->lor_id;
            $lor_name = $row->lor_name;
            $lor_detail = $row->lor_detail;
          }
          ?>
          
            <div class="row">
            
                <div class="form-group">
                  <label for="exampleInputEmail1">Lorry Name</label>
                  <input type=text class="form-control" id="lor_name" name="lor_name" value="<?php echo $lor_name; ?>" placeholder="Lorry Name" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Lorry Description</label>
                  <input  type=text class="form-control" id="lor_detail" name="lor_detail" value="<?php echo $lor_detail; ?>"  placeholder="Lorry Description">
                </div>

                <input  type=hidden class="form-control" id="updated_date" name="updated_date" value="<?php echo $date; ?>">
                <input  type=hidden class="form-control"name="lor_id" value="<?php echo $lor_id; ?>" >


              </div>

              <div class="form-group">
                <br>
                <br>

                <button type="submit" name="update_lor" class="btn btn-info">Update Lorry</button>
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
