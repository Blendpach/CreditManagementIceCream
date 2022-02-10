<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View User Roles</h1>
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
            
              
              <!-- /.card-header -->
              
						<div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
									<th>Id</th>
                    <th>NIC</th>
										<th>Name</th>
										<th>Employee ID</th>
                    <th>Phone</th>
										<th>Role</th>
										<th>Active</th>
										<th align = "center">Action</th>
                  
                  
                  </tr>
                  </thead>
                  <tbody>

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
										<td><?php echo $_SESSION['user_roleid_list'][$i]?></td>
										<td> <?php if ($_SESSION['user_statues_list'][$i] == 1){?>
											<span class="badge badge-success">Active</span></td>

								<?php		} else { ?>
									<span class="badge badge-danger">Deactive</span></td>

									<?php	} ?>
										
                    <td align = "center">
										<input type="text" class="form-control"  value="<?php echo $_SESSION['user_nic_list'][$i]?>"  placeholder="NIC" required>
										<button type="submit" onclick="load_director()"  id="more_user_details"   name="more_user_details" value="<?php echo $_SESSION['user_nic_list'][$i]?>" class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
								</button>
					
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


						
					

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

	<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
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
									
													 