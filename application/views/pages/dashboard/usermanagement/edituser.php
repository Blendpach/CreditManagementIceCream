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
              <li class="breadcrumb-item active">Edit User</li>
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
							<form method="post" action="<?php echo base_url('portal/users/useredit'); ?>">
							<input type="hidden" name="user_updateid" value="<?php echo $_SESSION['passed_user_national'] ?>" />
							<input type="hidden" name="user_updatetime" value="<?php echo $date; ?>" />
							<!-- <input type="hidden" name="user_date" value="<?php echo $date; ?>" />
							<input type="hidden" name="user_crid" value="<?php echo $_SESSION['passed_user_national'] ?>"  /> -->
							<div class="form-group">
                  <label>Select User</label>
                  <select id="get_user_list"
                           name="get_user_list"
                           onchange="load_director()"class="form-control select2" style="width: 100%;">								
													 <option selected >Select User NIC</option>                               
													 <?php 

for($i = 0 ; $i < count($_SESSION['user_nic_list']) ; $i++) 
			 {                                                  
echo '<option value="'.$_SESSION['user_nic_list'][$i].'">'.$_SESSION['user_nic_list'][$i].' &nbsp; - &nbsp; '.$_SESSION['user_name_list'][$i].'</option>';
			 }
														
				 ?>
                  </select>
								</div>

									<div class="form-group">
                    <label for="user_name">National Identity Card No</label>
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
                    <input type="text" class="form-control" id="user_tpno" name="user_tpno" placeholder="Mobile Number" required>
									</div>
									
									<!-- <div class="form-group">
                  <label>User Role</label>
                  <select id="user_role" name="user_role" style="width: 100%;">
                    <option  value="1" selected="selected">Alabama</option>
                    <option> Alaska</option>
                    
                  </select>
									</div> -->
									<div class="form-group">
                        <label>User Status</label>
                        <select class="custom-select" id="user_status" name="user_status" >
                          
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                         
                        </select>
                      </div>
									
								
									<div class="form-group">
                    <label for="user_note">Special Note</label>
                    <textarea  class="form-control" id="user_note" name="user_note" placeholder="Special Note"></textarea>
									</div>

									
							

										<div class="form-group" align='right'>
											 <br>
											 <br>
										
										<button  type="submit" value="edit_user" name="edit_user" class="btn btn-primary">Save User</button>
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
                var user_tpno = document.getElementById('user_tpno'); 
                var user_eno = document.getElementById('user_eno');
                var user_address = document.getElementById('user_address');
                var user_note = document.getElementById('user_note');
								var user_status = document.getElementById('user_status');

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

														 user_nic.value = res[0][0];
                             // date_became_director.value =  res[1];
                             // date_ceasedtobe_director.value =  res[2];
														 user_name.value =  res[0][1];
														//  user_role.value =  res[0][2];

														 user_tpno.value = res[0][2];
                        

														 user_eno.value =  res[0][3];
														 user_address.value =  res[0][4];
														 user_note.value = res[0][5];
														 user_status.value = res[0][6];
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
	 
            