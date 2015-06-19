<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin GPIB | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <!-- OPTIONAL CSS -->
    <?php echo $cssPage; ?>
    <style type="text/css">
        .formslider { display:none };
    </style>
    
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
        <a href="<?php echo base_url(); ?>secure/dashboard" class="logo">
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
          <?php $user = $this->secure_model->get_user($this->session->userdata('user_id')); ?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $user->fullname; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $user->fullname; ?> - <?php if ($user->is_admin == 1) echo 'Administrator'; else  echo 'Standard User'; ?>
                      <small>Member since <?php echo $user->created_at; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
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
            <li><a href="<?php echo base_url(); ?>secure/dashboard"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li class="header">PANEL MENU</li>
            <li><a href="<?php echo base_url(); ?>page/listing"><i class='fa fa-sitemap'></i> <span>Menu Pages</span></a></li>
            <li><a href="<?php echo base_url(); ?>category/listing"><i class='fa fa-list'></i> <span>Kategori Berita</span></a></li>
            <li><a href="<?php echo base_url(); ?>berita/listing"><i class='fa fa-edit'></i> <span>Post Berita</span></a></li>
            <li><a href="<?php echo base_url(); ?>gallery"><i class='fa fa-users'></i> <span>Galery Foto</span></a></li>
            <li class="header">PANEL JEMAAT</li>
            <li class="treeview">
              <a href="#"><i class='fa fa-user'></i> <span>Jemaat GPIB</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>jemaat/listing"><i class='fa fa-users'></i>Manage Jemaat</a></li>
                <li><a href="<?php echo base_url(); ?>nikah/listing"><i class='fa fa-user-plus'></i>Jemaat Menikah</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-users'></i> <span>Kehadiran Jemaat</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>ibadah/kategori/0"><i class='fa fa-gears'></i>Kategori Ibadah</a></li>
                <li><a href="<?php echo base_url(); ?>ibadah/kehadiran/0"><i class='fa fa-user-plus'></i>Tambah Kehadiran</a></li>
                <li><a href="<?php echo base_url(); ?>ibadah/statistik"><i class='fa fa-users'></i>Statistik Kehadiran</a></li>
              </ul>
            </li>
            
            <li class="header">PANEL USER</li>
            <li><a href="<?php echo base_url(); ?>secure/users"><i class='fa fa-users'></i> <span>Kelola User</span></a></li>
            <li><a href="<?php echo base_url(); ?>secure/password/"><i class='fa fa-gears'></i> <span>Ganti Password</span></a></li>
            <li><a href="<?php echo base_url(); ?>secure/logout"><i class='fa fa-sign-out'></i> <span>Sign Out</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>