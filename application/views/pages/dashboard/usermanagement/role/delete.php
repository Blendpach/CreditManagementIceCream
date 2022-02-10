
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delete Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select User Role to Delete</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
							<form method="post" action="<?php echo base_url('portal/users/deleteuserrole'); ?>">
                <!-- <div class="form-group">
                  <label>Select User</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    
                  </select>
								</div> -->
								<div class="form-group">
                        <label>Select Role ID</label>
                        <select id="get_user_list"
                           name="get_user_list"
                           onchange="load_director()"class="form-control select2" style="width: 100%;">								
													                                
													 <?php 

for($i = 0 ; $i < count($_SESSION['user_role_id_list']) ; $i++) 
			 {                                                  
echo '<option value="'.$_SESSION['user_role_id_list'][$i].'">'.$_SESSION['user_role_name_list'][$i].'</option>';
			 }
														
				 ?>
                  </select>
                      </div>

                <!-- /.form-group -->
               <br>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <!-- /.form-group -->
                <div class="form-group">
                        <label>User Role Name</label>
                        <input type="text"  class="form-control" placeholder="" disabled>
											</div>
								<br>
											<div  align='right'>
											<button type="submit" class="btn btn-primary"  value="delete_userrole" name="delete_userrole" >Delete User Role</button>
											</div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

						</form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
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
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
