<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PAL - Medical Check Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('config/config_css');?>
  <?php $this->load->view('config/config_js');?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(). 'Welcome' ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MCU</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PT.PAL</b> MCU</span>
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
          <li>
            <a href="<?php echo base_url();?>authuser/logout" ><i class="fa fa-sign-out"></i> Log out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/images/empty_user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username');?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo base_url(). 'Welcome' ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="<?php echo base_url(). 'administrator' ?>"><i class="fa fa-users"></i> <span>Administrator</span></a></li>
        <li><a href="<?php echo base_url(). 'pegawai' ?>"><i class="fa fa-child"></i> <span>Pegawai</span></a></li>
        <li><a href="<?php echo base_url(). 'undangan' ?>"><i class="fa fa-envelope-o"></i> <span>Undangan MCU</span></a></li>
        <li><a href="<?php echo base_url(). 'pelaksanaan' ?>"><i class="fa fa-rocket"></i> <span>MCU Terlaksana</span></a></li>
        <li><a href="<?php echo base_url(). 'hasil' ?>"><i class="fa fa-newspaper-o"></i> <span>Hasil MCU</span></a></li>
        <li><a href="<?php echo base_url(). 'rekapitulasi' ?>"><i class="fa fa-desktop"></i> <span>Rekapitulasi MCU</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-area-chart"></i> <span>Grafik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). 'terlaksana' ?>">MCU Terlaksana</a></li>
            <li><a href="<?php echo base_url(). 'kesehatan' ?>">Kesehatan</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PT. PAL Indonesia
        <small>Medical Check Up</small>
      </h1>
	  <!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
	  -->
    </section>

    <!-- Main content -->
    <section class="content">