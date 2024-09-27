 <?php include('../../lib/Session.php');
    Session::checkSession();
    ?>
 <?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
    } ?>
 <section class="row menu-slider h-100">
     <div class="menu-slider w-100">
         <ul class="nav flex-column w-100">
             <li class="nav-item w-100">
                 <a href="category.php" class="nav-link">
                     <i class="fa fa-layer-group"></i>
                     <p class="menu-item">Phân loại</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-users"> </i>
                     <p class="menu-item">Người dùng</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-shirt"></i>
                     <p class="menu-item">Sản phẩm</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-address-book"></i>
                     <p class="menu-item">Liên hệ</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa-solid fa-basket-shopping"></i>
                     <p class="menu-item">Đơn hàng</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-street-view"></i>
                     <p class="menu-item">Quyền</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-photo-film"></i>
                     <p class="menu-item">Thư viện ảnh</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-file-import"></i>
                     <p class="menu-item">Nhập-xuất</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa-solid fa-bar-chart"></i>
                     <p class="menu-item">Thống kê</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="" class="nav-link">
                     <i class="fa fa-info"></i>
                     <p class="menu-item">Khác</p>
                 </a>
             </li>
             <li class="nav-item w-100">
                 <a href="?action=logout" class="nav-link">
                     <i class="fa fa-arrow-right-from-bracket"></i>
                     <p class="menu-item">Đăng xuất</p>
                 </a>

             </li>
         </ul>
     </div>
 </section>