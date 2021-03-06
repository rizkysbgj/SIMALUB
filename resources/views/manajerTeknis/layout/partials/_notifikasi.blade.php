<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
    @if($listNotifikasi['totalNotifikasi'] > 0)
    <span class="m-nav__link-badge m-badge m-badge--danger">
        {{ $listNotifikasi['totalNotifikasi'] }}
    </span>
    @endif
    <span class="m-nav__link-icon">
        <i class="flaticon-music-2"></i>
    </span>
</a>
<div class="m-dropdown__wrapper">
    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
    <div class="m-dropdown__inner" style="width:300px;">
        <div class="m-dropdown__header m--align-center"
            style="background: url(../../assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
            <span class="m-dropdown__header-title">
                {{ $listNotifikasi['totalNotifikasi'] }}
            </span>
            <span class="m-dropdown__header-subtitle">
                Notifikasi Baru
            </span>
        </div>
        <div class="m-dropdown__body">
            <div class="m-dropdown__content">
                <div class="tab-content">
                    @if($listNotifikasi['notifikasiList']->count() > 0)
                        @foreach($listNotifikasi['notifikasiList'] as $notifikasi)
                            <div class="tab-pane active klikNotif" id="{{ $notifikasi['IDNotifikasi'] }}" role="tabpanel" style="cursor:pointer;">
                                <div class="m-scrollable" data-scrollable="true" data-max-height="250"
                                    data-mobile-max-height="200">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                            @if( $notifikasi['Dibaca'] == 0)
                                            <div class="m-list-timeline__item">
                                            @else
                                            <div class="m-list-timeline__item m-list-timeline__item--read">
                                            @endif
                                                <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                <span class="m-list-timeline__text">
                                                    {{ $notifikasi['Pesan'] }}
                                                </span>
                                                <span class="m-list-timeline__time">
                                                    {{ $notifikasi['WaktuKirim'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane active" id="" role="tabpanel">
                            <div class="m-scrollable" data-scrollable="true" data-max-height="250"
                                data-mobile-max-height="200">
                                <div class="m-stack__item m-stack__item--center m-stack__item--middle m--align-center">
                                    <span class="">
                                        Tidak Ada
                                        <br>
                                        Notifikasi Baru
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/app/js/notifikasi.js') }}" type="text/javascript"></script>