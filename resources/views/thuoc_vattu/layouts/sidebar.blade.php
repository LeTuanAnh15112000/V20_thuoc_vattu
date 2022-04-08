  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">V20</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('images/user/'.Auth::user()->anh_dai_dien) }}" class="img-circle elevation-2" alt="User Image"
                id="nav-left-avatar">
         </div>
         <div class="info">
          <a href="{{ route('manager.profile') }}" class="d-block"
              id="nav-left-name">
              {{ Auth::user()->cadresByUserAuth()->ho_ten }}
              <br/>
              <span style="font-size: 14px;">
                  @if (Auth::user()->healthFacilityByUser() !=  null)
                      {{Auth::user()->healthFacilityByUser()->ten_co_so_y_te}}
                  @else
                      Quản trị viên
                  @endif
              </span>
          </a>
      </div>
        </div>
  
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fa fa-user-md"></i>
                <p>
                  DANH MỤC
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/list_thuoc/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thuốc</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/list_vattu/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Vật tư</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/list_duongdung/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đường dung</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/list_nhacungcap/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nhà cung cấp</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/list_hangsanxuat/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hãng sản xuất</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/list_nuocsanxuat/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nước sản xuất</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fa fa-plus-square"></i>
                <p>
                  Quản lý kho
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kho chính</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kho lẻ</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fa fa-clipboard"></i>
                <p>
                  Quản lý nhập kho
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/lapphieunhap/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lập phiếu nhập</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nhập</p>
                  </a>
                </li>
               
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fa fa-file"></i>
                <p>
                  Quản lý xuất kho
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lập phiếu xuất</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>xuất</p>
                  </a>
                </li>
               
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fa fa-file"></i>
                <p>
                  Thanh lý thuốc hết hạn
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/manager/thuoc_vattu/thanhlythuochethan/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách thuốc hết hạn</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fa fa-clipboard"></i>
                <p>
                  Quản lý và kết xuất các thông tin báo cáo
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Biên bản kiểm nhập</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Biên bản kiểm kê</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thẻ kho</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- Logout --}}
            <li class="nav-item">
              <a href="http://127.0.0.1:8000" class="nav-link bg-danger"  style="cursor: pointer">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p >
                      Đăng xuất
                  </p>
              </a>
          </li>
            {{-- Logout --}}



          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
 
  