<?php 
include 'koneksi.php';
$sqllll = mysqli_query($conn,"SELECT * FROM user WHERE ID_USER='".$_SESSION['ID_USER']."'");
$gg = mysqli_fetch_array($sqllll);
?>
<header class="main-header" >
    <!-- Logo -->
    <?php if ($_SESSION['LEVEL'] == 'Admin'){ ?>
    <a href="index.php" class="logo" style="background-color:#9C0;">
    <?php }else{ ?>
    <a href="index.php" class="logo">
    <?php } ?>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>KK</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><b>UKK</b>2018</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php if ($_SESSION['LEVEL'] == 'Admin'){ ?>
    <nav class="navbar navbar-static-top" style="background-color:#9C0;">
    <?php }else{ ?>
    <nav class="navbar navbar-static-top">
    <?php } ?>
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="application/img/<?php echo $gg['PHOTO'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['FULLNAME'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
               <?php if ($_SESSION['LEVEL'] == 'Admin'){ ?>
              <li class="user-header" style="background-color:#9C0;">
               <?php  } else { ?>
               <li class="user-header">
               <?php } ?>
               
          <img src="application/img/<?php echo $gg['PHOTO'] ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['FULLNAME'] ?>
                 <br />XII RPL-2
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
                              <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>