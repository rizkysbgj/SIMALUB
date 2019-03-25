<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
        m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul id="sidebar" class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamandashboardTopManagement">
                <a href="{{ url('/halamandashboardTopManagement') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard Top Management
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">
                                    2
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="">
                <a href="{{ url('/') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-statistics"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard Manajer Teknis
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">
                                    2
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamandashboardPerformaAnalis">
                <a href="{{ url('/halamandashboardPerformaAnalis') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-users"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard Performa Analis
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">
                                    2
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li id="parent" class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Analisis dan Pengujian
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Management
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <!-- MODUL PROJECT -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanProject">
                <a href="{{ url('halamanProject') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-folder-1"></i>
                    <span class="m-menu__link-text">
                        Proyek
                    </span>
                </a>
            </li>
            <!-- MODUL LAPORAN -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanLaporan">
                <a href="{{ url('halamanLaporan') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-comment"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Laporan
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger warnaBadge" style="display:none;" id="TotalLaporan">
                                    
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <!-- MODUL STAFF -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanStaff">
                <a href="{{ url('halamanStaff') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-avatar"></i>
                    <span class="m-menu__link-text">
                        Staff
                    </span>
                </a>
            </li>
            <!-- MODUL JABATAN -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanJabatan">
                <!-- m-menu__item {{Request::is('halamanJabatan')?'m-menu__item--active':''}} -->
                <a href="{{ url('halamanJabatan') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">
                        Jabatan
                    </span>
                </a>
            </li>
            <!-- MODUL PinnedProject Administrasi -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanpinnedProjectAdministrasi">
                <!-- m-menu__item {{Request::is('halamanJabatan')?'m-menu__item--active':''}} -->
                <a href="{{ url('halamanpinnedProjectAdministrasi') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-file"></i>
                    <span class="m-menu__link-text">
                        Pembuatan Sertifikat
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->

<script src="{{ asset('assets/app/js/sidebar.js') }}" type="text/javascript"></script>
