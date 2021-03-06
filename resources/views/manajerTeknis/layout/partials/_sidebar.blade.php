<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
        m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul id="sidebar" class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            
            @if(in_array(Auth::user()->IDRole,[1, 2, 3, 6]))
            <!-- Dashboard Top Management -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamandashboardTopManagement">
                <a href="{{ url('/halamandashboardTopManagement') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard Top Management
                            </span>
                            
                        </span>
                    </span>
                </a>
            </li>
            @endif
            @if(in_array(Auth::user()->IDRole,[1,2,3,6]))
            <!-- Dashboard Manajer Teknis -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="">
                <a href="{{ url('/') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-statistics"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard Manajer Teknis
                            </span>
                            
                        </span>
                    </span>
                </a>
            </li>
            @endif
            @if(in_array(Auth::user()->IDRole,[1,3,4,5,6]))
            <!-- Dashboard Performa Analis -->
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamandashboardPerformaAnalis">
                <a href="{{ url('/halamandashboardPerformaAnalis') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-users"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard Performa Analis
                            </span>
                            
                        </span>
                    </span>
                </a>
            </li>
            @endif
            @if(in_array(Auth::user()->IDRole,[1,3,4,5,6]))
            <!-- Pinned -->
            <li id="parent" class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Analisis dan Pengujian
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            
            <!-- Halaman Saya -->
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Halaman Saya
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanTugasSaya">
                <a href="{{ url('halamanTugasSaya') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-paper-plane"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Tugas Saya
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger warnaBadgeTugasSaya" style="display:none;" id="TotalTugasSaya">
                                    
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            @endif
            @if(in_array(Auth::user()->IDRole,[1,3,6]))
            <!-- Master -->
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Management
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            @endif
            <!-- MODUL PROJECT -->
            @if(in_array(Auth::user()->IDRole,[1,3,6]))
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanProject">
                <a href="{{ url('halamanProject') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-folder-1"></i>
                    <span class="m-menu__link-text">
                        Proyek
                    </span>
                </a>
            </li>
            @endif
            <!-- MODUL LAPORAN -->
            @if(in_array(Auth::user()->IDRole,[1,3,6]))
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
            @endif
            <!-- MODUL PinnedProject Administrasi -->
            @if(in_array(Auth::user()->IDRole,[1,6]))
            <li class="m-menu__item sidebarActive" aria-haspopup="true" m-menu-submenu-toggle="hover" id="halamanpinnedProjectAdministrasi">
                <a href="{{ url('halamanpinnedProjectAdministrasi') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Pembuatan Sertifikat
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger warnaBadgeSertifikat" style="display:none;" id="TotalPembuatanSertifikat">
                                    
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
