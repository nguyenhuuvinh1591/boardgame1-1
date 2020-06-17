<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Boardgame</div>
  </a>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="admin.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Trang chủ</span></a>
  </li>

  <!-- Heading -->

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fa fa-users"></i>
      <span>Quản lý người dùng</span>
    </a>
    <div id="collapseTwo" class="collapse" >
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="userlist.php">Danh sách quản trị viên</a>
        <a class="collapse-item" href="customerlist.php">Danh sách khách hàng</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fa fa-box"></i>
      <span>Quản lý sản phẩm</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="category.php">Danh mục sản phẩm</a>
        <a class="collapse-item" href="product.php">Danh sách sản phẩm</a>
        <a class="collapse-item" href="productadd.php">Thêm sản phẩm</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="cartlist.php"  >
      <i class="fa fa-shopping-cart"></i>
      <span>Quản lý đơn hàng</span>
    </a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="statictic.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Thống kê doanh thu</span></a>
  </li>


</ul>