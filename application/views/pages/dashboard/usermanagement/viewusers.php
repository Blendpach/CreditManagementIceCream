<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>portal/home">Home</a></li>
							<li class="breadcrumb-item"><a href="#">User Management</a></li>
              <li class="breadcrumb-item active">View Users</li>
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
            
              
              <!-- /.card-header -->
              
						<div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
									<th></th>
                    <th>NIC Number</th>
										<th>Name</th>
										<th>Employee ID</th>
                    <th>Phone</th>
										<th>Role</th>
										<th>Status</th>
										<th align = "center">Action</th>
                  
                  
                  </tr>
                  </thead>
                  <tbody  id="#example1">

									<?php 

for($i = 0 ; $i < count($_SESSION['user_id_list']) ; $i++) 
			 {                                                  
									
				 ?>

                  <tr>
									<td><?php echo $i + 1 ?></td>
                    <td><?php echo $_SESSION['user_nic_list'][$i]?></td>
                    <td><?php echo $_SESSION['user_name_list'][$i]?></td>
                    <td><?php echo $_SESSION['user_eno_list'][$i]?></td>
                    <td> <?php echo $_SESSION['user_tpno_list'][$i]?></td>
										<!-- <td><?php echo $_SESSION['user_roleid_list'][$i]?></td> -->

										<td> <?php if ($_SESSION['user_roleid_list'][$i] == 1){?>
											<span style="color:blue">Super Administrator</span></td>

								<?php		} else if ($_SESSION['user_roleid_list'][$i] == 11){?>
									<span style="color:blue">SuperAdministrator</span></td>

									<?php		} else if ($_SESSION['user_roleid_list'][$i] == 22){?>
									<span style="color:blue">Administrator</span></td>

									<?php	} else if ($_SESSION['user_roleid_list'][$i] == 33){?>
										<span style="color:blue">Booking Manager</span></td>

									<?php	} else if ($_SESSION['user_roleid_list'][$i] ==44){?>
										<span style="color:blue">Property Manager</span></td>

									<?php	} else if ($_SESSION['user_roleid_list'][$i] == 55){?>
										<span style="color:blue">Property Cashier</span></td>

									<?php	} else if ($_SESSION['user_roleid_list'][$i] == 66){?>
										<span style="color:blue">Other Role 1</span></td>

									<?php	} else if ($_SESSION['user_roleid_list'][$i] == 77){?>
										<span style="color:blue">Other Role 2</span></td>

									<?php	} else if ($_SESSION['user_roleid_list'][$i] == 88){?>
										<span style="color:blue">Other Role 3</span></td>

									<?php	}else{?>
											<span class="badge badge-success">Role Not Assigned</span></td>

									<?php	} ?>
										<td> <?php if ($_SESSION['user_statues_list'][$i] == 1){?>
											<span style="color:green">Active</span></td>

								<?php		} else { ?>
									<span style="color:red">Deactive</span></td>

									<?php	} ?>
										
                    <td align = "center">
								<!-- <form  method="post" action="<?php echo base_url('portal/users/moreuser'); ?>"> -->
								
									<button type="button" data-toggle="modal" data-target="#exampleModalLong" onclick = "load_director('<?php echo $_SESSION['user_nic_list'][$i]?>')" id="button"    name="button" class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
								</button>
								<!-- </form> -->
                         </td>
                  </tr>
									<?php 
			 }                                                  
									
									?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
						<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">	
						<div class="form-group">
                    <label >National Identity Card No</label>
                    <input type="text" class="form-control" id="user_nic" name="user_nic" placeholder="NIC" disabled>
									</div>

									<div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" disabled>
									</div>
									<div class="form-group">
                    <label >User Role</label>
										<select class="custom-select" id="user_role" name="user_role" disabled>
                          
													<option value="1">Super Administrator</option>
													<option value="11">Super Administrator</option>
													<option value="22">Administrator</option>
													<option value="33">Booking Manager</option>
													<option value="44">Property Manager</option>
													<option value="55">Property Cashier</option>
													<option value="66">Other Role 1</option>
													<option value="77">Other Role 2</option>
                          <option value="88">Other Role 3</option>
                         
                        </select>
									</div>
								

									<div class="form-group">
                    <label >User Telephone Number</label>
                    <input type="text" class="form-control" id="user_tpno" name="user_tpno" placeholder="TP No" disabled>
									</div>
									<div class="form-group">
                    <label >User Employee Number</label>
                    <input type="text" class="form-control" id="user_eno" name="user_eno" placeholder="Employee Number" disabled>
									</div>

									<div class="form-group">
                    <label >User Address</label>
                    <input type="text" class="form-control" id="user_address" name="user_address" placeholder="User Address" disabled>
									</div>
									<div class="form-group">
                    <label >User Note</label>
                    <input type="text" class="form-control" id="user_note" name="user_note" placeholder="Note" disabled>
									</div>

									<div class="form-group">
                    <label >User Created Date</label>
                    <input type="text" class="form-control" id="user_date" name="user_date" placeholder="Created Date" disabled>
									</div>
									<div class="form-group">
                    <label >User Last Updated Time</label>
                    <input type="text" class="form-control" id="user_updatetime" name="user_updatetime" placeholder="Last Update Time" disabled>
									</div>

									<div class="form-group">
                    <label >User Last Updated Employee NIC </label>
                    <input type="text" class="form-control" id="user_updateid" name="user_updateid" placeholder="Last Update NIC" disabled>
									</div>
									<div class="form-group">
                    <label >User Created Employee NIC</label>
                    <input type="text" class="form-control" id="user_crid" name="user_crid" placeholder="Creator NIC" disabled>
									</div>
									<div class="form-group">
										<label >User Status</label>
										<select class="custom-select" id="user_status" name="user_status" disabled>
                          
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                         
                        </select>
                    <!-- <input type="text" class="form-control" id="user_status" name="user_status" placeholder="User Status" disabled> -->
									</div>
									
									</div>
      <div class="modal-footer">
       
        <button type="button" onclick="location.href = '<?php echo base_url('portal/users/account/edituser')?>';" class="btn btn-primary">Edit User</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
	<script type="text/javascript"> 
               
               
              
function load_director(get_user_list){   
                   
                var user_name = document.getElementById('user_name');
                var user_nic = document.getElementById('user_nic');
								var user_date = document.getElementById('user_date');
                var user_role = document.getElementById('user_role');
                var user_tpno = document.getElementById('user_tpno'); 
                var user_eno = document.getElementById('user_eno');
                var user_address = document.getElementById('user_address');
                var user_note = document.getElementById('user_note');
						
                var user_updatetime = document.getElementById('user_updatetime');
                var user_updateid = document.getElementById('user_updateid');
								var user_crid = document.getElementById('user_crid');
                var user_status = document.getElementById('user_status');



                // var get_user_list = document.getElementById('get_user_list').value;

                          console.log(get_user_list)           
                        var url = '<?php echo base_url('portal/users/more_user'); ?>';
 
                          $.post(url, { get_user_list:get_user_list }, 
                            function (data){
                            if(data!='no'){
                          
                                var obj = JSON.parse(data); 
                                var res = []; 
              
                                 for(var i in obj) 
                                  res.push(obj[i]);

                            
                             

														user_nic.value = res[0][0];
														 user_name.value = res[0][1];
														 user_date.value = res[0][2];
														 user_role.value = res[0][3];
														 user_tpno.value = res[0][4];
														 user_eno.value =  res[0][5];
														 user_address.value = res[0][6];
														 user_note.value =  res[0][7];
														 user_updatetime.value =  res[0][8];
														 user_updateid.value =  res[0][9];
														 user_crid.value =  res[0][10];
														 user_status.value =  res[0][11];
                            //  var obj = JSON.parse( res[0][0]); 
                             
                         }
                                     else if(data=='no'){
																			console.log("NOT SAVED");  
 
                                        }
                                         });


               }

         


</script>
