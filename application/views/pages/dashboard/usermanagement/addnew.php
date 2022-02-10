<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url();?>portal/home">Home</a></li>
							<li class="breadcrumb-item"><a href="#">User Management</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
							<form method="post" action="<?php echo base_url('portal/users/newuserinsert'); ?>">
							<input type="hidden" name="user_updateid" value="<?php echo $_SESSION['passed_user_national'] ?>" />
							<input type="hidden" name="user_updatetime" value="<?php echo $date; ?>" />
							<input type="hidden" name="user_date" value="<?php echo $date; ?>" />
							<input type="hidden" name="user_crid" value="<?php echo $_SESSION['passed_user_national'] ?>"  />
							<div class="form-group">
                    <label for="user_nic">National Identity Card No</label>
                    <input type="text" class="form-control" id="user_nic" name="user_nic" placeholder="NIC" required>
									</div>

									<div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" required>
									</div>

									<div class="form-group">
                    <label for="user_address">Address</label>
                    <textarea class="form-control" id="user_address" name="user_address" rows="3" placeholder="Address"></textarea>
									</div>
									<div class="form-group">
                  <label>User Role</label>
                  <select class="form-control select2" id="user_role" name="user_role" style="width: 100%;">
									<?php 

for($i = 0 ; $i < count($_SESSION['user_role_id_list']) ; $i++) 
			 {                                                  
echo '<option value="'.$_SESSION['user_role_id_list'][$i].'">'.$_SESSION['user_role_name_list'][$i].'</option>';
			 }
														
				 ?>
                    
                  </select>
                	</div>
									

									
								
								<!-- /.form-group -->
								
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

							<div class="form-group">
                    <label for="user_eno">Employee ID</label>
                    <input type="text" class="form-control" id="user_eno" name="user_eno" placeholder="Employee ID" required>
									</div>
											
									<div class="form-group">
                    <label for="user_tpno">Mobile Number</label>
                    <input type="text" class="form-control"  d8validation="phone" id="user_tpno" name="user_tpno" placeholder="Mobile No" >
									</div>
									
									<div class="form-group">
                    <label for="user_note">Special Note</label>
                    <input type="text" class="form-control" id="user_note" name="user_note" placeholder="Special Note">
									</div>
									
									
									<div class="form-group">
										<br>
										<br>
									<label for="exampleInputEmail1">Password</label>
									<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <a id="generate_password" name="addnew_director" onclick="generate_password()" class="btn btn-danger">Generate Password</a>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" id="user_password" name="user_password" type="password"  class="form-control"  placeholder="Enter password" required>
                </div>
										</div>

										<div class="form-group" align="right">
											 <br>
											 <br>
										
										<button  type="submit" value="addnew_user" name="addnew_user" class="btn btn-primary">Save New User</button>
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

