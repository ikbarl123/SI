<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Toko Bangungan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu</li>
              <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barang.index') }}" class="nav-link"><i class="fas fa-file-invoice "></i><span>Barang</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('restok.index') }}" class="nav-link"><i class="fas fa-file-invoice "></i><span>Restok</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('penjualan.index') }}" class="nav-link"><i class="fas fa-wallet"></i><span>Penjualan</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link"><i class="fas fa-power-off"></i><span>Logout</span></a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </li>
            </ul>           
        </aside>
      </div>