@extends('manajerTeknis.layout.index')

@section('content')
<div class="m-content">
    <div class="row">

        <div class="m-subheader" style="padding-bottom:30px; padding-top: 0px;">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a class="m-subheader__title m-subheader__title--separator">
                        <h5>
                        Nama Proyek
                        </h5>
                    </a>
                    
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                        <select class="form-control m-input" id="exampleSelect1">
                            <option>
                                Sapi Chimory
                            </option>
                            <option>
                                Analisis Susu Formula
                            </option>
                            <option>
                                Kadar Asam Pada Yogurt Chimory
                            </option>
                        </select>
                    </ul>
                </div>
            </div>
        </div>

        <div class="m-portlet">

        </div>

        <div class="col-lg-12">
            <div class="m-portlet m-portlet--tabs">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="tab-content">
                        <div class="tab-pane active" id="usedTab" role="tabpanel">
                            <div class="row m-row--no-padding m-row--col-separator-xl">
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <!--begin::Project Progress-->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <h4 class="m-widget1__title">
                                                Progres Proyek
                                            </h4>
                                            <div class="m--space-10"></div>
                                            <div class="row">
                                                <span class="m-widget1__number m--font-primary col-lg-6">
                                                    100 %
                                                </span>
                                                <span class="m--align-right col-lg-6">
                                                    <i class="m-widget1__number m--font-primary fa fa-history"></i>
                                                </span>
                                            </div>
                                            <div class="m--space-20"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-primary" role="progressbar" style="width: @Html.ValueFor(model => model.ProjectProgress)%;"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <span class="m-widget24__change col-lg-6">
                                                    Progres
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget24__number">
                                                        100 %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Project Progress-->
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <!--begin::Total Days-->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <h4 class="m-widget1__title">
                                                Total Hari
                                            </h4>
                                            <div class="m--space-10"></div>
                                            <div class="row">
                                                <span class="m-widget1__number m--font-warning col-lg-6">
                                                    14 Hari
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget1__number m--font-warning fa fa-flag"></span>
                                                </div>
                                            </div>
                                            <div class="m--space-10"></div>
                                            <span class="m-widget1__desc">
                                                Target Selesai :
                                            </span>
                                            <span class="m-widget1__desc" id="goLiveUsed">
                                                14 Januari 2019
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Total Days-->
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <!--begin::Total Resource-->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <h4 class="m-widget1__title">
                                                Tugas Selesai
                                            </h4>
                                            <div class="m--space-10"></div>
                                            <div class="row">
                                                <span class="m-widget1__number m--font-success col-lg-6">
                                                    <span id="usedMD">
                                                        5/8
                                                    </span>
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget1__number m--font-success fa fa-check-square-o">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m--space-10">
                                                <span class="m-widget1__desc">
                                                    Jumlah Tugas Selesai / Total Tugas
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Total Resource-->
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <!--begin::Completed Backlog-->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <h4 class="m-widget1__title">
                                                Tugas Subkontrak
                                            </h4>
                                            <div class="m--space-10"></div>
                                            <div class="row">
                                                <span class="m-widget1__number m--font-danger col-lg-6">
                                                    5
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget1__number m--font-danger fa fa-group"></span>
                                                </div>
                                            </div>
                                            <div class="m--space-10"></div>
                                        </div>
                                    </div>
                                    <!--end::Completed Backlog-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">
                    <!--begin:: Packages-->
                    <div class="m-portlet  m-portlet--bordered-semi   m-portlet--full-height ">
                        <div class="m-portlet__head m--padding-top-20">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <span class="m-portlet__head-icon">
                                        <i class="flaticon-map-location"></i>
                                    </span>
                                    <h3 class="m-portlet__head-text">
                                        Posisi Setiap Tugas
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__body m-portlet__body--no-padding">
                            <!--begin::Widget 30-->
                            <div class="m-widget30">
                                <div class="m-widget_head">
                                    <div class="m-widget_head-owlcarousel-items owl-carousel">
                                        <div class="m-widget_head-owlcarousel-item carousel">
                                            <span>
                                                Hitung Asam Karbonat
                                            </span>
                                            <span>
                                                SC-001
                                            </span>
                                        </div>
                                        <div class="m-widget_head-owlcarousel-item carousel">
                                            <span>
                                                Hitung Kadar Asam
                                            </span>
                                            <span>
                                                SC-002
                                            </span>
                                        </div>
                                        <div class="m-widget_head-owlcarousel-item carousel">
                                            <span>
                                                Hitung Kalori Sapi
                                            </span>
                                            <span>
                                                SC-003
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget_body">
                                    <div class="m-widget_body-owlcarousel-items owl-carousel" id="m_widget_body_owlcarousel_items">
                                        <div class="m-widget_body-owlcarousel-item carousel">
                                            <div class="m-widget_body-items">
                                                <div class="m-widget_body-item">
                                                    <div class="m-widget25" style="text-align:center">
                                                        <span class="m-widget25__price m--font-brand">
                                                            SIAP CETAK SERTIF
                                                        </span>
                                                        <span class="m-widget25__desc">
                                                            Tugas berada di: <h3>ADMINISTRASI</h3>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget_body-owlcarousel-item carousel">
                                            <div class="m-widget_body-items">
                                                <div class="m-widget_body-item">
                                                    <div class="m-widget25" style="text-align:center">
                                                        <span class="m-widget25__price m--font-brand">
                                                            DI ANALISIS
                                                        </span>
                                                        <span class="m-widget25__desc">
                                                            Tugas berada di: <h3>ANALIS</h3>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget_body-owlcarousel-item carousel">
                                            <div class="m-widget_body-items">
                                                <div class="m-widget_body-item">
                                                    <div class="m-widget25" style="text-align:center">
                                                        <span class="m-widget25__price m--font-brand">
                                                            SIAP DIKOREKSI
                                                        </span>
                                                        <span class="m-widget25__desc">
                                                            Tugas berada di: <h3>PENYELIA</h3>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Widget 30-->
                        </div>
                    </div>
                    <!--end:: Packages-->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <!--begin:: Widgets/Tasks -->
                    <div class="m-portlet">
                        <div class="m-widget14">
                            <div class="m-widget14__header m--margin-bottom-10">
                                <h3 class="m-widget14__title">
                                    Total Kesalahan Analisis
                                </h3>
                            </div>
                            <div class="m-widget14__chart">
                                <div id="backlog" style="width: auto; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Tasks -->
                </div>

                <div class="col-xl-6">
                    <!--begin:: Widgets/Support Tickets -->
                    <div class="m-portlet">
                        <div class="m-widget14">
                            <div class="m-widget14__header m--margin-bottom-10">
                                <h3 class="m-widget14__title">
                                    Total Waktu Terbuang
                                </h3>
                            </div>
                            <div class="m-widget14__chart">
                                <div id="report" style="width: auto; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Support Tickets -->
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
