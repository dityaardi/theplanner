<div class="row align-items-center bg-primary">
    <!-- nav and search button -->
    <div class="col-md-8 col-sm-8 clearfix">
        <div class="nav-btn pull-left">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="search-box pull-left">
            <div class="search-box pull-left">
                <h6 class="page-title p-2 text-bold text-white">Dashboard | Selamat Datang {{auth()->user()->namapegawai}}</h6>
            </div>
        </div>
    </div>
    <!-- profile info & task notification -->
    <div class="col-md-4 col-sm-4 clearfix">
        <ul class="notification-area pull-right">
            <li class="dropdown">
                <i class="ti-bell dropdown-toggle" style="color: white;" data-toggle="dropdown">
                </i>
                <div class="dropdown-menu bell-notify-box notify-box">
                    <span class="notify-title bg-primary">NOTIFICATIONS</span>
                    <div class="nofity-list">
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="fa fa-mortar-board btn-danger"></i></div>
                            <div class="notify-text">
                                <p>Rencana Kegiatan : Pelantikan Guru TK</p>
                                <span>Baru saja</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="fa fa-mortar-board btn-info"></i></div>
                            <div class="notify-text">
                                <p>Rencana Kegiatan : Pelantikan Guru PLB</p>
                                <span>4 hari yang lalu</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="fa fa-group btn-primary"></i></div>
                            <div class="notify-text">
                                <p>Rencana Kegiatan : Meeting di Hotel</p>
                                <span>1 minggu yang lalu</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                            <div class="notify-text">
                                <p>Rencana Kegiatan : Talkshow PPPPTK TK&PLB</p>
                                <span>2 minggu yang lalu</span>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <i class="ti-settings" style="color: white;" data-toggle="dropdown">
                </i>
                <ul class="dropdown-menu bg-primary">
                    <li><a class="dropdown-item text-white" href="/profil"><i class="fa fa-user"></i> PROFILE</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item text-white"><i class="fa fa-sign-out"></i> LOGOUT</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>