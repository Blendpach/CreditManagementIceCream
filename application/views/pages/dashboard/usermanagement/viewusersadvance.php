<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>portal/home">Home</a></li>
							<li class="breadcrumb-item"><a href="#">User Management</a></li>
							<li class="breadcrumb-item"><a href="#">View Users</a></li>
              <li class="breadcrumb-item active">Advanced View</li>
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
							

									<div class="form-group">
                    <label for="user_name">National Identity Card No</label>
										<label type="text" class="form-control" > ds</label>
									</div>

									<div class="form-group">
                    <label for="user_name">Name</label>
                    <label type="text" class="form-control" > <?php echo $_SESSION['n_user_name']?></label>
									</div>
									<div class="form-group">
                    <label for="user_tpno">User Role</label>
										<label type="text" class="form-control" > ds</label>
									</div>

									<div class="form-group">
                    <label for="user_note">Created On</label>
										<label type="text" class="form-control" > ds</label>
									</div>
									<div class="form-group">
                    <label for="user_note">Created ID</label>
										<label type="text" class="form-control" > ds</label>
									</div>

									<div class="form-group">
                    <label for="user_note">Special Note</label>
										<label type="text" class="form-control" > ds</label>
									</div>
									

									
								
								<!-- /.form-group -->
								
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

							<div class="form-group">
                    <label for="user_eno">Employee ID</label>
										<label type="text" class="form-control" > ds</label>
									</div>
											
									<div class="form-group">
                    <label for="user_tpno">Mobile Number</label>
										<label type="text" class="form-control" > ds</label>
																</div>
									<div class="form-group">
                    <label for="user_tpno">User Statues</label>
                    <label type="text" class="form-control" > ds</label>
									</div>
									
									<div class="form-group">
                    <label for="user_note">Updated On</label>
										<label type="text" class="form-control" > ds</label>
									<div class="form-group">
                    <label for="user_note">Updated ID</label>
                    <label type="text" class="form-control" > ds</label>
									</div>
									
									<div class="form-group">
                    <label for="user_address">Address</label>
                    <label type="text" class="form-control" > ds</label>
									</div>
									
									<div class="form-group">
                    <label for="user_name">National Identity Card No</label>
                    <input type="text" class="form-control" id="user_nic" name="user_nic" placeholder="NIC" required>
									</div>

									<div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" required>
									</div>



						
									
							
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
var qq = document.getElementById("user_password1");
pp.value = retVal;
pp.readOnly = true;
qq.value = retVal;
qq.readOnly = true;

}
</script>


	 
	 <script type="text/javascript"> 
               
               
              
							 function load_director(){   
																	
															 var user_name = document.getElementById('user_name');
															 var user_nic = document.getElementById('user_nic');
															 // var user_role = document.getElementById('user_role');
															//  var user_tpno = document.getElementById('user_tpno'); 
															//  var user_eno = document.getElementById('user_eno');
															//  var user_address = document.getElementById('user_address');
															//  var user_note = document.getElementById('user_note');
							 
							 
															 var more_user_details = document.getElementById('more_user_details').value;
							 
																				 console.log(more_user_details)           
																			 var url = '<?php echo base_url('portal/users/moreuser'); ?>';
								
																				 $.post(url, { more_user_details:more_user_details }, 
																					 function (data){
																					 if(data!='no'){
																				 
																							 var obj = JSON.parse(data); 
																							 var res = []; 
														 
																								for(var i in obj) 
																								 res.push(obj[i]);
							 
																					 
																						//alert(res[0][2]);
							 
																						user_nic.value = res[0][0];
																						// date_became_director.value =  res[1];
																						// date_ceasedtobe_director.value =  res[2];
																						user_name.value =  res[0][1];
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
							 
																												if(select_id_type=='NIC'){
																													 $("#select_id_type").prop('selectedIndex', 1);
																												 
																												}
																											 
							 
															}
							 
												
								 
																 </script>
