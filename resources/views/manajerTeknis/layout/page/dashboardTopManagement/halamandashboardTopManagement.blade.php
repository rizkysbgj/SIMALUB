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
                                <div class="row  align-items-center">
                                    <div class="col">
                                        <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                            <div class="m-widget14__stat">
                                                45
                                            </div>
                                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;"><g class="ct-series custom"><path d="M108.31,101.192A49.773,49.773,0,0,0,63.273,30.227" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#716aca&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="100.07612609863281px 100.07612609863281px" stroke-dashoffset="-100.07612609863281px" stroke="#716aca"><animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-100.07612609863281px" to="0px" fill="freeze" stroke="#716aca" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M24.922,111.727A49.773,49.773,0,0,0,108.383,101.035" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#00c5dc&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="100.25057983398438px 100.25057983398438px" stroke-dashoffset="-100.25057983398438px" stroke="#00c5dc"><animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-100.25057983398438px" to="0px" fill="freeze" stroke="#00c5dc" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M63.273,30.227A49.773,49.773,0,0,0,25.033,111.86" class="ct-slice-donut" ct:value="36" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#ffb822&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="112.75973510742188px 112.75973510742188px" stroke-dashoffset="-112.75973510742188px" stroke="#ffb822"><animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-112.75973510742188px" to="0px" fill="freeze" stroke="#ffb822" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g></svg></div>
                                    </div>
                                    <div class="col">
                                        <div class="m-widget14__legends">
                                            <div class="m-widget14__legend">
                                                <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                                <span class="m-widget14__legend-text">
                                                    66,67% Telah Selesai
                                                </span>
                                            </div>
                                            <div class="m-widget14__legend">
                                                <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                                <span class="m-widget14__legend-text">
                                                    33,33% Belum Selesai
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script src="{{ asset('assets/app/js/dashboard/dashboardTopManagement.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/app/js/dashboard/dashboardMT.js') }}" type="text/javascript"></script>

@endsection
