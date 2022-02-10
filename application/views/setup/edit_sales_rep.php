<!-- Content Wrapper. Contains page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales Rep Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sales Rep Edit</li>
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
          <h3 class="card-title">Edit Sales Rep Data</h3>


        </div>
        <!-- /.card-header -->
        <form method="post" action="<?php echo base_url('portal/setup/update_emp'); ?>">

          <div class="card-body">

          <?php

foreach ($get_emp_by_id as $row) {
    $emp_id = $row->emp_id;
    $emp_role_id = $row->emp_role_id;
    $emp_nic = $row->emp_nic;
    $emp_name = $row->emp_name;
    $emp_nic = $row->emp_nic;
    $emp_contact = $row->emp_contact;
    $emp_email = $row->emp_email;
}
?>

            <div class="row">



              <div class="form-group">
                  <label for="user_eno">Sales Rep Name</label>
                  <input type="text" class="form-control" value="<?php echo $emp_name; ?>" id="emp_name" name="emp_name" placeholder="emp Name">
              </div>

              <div class="form-group">
                  <label for="user_eno">Sales Rep NIC</label>
                  <input type="text" class="form-control" id="emp_nic" value="<?php echo $emp_nic; ?>"  name="emp_nic" placeholder="emp NIC">
              </div>

              <div class="form-group">
                  <label for="user_eno">Sales Rep Contact</label>
                  <input type="number" class="form-control" id="emp_contact" value="<?php echo $emp_contact; ?>"  name="emp_contact" placeholder="emp Contact">
              </div>

              <div class="form-group">
                  <label for="user_eno">Sales Rep Email</label>
                  <input type="email" class="form-control" id="emp_email" value="<?php echo $emp_email; ?>"  name="emp_email" placeholder="emp Email">
              </div>

              <div class="form-group">
                  <label for="user_eno">Sales Rep Basic Salary</label>
                  <input type="email" class="form-control" id="emp_email" value="<?php echo $emp_email; ?>"  name="emp_email" placeholder="emp Basic Salary">
              </div>

              <div class="form-group">
                  <label for="user_eno">Sales Rep Bonus Rate</label>
                  <input type="email" class="form-control" id="emp_email" value="<?php echo $emp_email; ?>"  name="emp_email" placeholder="emp Bonus Rate Eg = 0.25">
              </div>


              <input type="hidden" class="form-control" value=<?php echo EMP_ROLE_SALES_REP; ?> id="emp_role_id" name="emp_role_id">
              <input type="hidden" class="form-control" value=<?php echo $date; ?> id="emp_date" name="emp_date">
              <input  type=hidden class="form-control"name="emp_id" value="<?php echo $emp_id; ?>" >


              </div>

              <div class="form-group">
                <br>
                <br>

                <button type="submit" name="update_emp" class="btn btn-info">Update Sales Rep</button>
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
