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
                                <select class="m-select2" id="slsNamaProyek" style="width: 100px;"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body  m-portlet__body--no-padding">
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
                                                <h3>300</h3>
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
                                                <h3>200</h3>
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
                                                <h3>100</h3>
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
                                <div id="testChart" style="width: 100%;height: 150px;"></div>
                                
                            </div>
                            <!--end:: Widgets/Profit Share-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-6">
            <div class="m-portlet">
                <div class="m-widget14">
                    <div class="m-widget14__header" style="padding-bottom:0px">
                        <div class="row align-items-center">
                            <h3 class="m-widget14__title col-lg-6">
                                Keuangan
                            </h3>
                            <div class="col-lg-6 form-group m-form__group row" style="margin-bottom:0px">
                                <div class="col-lg-9">
                                    <div class="m-form__group m-form__group row">
                                        <div class="m-form__label" style="padding-top:7px">
                                            <label class="m-label m-label--single">
                                                Tahun:
                                            </label>
                                        </div>
                                        <div class="m-form__control col-lg-8" style="padding-left:10px; padding-right:10px">
                                            <input class="form-control m-input" id="tbxTahunKeu" />
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                                    id="btnFilterKeuangan" style="padding-left:15px; padding-right:15px">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot" style="padding-bottom: 0px"></div>
                    <div class="m-widget14__chart">
                        <div id="proyek" style="width: auto; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-xl-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Performa Staff
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-5">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input" placeholder="Search..." id="tbxSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span>
                                                    <i class="la la-search"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m_datatable" id="divUserPerformance"></div>
                </div>
            </div>  
        </div>
    </div>
</div>

<!-- Resources -->


<script src="{{ asset('assets/app/js/dashboard/dashboardTopManagement.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/app/js/dashboard/dashboardMT.js') }}" type="text/javascript"></script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

@endsection
