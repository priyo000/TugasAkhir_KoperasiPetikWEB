<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="<?=base_url()?>index.php/user">
            <i class="fa fa-files-o"></i>
            <span>User Manager</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
        </li>
        <li>
          <a href="<?=base_url()?>index.php/produk">
            <i class="fa fa-th"></i> <span>Products</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>PENJUALAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>index.php/penjualan/order"><i class="fa fa-circle-o"></i> Orders</a></li>
            <li><a href="<?=base_url()?>index.php/penjualan/histori"><i class="fa fa-circle-o"></i> History Penjualan</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> History Saldo</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Others</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>index.php/others/investasi"><i class="fa fa-circle-o"></i> Investasion</a></li>
            <li><a href="<?=base_url()?>index.php/others/hutang"><i class="fa fa-circle-o"></i> List Hutang</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>