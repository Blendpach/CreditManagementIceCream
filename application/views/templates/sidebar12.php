
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
					<a  class="d-block h4"> <?php echo $_SESSION['passed_user_name']; ?></a>
					<a class="d-block">NIC :  <?php echo $_SESSION['passed_user_national']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?php echo base_url();?>portal/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-id-card nav-icon"></i>

              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/account/addnew" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/account/viewusers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/account/edituser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit User</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/account/changeuserpassword" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change User Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/account/deleteuser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete User</p>
                </a>
							</li>
						
							
             
              <li class="nav-item">

                <a class="nav-link"> 
                  <p>Role Management</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/role/assign" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Role Assign</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/role/addrole" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/role/viewroles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/role/assign_property" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Assign Property</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="<?php echo base_url();?>portal/users/role/delete" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Change Property</p>
                </a>
							</li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
                Property Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/propertys/action/addnew" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Property</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/propertys/action/view" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Properties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/propertys/action/edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Properties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/propertys/action/delete" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete Properties</p>
                </a>
							</li>
							
							<li class="nav-item">
                <a href="<?php echo base_url();?>portal/propertys/action/managecities" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Cities</p>
                </a>
							</li>

							
							<li class="nav-item">
                <a href="<?php echo base_url();?>portal/roomassigns/assign/step1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Property Room Assign</p>
                </a>
							</li>
							
							
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                Room Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/rooms/action/roomstatues" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Status</p>
                </a>
							</li>
							
							<li class="nav-item">

                <a class="nav-link"> 
                  <p>Room Type Management</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>portal/rooms/action/addroomtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Room Type</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/rooms/action/viewroomtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Room Types</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>portal/rooms/action/editroomtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Room Type</p>
                </a>
							</li> -->
							<!-- <li class="nav-item">
                <a href="<?php echo base_url();?>portal/rooms/action/deleteroomtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete Room Types</p>
                </a>
							</li> -->
							
							<li class="nav-item">
                <a href="<?php echo base_url();?>portal/rooms/action/inroomservices" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>In Room Services</p>
                </a>
							</li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Rates Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>portal/roomassigns/assign/ratesmanagement" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Rates</p>
                </a>
              </li>
              
            </ul>
					</li>
					


					<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Booking
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
         
         
          
       
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
