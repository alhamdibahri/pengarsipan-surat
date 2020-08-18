<!-- Left side column. contains the logo and sidebar --> 
  <aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less --> 
    <section class="sidebar"> 
      <!-- Sidebar user panel --> 
      <div class="user-panel"> 
        <div class="pull-left image"> 
          <img src="application/img/<?php echo $gg['PHOTO'] ?>" class="img-circle" alt="User Image">
        </div> 
        <div class="pull-left info">
          <p><?php echo $_SESSION['FULLNAME'] ?></p> 
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> 
        </div> 
      </div> 
      <!-- sidebar menu: : style can be found in sidebar.less --> 
      <?php if ($_SESSION['LEVEL'] == 'Admin'){ ?>
      <ul class="sidebar-menu"> 
        <li class="header">MAIN NAVIGATION</li> 
        <li class="active treeview"> 
          <a href="index.php"> 
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li> 
         <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-user"></i> 
            <span>User</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-data-user.php"><i class="fa fa-users"></i> Data user</a></li> 
            <li><a href="page-input-user.php?req=add"><i class="fa fa-user-plus"></i> Input User</a></li>
          </ul> 
        </li> 
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-indent"></i> 
            <span>Surat Masuk</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-data-surat-masuk.php"><i class="fa fa-envelope"></i> Data Surat Masuk</a></li> 
            <li><a href="page-input-surat-masuk.php?req=add"><i class="fa fa-pencil-square"></i> Input Surat Masuk</a></li>
          </ul> 
        </li> 
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-outdent"></i> 
            <span>Surat Keluar</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-data-surat-keluar.php"><i class="fa fa-envelope-o"></i> Data Surat Keluar</a></li> 
            <li><a href="page-input-surat-keluar.php?req=add"><i class="fa fa-pencil-square-o"></i> Input Surat Keluar</a></li>
          </ul> 
        </li>
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-print"></i> 
            <span>Disposisi Surat</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-disposisi.php"><i class="fa fa-envelope"></i> Surat Masuk</a></li>
          </ul> 
        </li>
        </ul>
        <?php } else{ ?>
        <ul class="sidebar-menu"> 
        <li class="header">MAIN NAVIGATION</li> 
        <li class="active treeview"> 
          <a href="index.php"> 
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>  
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-indent"></i> 
            <span>Surat Masuk</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-data-surat-masuk.php"><i class="fa  fa-envelope"></i> Data Surat Masuk</a></li> 
            <li><a href="page-input-surat-masuk.php?req=add"><i class="fa fa-pencil-square"></i> Input Surat Masuk</a></li>
          </ul> 
        </li> 
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-outdent"></i> 
            <span>Surat Keluar</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-data-surat-keluar.php"><i class="fa fa-envelope"></i> Data Surat Keluar</a></li> 
            <li><a href="page-input-surat-keluar.php?req=add"><i class="fa fa-pencil-square-o"></i> Input Surat Keluar</a></li>
          </ul> 
        </li>
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-print"></i> 
            <span>Disposisi Surat</span> 
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i> 
            </span> 
          </a> 
          <ul class="treeview-menu"> 
            <li><a href="page-disposisi.php"><i class="fa fa-envelope"></i> Surat Masuk</a></li>
          </ul> 
        </li>
        </ul>
        <?php } ?>
    </section> 
    <!-- /.sidebar --> 
  </aside> 