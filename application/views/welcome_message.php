<?php
// if($this->session->userdata('ses_id')=='' || empty($this->session->userdata('ses_id'))){
//  redirect('errors/index.html');
// }
$admin_name=$this->session->userdata('admin_name');

$uri2_para=$this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>Assets/img/favicon.png" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>Assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url(); ?>Assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>Assets/css/style.css" rel="stylesheet">

<style>
  .xxx{
    text-align:center;
    margin-left:20%;
  }
</style>
</head>

<body>
  <section id="container">
    <!--header start-->
    <header style="top:0px;" class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>
        <?php if($admin_name=='admin'){ ?>
          SAUMYA <span>ADMIN</span>
          <?php }else{ ?>
        <?= @$this->session->userdata('medical_name_'); ?>
      <?php } ?>
      </b></a>
      <!--logo end-->
      <?php if($this->session->userdata('admin_name')=="medical"){ ?>
      <a href="" class="logo xxx" ><b>Medical Admin</b></a>
        <?php }else if($this->session->userdata('admin_name')=="staff"){ ?>
      <a href="" class="logo xxx" ><b>Staff Admin</b></a>
          <?php }else if($this->session->userdata('admin_name')=="doctor"){  ?>
            <a href="" class="logo xxx" ><b>Doctor Admin</b></a>

          <?php }else if($this->session->userdata('admin_name')=="admin"){  ?>
      <a href="" class="logo xxx" ><b>Super Admin</b></a>
            <?php } ?>
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?= base_url('main/logoutUser'); ?>">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div style="top:0px;" id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url().'Main/getDashboard'; ?>"><img src="<?= base_url(); ?>Assets/img/login-home.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a class="<?php echo $uri2_para=='getDashboard' ? 'active' : ''; ?>" href="<?php echo base_url().'Main/getDashboard'; ?>">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
		<?php if($this->session->userdata('admin_name')=="admin" || $this->session->userdata('admin_name') =="medical"){ ?>
          <li class="mt">
            <a class="<?php echo $uri2_para=='createdoc' ? 'active' : ''; ?>" href="<?php echo base_url().'Main/createdoc'; ?>">
              <i class="fa fa-user-md"></i>
              <span>Add Doctor</span>
              </a>
          </li>
      <?php if($this->session->userdata('admin_name')=="admin"){ ?>
          <li class="mt">
            <a class="<?php echo $uri2_para=='createMedical' ? 'active' : ''; ?>" href="<?php echo base_url().'Main/createMedical'; ?>">
              <i class="fa fa-hospital-o"></i>
              <span>Add Medical</span>
              </a>
          </li>
	  <?php } ?>
          <li class="mt">
            <a class="<?php echo $uri2_para=='createstaff' ? 'active' : ''; ?>" href="<?php echo base_url().'Main/createstaff'; ?>">
              <i class="fa fa-users"></i>
              <span>Add Staff</span>
              </a>
          </li>
          <li class="mt">
            <a class="<?php echo $uri2_para=='disease' ? 'active' : ''; ?>" href="<?php echo base_url().'Main/disease'; ?>">
              <i class="fa fa-thermometer-half"></i>
              <span>Add Disease</span>
              </a>
          </li>
	  <?php } ?>
		<?php if($this->session->userdata('admin_name')=="staff"){ ?>
          <li class="mt">
            <a class="<?php echo $uri2_para=='createPateint' ? 'active' : ''; ?>" href="<?php echo base_url().'Main/createPateint'; ?>">
              <i class="fa fa-user-plus"></i>
              <span>Add Paitent</span>
              </a>
          </li>
          <!-- <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li> -->
          <?php } ?>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>


  </section>
  <!-- js minified file -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>



</body>

</html>
