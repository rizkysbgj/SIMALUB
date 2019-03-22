@extends('manajerTeknis.layout.index')
@section('title', 'Dashboard Top Management')
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <strong>Tahun : </strong>
                            </h3>
                            <div class="m-portlet__head-text" style="padding-left: 10px;">
                                <input type="text" class="form-control m-input" name="tbxTahun" id="tbxTahun" />
                            </div>
                            <div class="m-portlet__head-text" style="padding-left: 10px;">
                                <a href="javascript:void(0)" id="btnSearch" class="btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                    <i class="la la-search">
                                    </i>
                                </a>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body" id="alertTidakAdaProyekTahun" style="display:none;">
                    <div class="m-content" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px;">
                        <div class="alert alert-danger m-alert--default m--align-center" role="alert" style="padding:20px;">
                            <strong>
                                Maaf,
                            </strong>
                            tidak ada proyek yang dilakukan pada tahun tersebut. Silahkan ketik tahun lainnya.
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body  m-portlet__body--no-padding" id="alertAdaProyek">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-xl-4">
                            <!--begin:: Widgets/Stats2-1 -->
                            <div class="m-widget1">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">
                                                Total Proyek
                                            </h3>
                                            <span class="m-widget1__desc">
                                                Total Proyek per Tahun
                                            </span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-brand">
                                                <h3 id="totalProyek"></h3>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">
                                                Proyek Selesai
                                            </h3>
                                            <span class="m-widget1__desc">
                                                Proyek yang telah selesai
                                            </span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-success">
                                                <h3 id="totalProyekSelesai"></h3>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">
                                                Proyek Berlangsung
                                            </h3>
                                            <span class="m-widget1__desc">
                                                Proyek yang masih berlangsung
                                            </span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-danger">
                                                <h3 id="totalProyekBerlangsung"></h3>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end:: Widgets/Stats2-1 -->
                        </div>
                        <div class="col-xl-4">
                            <!--begin:: Widgets/Daily Sales-->
                            <div class="m-widget14">
                                <div class="m-widget14__header m--margin-bottom-30">
                                    <h3 class="m-widget14__title">
                                        Chart Proyek
                                    </h3>
                                    <span class="m-widget14__desc">
                                        Total Proyek per Bulan
                                    </span>
                                </div>
                                <div class="m-widget14__chart" style="height:120px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="m_chart_daily_sales" width="282" height="120" class="chartjs-render-monitor" style="display: block; width: 282px; height: 120px;"></canvas>
                                </div>
                            </div>
                            <!--end:: Widgets/Daily Sales-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin:: Widgets/Profit Share-->
                            <div class="m-widget14">
                                <div class="m-widget14__header">
                                    <h3 class="m-widget14__title">
                                        Persentase
                                    </h3>
                                    <span class="m-widget14__desc">
                                        Persentase keselesaian proyek
                                    </span>
                                </div>
                                <div id="persentaseTotalProyekSelesai" style="width: 100%;height: 200px;"></div>
                                
                            </div>
                            <!--end:: Widgets/Profit Share-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Ulasan Proyek dari Customer
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="chartReviewCustomer" style="width: 100%;height: 500px;"></div>
                </div>
            </div>
        </div> 
    </div>
</div>

<script src="{{ asset('assets/app/js/dashboard/dashboardTopManagement.js') }}" type="text/javascript"></script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

@endsection
