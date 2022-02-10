<!-- Content Wrapper. Contains page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product Edit</li>
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
          <h3 class="card-title">Edit Collector Data</h3>


        </div>
        <!-- /.card-header -->
        <form method="post" action="<?php echo base_url('portal/setup/update_pro'); ?>">
         
          <div class="card-body">
          
          <?php 
          
          foreach ($get_pro_by_id as $row) { 
            $pro_id = $row->pro_id;
            $pro_name= $row->pro_name;
            $pro_sku = $row->pro_sku;
            $pro_desc = $row->pro_desc;
            $pro_cid = $row->pro_cid;          
            $pro_date = $row->pro_date;           
            $pro_active = $row->pro_active; 
           
          }
          ?>
          
            <div class="row">
            
            <input type="hidden" class="form-control" id="pro_id" value="<?php echo $pro_id; ?>"  name="pro_id" placeholder="emp Email">

              <div class="form-group">
                  <label for="user_eno">Collector Name</label>
                  <input type="text" class="form-control" value="<?php echo $pro_name; ?>" id="pro_name" name="pro_name" placeholder="emp Name">
              </div>

              <div class="form-group">
                  <label for="user_eno">Collector NIC</label>
                  <input type="text" class="form-control" id="pro_sku" value="<?php echo $pro_sku; ?>"  name="pro_sku" placeholder="emp NIC">
              </div>

              <div class="form-group">
                  <label for="user_eno">Collector Contact</label>
                  <input type="number" class="form-control" id="pro_desc" value="<?php echo $pro_desc; ?>"  name="pro_desc" placeholder="emp Contact">
              </div>

              <div class="form-group">
                  <label for="user_eno">Collector Email</label>
                  <input type="email" class="form-control" id="pro_cid" value="<?php echo $pro_cid; ?>"  name="pro_cid" placeholder="emp Email">
              </div>
              <div class="form-group">
                  <label for="user_eno">Collector Email</label>
                  <input type="email" class="form-control" id="pro_date" value="<?php echo $pro_date; ?>"  name="pro_date" placeholder="emp Email">
              </div>
              <div class="form-group">
                  <label for="user_eno">Collector Email</label>
                  <input type="email" class="form-control" id="pro_active" value="<?php echo $pro_active; ?>"  name="pro_active" placeholder="emp Email">
              </div>

              </div>

              <div class="form-group">
                <br>
                <br>

                <button type="submit" name="update_pro" class="btn btn-info">Update Producta</button>
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
