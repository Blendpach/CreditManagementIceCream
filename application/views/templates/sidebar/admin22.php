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





          </ul>
        







    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>