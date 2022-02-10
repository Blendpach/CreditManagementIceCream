<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div align="center">
    <!-- <a href="<?php echo base_url(); ?>portal/home" class="brand-link">
      <img src="<?php echo base_url(); ?>dist/img/logo.jfif">
      
    </a> -->
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a class="d-block h4"> <?php echo $_SESSION['passed_user_name']; ?></a>
        <a class="d-block">NIC : <?php echo $_SESSION['passed_user_national']; ?></a>
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
          <a href="<?php echo base_url(); ?>portal/home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>Inventory</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/stock/action/stockin" class="nav-link">
            <i class="nav-icon fa fa-arrow-up"></i>
            <p>Stock In</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/stock/action/viewinventory" class="nav-link">
            <i class="nav-icon fa fa-arrow-up"></i>
            <p>View Inventory</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="#" class="nav-link">

            <p>Credit Managment </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/credit/action/add_credit" class="nav-link">
            <i class="nav-icon fa fa-arrow-up"></i>

            <p>Add Credits</p>


          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/credit/action/credit_remain" class="nav-link">
            <i class="nav-icon fa fa-arrow-down"></i>
            <p>Collect Credit</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/credit/action/check_summary" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Summary</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/report/action/home" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Reports</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>portal/report/action/cheque_find" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Reports Cheque</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">

            <p>System Setting </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-link"></i>
            <p>
              Main Setup
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/setup/action/setup_lorry" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lorry Management</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/setup/action/setup_sales_rep" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sales Rep Maangement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/setup/action/setup_collectors" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Collectors Maangement</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa fa-user-circle nav-icon"></i>

            <p>
              User Management
              <i class="fas fa-angle-left right"></i>
              <!--<span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/users/account/addnew" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/users/account/viewusers" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/users/account/edituser" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/users/account/changeuserpassword" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Change User Password</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/users/account/deleteuser" class="nav-link">
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
              <a href="<?php echo base_url(); ?>portal/users/role/assign" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Role Assign</p>
              </a>
            </li>





          </ul>
        </li>







    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>