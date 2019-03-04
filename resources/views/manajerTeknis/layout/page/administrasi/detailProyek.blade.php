<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">

                <h3 class="m-portlet__head-text">
                    {{ $mstProyekDetail['detailProyek']['NamaProyek'] }}
                    <small>
                        {{$mstProyekDetail['detailProyek']['InisialProyek']}}
                        <!-- {{ $mstProyekDetail['detailProyek']['InisialProyek'] }} -->
                    </small>
                </h3>
            </div>
        </div>
    </div>

    <div class="m-portlet__body" style="padding-top: 0px;">
        <div class="form-group m-form__group">
            <div class="alert m-alert m-alert--default" role="alert" style="margin-bottom: 20px;">
                <div class="col-lg-12 m--align-center" id="btnGenerate">
                    <a href="#" class="btn btn-primary btn-m m-btn m-btn--icon m-btn--pill m-btn--air"
                        style="margin-right: 10px;">
                        <span>
                            <i class="la la-edit"></i>
                            <span>
                                Edit
                            </span>
                        </span>
                    </a>
                    <!-- looping dan kondisi untuk modal dan button -->
                    <!-- disini -->
                    @if($mstProyekDetail['detailProyek']['SiapBuatSertifikat'] == 1)
                        <a href="#" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate"
                            style="margin-left:10px; margin-right:10px" data-toggle="modal">
                            <span>
                                <i class="la la-info"></i>
                                <span>
                                    Mulai Buat Sertifikat
                                </span>
                            </span>
                        </a>
                    @elseif($mstProyekDetail['detailProyek']['SiapBuatSertifikat'] == 2 && $mstProyekDetail['listTugas']->count() == $mstProyekDetail['detailProyek']['TotalTugas'])
                        <a href="#" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate"
                            style="margin-left:10px; margin-right:10px" data-toggle="modal">
                            <span>
                                <i class="la la-info"></i>
                                <span>
                                    Selesai Buat Sertifikat
                                </span>
                            </span>
                        </a>
                    @elseif($mstProyekDetail['detailProyek']['SiapBuatSertifikat'] == 2 && $mstProyekDetail['listTugas']->count() != $mstProyekDetail['detailProyek']['TotalTugas'])
                        <a href="#" class="btn btn-metal active btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate"
                            style="margin-left:10px; margin-right:10px" data-toggle="modal">
                            <span>
                                <i class="la la-info"></i>
                                <span>
                                    Selesai Buat Sertifikat
                                </span>
                            </span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">

                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">

                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-user"></i>
                            </span>
                            <span class="text-sm-left">
                                Tugas Berada di : <br>
                            </span>
                            <span style="margin-left: 25px;">
                                <strong>Administrasi</strong>
                            </span>
                        </div>
                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-route"></i>
                            </span>
                            <span class="text-sm-left">
                                Tugas Berada pada Tahap : <br>
                            </span>
                            <span style="margin-left: 25px;">
                                <strong>Pembuatan Sertifikat</strong>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5" style="padding-left: 25px;">

                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">

                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-music-2"></i>
                            </span>
                            <span class="text-sm-left">
                                Rencana Mulai Dikerjakan : <br>
                            </span>
                            <span style="margin-left: 25px;">
                                <strong id='txtStartPlan'>{{ $mstProyekDetail['detailProyek']['TanggalMulai'] }}</strong>
                            </span>
                        </div>
                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-music-1"></i>
                            </span>
                            <span class="text-sm-left">
                                Rencana Deadline : <br>
                            </span>
                            <span style="margin-left: 25px;">
                                <strong id='txtEndPlan'>{{ $mstProyekDetail['detailProyek']['RencanaSelesai'] }}</strong>
                            </span>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="m-portlet__head-title ">
            <h3 class="m-portlet__head-text" style="margin-bottom: 0px;margin-top: 20px;">
                Deskripsi :
            </h3>
        </div>

        <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide m--margin-top-15" data-scrollbar-shown="true"
            data-scrollable="true" data-max-height="380" style="overflow: visible; position: relative;">
            <textarea readonly class="form-control m-input m-input--air" id="exampleTextarea" rows="5" style="margin-bottom: 30px;"></textarea>
        </div>

        <ul class="nav nav-pills nav-fill nav-pills--warning" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">
                    Memo Analisis
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                <div class="m_datatable" id="tabelmemoAnalisis">
                    <!-- @include('manajerTeknis.layout.page.pinnedProject.detailTab') -->
                </div>
            </div>
        </div>
    </div>

</div>
