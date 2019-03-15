    <div class="row">
        <div class="col-xl-12">
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
                                                    {{ $mstDashboardMT['Persentase'] }} %
                                                </span>
                                                <span class="m--align-right col-lg-6">
                                                    <i class="m-widget1__number m--font-primary fa fa-history"></i>
                                                </span>
                                            </div>
                                            <div class="m--space-20"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-primary" role="progressbar" style="width: {{ $mstDashboardMT['Persentase'] }}%;"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <span class="m-widget24__change col-lg-6">
                                                    Progres
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget24__number">
                                                        {{ $mstDashboardMT['Persentase'] }} %
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
                                                    {{ $mstDashboardMT['TotalHari'] }} Hari
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget1__number m--font-warning fa fa-flag"></span>
                                                </div>
                                            </div>
                                            <div class="m--space-10"></div>
                                            <span class="m-widget1__desc">
                                                <small>Target Selesai : </small>
                                            </span>
                                            <span class="m-widget1__desc" id="targetSelesai">
                                                <strong>{{ $mstDashboardMT['RencanaSelesai'] }}</strong>
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
                                                        {{ $mstDashboardMT['TugasSelesai'] }}/{{ $mstDashboardMT['TotalTugas'] }}
                                                    </span>
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget1__number m--font-success fa fa-check-square-o">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m--space-10"></div>
                                            <span class="m-widget1__desc">
                                                <small>Tugas Selesai/Total Tugas</small>
                                            </span>
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
                                                    {{ $mstDashboardMT['TotalSubKontrak'] }}
                                                </span>
                                                <div class="m--align-right col-lg-6">
                                                    <span class="m-widget1__number m--font-danger fa fa-group"></span>
                                                </div>
                                            </div>
                                            <div class="m--space-10"></div>
                                            <span class="m-widget1__desc">
                                                <small>Dikerjakan di Lab luar</small>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Completed Backlog-->
                                </div>
                            </div>
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
                    <div class="m-widget30">
                        <div class="m-widget_head">
                            <div class="m-widget_head-owlcarousel-items owl-carousel">
                                @foreach ($mstDashboardMT ['posisiTugasList'] as $listTugas)
                                    <div class="m-widget_head-owlcarousel-item carousel">
                                        <span>
                                            {{ $listTugas['NamaTugas'] }}
                                        </span>
                                        <span>
                                            {{ $listTugas['InisialTugas'] }}
                                        </span>
                                        <div class="m--space-20"></div>
                                        <h2>
                                            {{ $listTugas['Milestone'] }}
                                        </h2>
                                        <div class="m--space-20"></div>
                                        <span>
                                            Tugas berada di: <h3>{{ $listTugas['PenanggungJawab'] }}</h3>
                                        </span>
                                        <button type="button" id="detailTugasProyek" onclick="Control.TaskDetail('{{ $listTugas['IDTugas'] }}')" class="btn m-btn--pill m-btn--air btn-secondary m-btn m-btn--custom m-btn--label-accent m-btn--bolder m-btn--uppercase">
                                            Detail
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!--end:: Packages-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <!--begin:: Widgets/Tasks -->
            <div class="m-portlet">
                <div class="m-widget14" style="height: 370px;">
                    <div class="m-widget14__header m--margin-bottom-10">
                        <h3 class="m-widget14__title">
                            Total Kesalahan Analisis : <strong>5 Analisis</strong>
                        </h3>
                    </div>
                    <div class="m-widget14__chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="m_chart_daily_sales" class="chartjs-render-monitor" style="display: block; width: 516px; height: 250px;"></canvas>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Tasks -->
        </div>

        <div class="col-xl-6" >
            <!--begin:: Widgets/Support Tickets -->
            <div class="m-portlet">
                <div class="m-widget14" style="height: 370px;">
                    <div class="m-widget14__header m--margin-bottom-10">
                        <h3 class="m-widget14__title">
                            Total Waktu Terbuang : <strong>24 Jam</strong>
                        </h3>
                    </div>
                    <div class="m-widget14__chart">
                        <div class="row  align-items-center">
                            <div class="col">
                                <div id="m_chart_profit_share" class="m-widget14__chart">
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
                </div>
            </div>
            <!--end:: Widgets/Support Tickets -->
        </div>
    </div>



<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>