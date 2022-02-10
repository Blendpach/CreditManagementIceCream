<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
					<?php
// Return current date from the remote server
$date = date('d-m-y h:i:s');

?>
					<!-- /.card-header -->
	
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
						<form method="post" action="<?php echo base_url('portal/users/newroleinsert'); ?>">
							<input type="hidden" name="user_updateid" value="<?php echo $_SESSION['passed_user_national'] ?>" />
							<input type="hidden" name="user_updatetime" value="<?php echo $date; ?>" />
							<input type="hidden" name="user_date" value="<?php echo $date; ?>" />
							<input type="hidden" name="user_crid" value="<?php echo $_SESSION['passed_user_national'] ?>"  />
							<div class="form-group">
                    <label for="user_nic">Role Name</label>
                    <input type="text" class="form-control" id="user_nic" name="role_id" placeholder="Role Name	" required>
									</div>

									

									<div class="form-group">
                    <label for="user_note">Special Note</label>
                    <input type="text" class="form-control" id="user_note" name="role_specialnote" placeholder="Special Note">
									</div>

									
								
								<!-- /.form-group -->
								
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

							<div class="form-group">
                    <label for="user_name">Role Description</label>
                    <input type="text" class="form-control" id="user_name" name="role_description" placeholder="Role Description" required>
									</div>
									
			
									
									<br><br><br><br>
									<br>

										<div class="form-group">
											 <br>
										
											 <div  align='right'>
											<button type="submit" value="addnew_role" name="addnew_role" class="btn btn-primary">Add Role</button>
											</div>
                      
									</div>
										
</form>
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
          <!-- /.card-body -->
         
        </div>
        <!-- /.card -->

        
             
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
		<!-- /.content -->
	
</div>

<script>


function generate_password(){   

var length = 8,
		charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
		retVal = "";
for (var i = 0, n = charset.length; i < length; ++i) {
		retVal += charset.charAt(Math.floor(Math.random() * n));
}

var pp = document.getElementById("user_password");
pp.value = retVal;
pp.readOnly = true;

}
</script>

