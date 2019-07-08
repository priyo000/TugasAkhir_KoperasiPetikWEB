<header class="main-header">
    <!-- Logo -->
    <?php if ($_SESSION['level']==2) { echo' 
    <a href="'.base_url().'" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src = "'.base_url().'assets/images/priyopng.png" height="50px" width="50px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src = "'.base_url().'assets/images/priyopng.png" height="50px" width="50px"><b>Koperasi </b>PeTIK</span>
    </a>';
    }?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top ">
    <?php if ($_SESSION['level']==1) { echo '
      <a href="'.base_url().'" class="logo" style="background-color:#3c8dbc;">
      <span class="logo-lg">
      <img src = "'.base_url().'assets/images/priyopng.png" height="50px" width="50px"><b>Koperasi </b>PeTIK
      </span>
      </a>'
      ;}?>
      <!-- Sidebar toggle button-->
      <?php if ($_SESSION['level']==2) { 
      echo '<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>';
    }?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Rp. <span><?=$user['saldo']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Dompet Anda</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- end message -->
                  <li>
                      <h4>
                        Saldo  Rp. <span class="pull-right"><?=$user['saldo']; ?></span>
                      </h4>                  
                  </li>
                  <li class="p-10">
                      <h4>
                        Point  Pt. <span class="pull-right"><?=$user['point']; ?></span>
                      </h4>                  
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Lihat Dompet...</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="isi-cart label label-warning"></span>
            </a>
            <ul class="dropdown-menu" style="width:500px;">
              <li class="header">Ini adalah Keranjang</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <table id="xxx" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                  <th></th>
                </tr>
                </thead>
                <tbody class="cart">
                    
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="4">TOTAL DENGAN SALDO </th>
                    <th>Rp. <span class="totalcart"></span> </th>
                  </tr>
                  <tr>
                    <th colspan="4">TOTAL DENGAN POINT</th>
                    <th>Pt. <span class="totalcart2"></span></th>
                  </tr>
                </tfoot>
              </table>
              </li>
              <li class="footer"><div><a class="btn btn-danger btn-block" href="<?=base_url()?>index.php/cart">Bayar</a></div></li>
            </ul>
          </li> 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>/assets/images/user/Default.JPG" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?=$user['name']; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url()?>index.php/profil" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="<?=base_url()?>index.php/user/">
                  <a href="<?=base_url()?>index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>