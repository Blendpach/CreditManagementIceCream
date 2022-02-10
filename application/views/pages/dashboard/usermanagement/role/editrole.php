<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User Roles</h1>
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
                  <label>Select User Role Here</label>
                  <select id="get_user_role"
                           name="get_user_role"
                           onchange="load_director()"class="form-control select2" style="width: 100%;">								
													                                
													 <?php 

for($i = 0 ; $i < count($_SESSION['user_role_id_list']) ; $i++) 
			 {                                                  
echo '<option value="'.$_SESSION['user_role_id_list'][$i].'">'.$_SESSION['user_role_name_list'][$i].'</option>';
			 }
														
				 ?>
                  </select>
								</div>

							<div class="form-group">
                    <label for="user_nic">Role Name</label>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Role Name	"  Disabled>
									</div>

									

									

									
								
								<!-- /.form-group -->
								
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

							<div class="form-group">
                    <label for="user_name">Role Description</label>
                    <input type="text" class="form-control" id="role_desc"  name="role_desc" placeholder="" disabled>
									</div>
									<div class="form-group">
                    <label for="user_note">Special Note</label>
                    <input type="text" class="form-control" id="role_note"  name="role_note" placeholder="" disabled>
									</div>
			
									<br>

										<div class="form-group">
											 <br>
										
											 <div  align='right'>
											<button type="submit" value="addnew_role" name="addnew_role" class="btn btn-primary">Save Role Details</button>
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
           
					 function load_director(){   
                   
									 var role_name = document.getElementById('role_name');
									 var role_desc = document.getElementById('role_desc');
									 // var user_role = document.getElementById('user_role');
									 var role_note = document.getElementById('role_note'); 
									
									 var get_user_role = document.getElementById('get_user_role').value;
	 
														 console.log(role_name)           
													 var url = '<?php echo base_url('portal/users/load_role'); ?>';
		
														 $.post(url, {get_user_role:get_user_role}, 
															 function (data){
															 if(data!='no'){
														 
																	 var obj = JSON.parse(data); 
																	 var res = []; 
								 
																		for(var i in obj) 
																		 res.push(obj[i]);
	 
															 
																//alert(res[0][2]);
																role_note.value = res[0][0];
																role_name.value = res[0][1];
																// date_became_director.value =  res[1];
																// date_ceasedtobe_director.value =  res[2];
																role_desc.value =  res[0][2];
															 //  user_role.value =  res[0][2];
	 
															
															 console.log( res[0][1])
																
														}
																				else if(data=='no'){
																				 console.log("NOT SAVED");  
		
																					 }
																						});
	 
									}
	 
						
</script>

