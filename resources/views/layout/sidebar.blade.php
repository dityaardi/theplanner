<div class="sidebar-header bg-primary">
    <div class="row logo" style="font-size:large; color:white;" bold>
        <a href="/home"><img src="images/lgoo.png" alt="logo" style="width: 50%;"></a>
        <p class="mt-3 text-white">THE PLANNER</p>
    </div>
</div>
<div class="main-menu">
    <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">
                <li class="">
                    <a href="/home" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                </li>
                @can('superadmin')
                <li>
                    <a href="javascript:void(0)" aria-expanded="false"><i class="fa fa-mortar-board text-white"></i><span>Super Admin</span></a>
                    <ul class="collapse">
                        <li class="{{ Request::is('jenis-program') ? 'active' : '' }}"><a href="/jenis-program">Data Jenis Program</a></li>
                        <li class="{{ Request::is('jen-keg-non-diklat') ? 'active' : '' }}"><a href="/jen-keg-non-diklat">Data Non Diklat</a></li>
                        <li class="{{ Request::is('jenis-pembiayaan') ? 'active' : '' }}"><a href="/jenis-pembiayaan">Data Pembiayaan</a></li>
                        <li class="{{ Request::is('apd') ? 'active' : '' }}"><a href="/apd">Data APD</a></li>
                        <li class="{{ Request::is('jenis-perlengkapan') ? 'active' : '' }}"><a href="/jenis-perlengkapan">Data Perlengkapan</a></li>
                        <hr class="sidebar-divider d-none d-md-block">
                        <li class="{{ Request::is('jenis-barang') ? 'active' : '' }}"><a href="/jenis-barang">Data Jenis Barang</a></li>
                        <li class="{{ Request::is('jenis-belanja-inventaris') ? 'active' : '' }}"><a href="/jenis-belanja-inventaris">Data Belanja Inventaris</a></li>
                        <li class="{{ Request::is('jenis-pengadaan') ? 'active' : '' }}"><a href="/jenis-pengadaan">Data Moda Pengadaan</a></li>
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
    </div>
</div>