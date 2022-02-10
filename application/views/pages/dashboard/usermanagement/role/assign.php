
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Role Assign</h1>
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
		<?php
// Return current date from the remote server
$date = date('d-m-y h:i:s');

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">User Role Assign</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
							<form method="post" action="<?php echo base_url('portal/users/assignrole'); ?>">

							<!-- <input type="hidden" name="user_updateid" value="<?php echo $_SESSION['passed_user_national'] ?>" />
							<input type="hidden" name="user_updatetime" value="<?php echo $date; ?>" />
                <div class="form-group">
                  <label>Select User</label>
                  <select id="get_user"
                           name="get_user"
                           onchange="load_director()" class="form-control select2"  style="width: 100%;">								
													                                
													 <?php 

for($i = 0 ; $i < count($_SESSION['user_nic_list']) ; $i++) 
			 {                                                  
echo '<option value="'.$_SESSION['user_role_list'][$i].'">'.$_SESSION['user_nic_list'][$i].'</option>';
			 }
														
				 ?>
                  </select>
					</div> -->
								<!-- <br>
								<h5> Assign New Role </h5>
						<hr> -->

				<div class="form-group">
					<label>Select User</label>
					<select id="get_user_list"
                           name="get_user_list"  onchange="load_director1()"  class="form-control select2" style="width: 100%;">								
													                                
													 <?php 

for($i = 0 ; $i < count($_SESSION['user_nic_list']) ; $i++) 
			 {                                                  
echo '<option value="'.$_SESSION['user_nic_list'][$i].'">'.$_SESSION['user_nic_list'][$i].' &nbsp; - &nbsp; '.$_SESSION['user_name_list'][$i].'</option>';
			 }
														
				 ?>
                  </select>
					</div>

					<div class="form-group">
					<label>Select Role</label>
                  		<select name="selected_role" class="form-control select2" style="width: 100%;">
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
                <!-- <div class="form-group">
				<label>Assigned User Role</label>
                        <input type="text" name="user_role" id="user_role" class="form-control" placeholder="" disabled>
                </div> -->
				<!-- /.form-group -->
				
				<div class="form-group">
				<label>User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="" disabled>
                </div>
                
								<br><br><br><br>
											<div  align='right'>
											<button type="submit" value="assign_role" name="assign_role"  class="btn btn-primary">Assign Role</button>
											</div>
                </div>
                <!-- /.form-group -->
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

<script type="text/javascript"> 
               
               
              
function load_director(){   
                   
                
                var user_role = document.getElementById('user_role');
              
console.log(user_role);

                var get_user = document.getElementById('get_user').value;

                          console.log(get_user)           
                        var url = '<?php echo base_url('portal/users/load_role'); ?>';
 
                          $.post(url, { get_user:get_user }, 
                            function (data){
                            if(data!='no'){
                          
                                var obj = JSON.parse(data); 
                                var res = []; 
              
                                 for(var i in obj) 
                                  res.push(obj[i]);

                            
                             //alert(res[0][2]);

														 user_role.value = res[0][1];
                             // date_became_director.value =  res[1];
                             // date_ceasedtobe_director.value =  res[2];
														//  user_name.value =  res[0][1];
														//  user_role.value =  res[0][2];

														//  user_tpno.value = res[0][2];
                        

														//  user_eno.value =  res[0][3];
														//  user_address.value =  res[0][4];
														//  user_note.value = res[0][5];
                           
                            console.log( res[0][4])
                             
                         }
                                     else if(data=='no'){
																			console.log("NOT SAVED");  
 
                                        }
                                         });

                                     

               }

         
	
									</script>
	 
            
<script type="text/javascript"> 
               
               
              
							 function load_director1(){   
                   
									 var user_name = document.getElementById('user_name');
									 var user_nic = document.getElementById('user_nic');
									 // var user_role = document.getElementById('user_role');
								
	 
									 var get_user_list = document.getElementById('get_user_list').value;
	 
														 console.log(get_user_list)           
													 var url = '<?php echo base_url('portal/users/load_user'); ?>';
		
														 $.post(url, { get_user_list:get_user_list }, 
															 function (data){
															 if(data!='no'){
														 
																	 var obj = JSON.parse(data); 
																	 var res = []; 
								 
																		for(var i in obj) 
																		 res.push(obj[i]);
	 
															 
																//alert(res[0][2]);
																user_name.value =  res[0][1];
																user_nic.value = res[0][0];
																// date_became_director.value =  res[1];
																// date_ceasedtobe_director.value =  res[2];
														
															 //  user_role.value =  res[0][2];
	 
																user_tpno.value = res[0][2];
													 
	 
																user_eno.value =  res[0][3];
																user_address.value =  res[0][4];
																user_note.value = res[0][5];
															
															 console.log( res[0][4])
																
														}
																				else if(data=='no'){
																				 console.log("NOT SAVED");  
		
																					 }
																						});
	 
																				
	 
									}
							 
												
								 
																 </script>
									
													 