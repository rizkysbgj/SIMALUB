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
                            Total Kesalahan Analisis : <strong id="totalSalah"></strong><strong> Analisis</strong>
                        </h3>
                    </div>
                    <div class="m-widget14__chart" id="totalSalahAnalisis" style="width: 100%;height: 250px;"></div>
                    
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
                            Waktu Terbuang <small>(Lama Paling Telat)</small>: <strong id="waktuTelat"></strong><strong> Hari</strong>
                        </h3>
                    </div>
                    <div class="m-widget14__chart" id="totalWaktuSalahAnalisis" style="width: 100%;height: 250px;"></div>
                    
                </div>
            </div>
            <!--end:: Widgets/Support Tickets -->
        </div>
    </div>


<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>

