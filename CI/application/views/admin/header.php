<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin GPIB | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <!-- OPTIONAL CSS -->
    <?php echo $cssPage; ?>
    
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">GPIB</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b> GPIB</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li><a href="#"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li class="header">PANEL MENU</li>
            <li class="treeview">
              <a href="#"><i class='fa fa-book'></i> <span>Menu</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class='fa fa-plus'></i>Tambah Menu</a></li>
                <li><a href="#"><i class='fa fa-gears'></i>Manage Menu</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-file-text'></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class='fa fa-plus'></i>Tambah Page</a></li>
                <li><a href="#"><i class='fa fa-gears'></i>Manage Pages</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-list'></i> <span>Kategori</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>category/form/0"><i class='fa fa-plus'></i>Tambah Kategori</a></li>
                <li><a href="<?php echo base_url(); ?>category/listing"><i class='fa fa-gears'></i>Manage Kategori</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-edit'></i> <span>Post</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>berita/form/0"><i class='fa fa-plus'></i>Tambah Post</a></li>
                <li><a href="<?php echo base_url(); ?>berita/listing"><i class='fa fa-gears'></i>Manage Posts</a></li>
              </ul>
            </li>
            <li class="header">PANEL JEMAAT</li>
            <li><a href="#"><i class='fa fa-user-plus'></i> <span>Tambah Jemaat</span></a></li>
            <li><a href="#"><i class='fa fa-users'></i> <span>Manage Jemaat</span></a></li>
            <li><a href="#"><i class='fa fa-group'></i> <span>Jemaat Menikah</span></a></li>
            
            <li class="header">PANEL USER</li>
            <li><a href="#"><i class='fa fa-users'></i> <span>Manage User</span></a></li>
            <li><a href="<?php echo base_url(); ?>secure/logout/"><i class='fa fa-sign-out'></i> <span>Sign Out</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>