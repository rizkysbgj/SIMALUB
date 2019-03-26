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

    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Uraian Proyek dari Customer
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded">
                        <table class="m-datatable__table" id="html_table" width="100%" style="display: block; min-height: 300px; overflow-x: auto;">
                            <thead class="m-datatable__head">
                                <tr class="m-datatable__row" style="left: 0px;">
                                    <th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" style="width:300px;" data-field="Uraian"><span>Uraian</span></th>
                                    <th title="Field #2" class="m-datatable__cell m-datatable__cell--sort" data-field="SM" style="width:184px;"><span style="text-align:center;">Sangat Memuaskan (5)</span></th>
                                    <th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" data-field="M" style="width:130px;"><span style="text-align:center;">Memuaskan (4)</span></th>
                                    <th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="N" style="width:85px;"><span style="text-align:center;">Netral (3)</span></th>
                                    <th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="KM" style="width:184px;"><span style="text-align:center;">Kurang Memuaskan (2)</span></th>
                                    <th title="Field #6" class="m-datatable__cell m-datatable__cell--sort" data-field="SKM" style="width:230px;"><span style="text-align:center;">Sangat Kurang Memuaskan (1)</span></th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body" >
                                <tr data-row="1" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span >Independensi laboratorium dalam menghasilkan data pengujian</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan1-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan1-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan1-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan1-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan1-1"></span></td>
                                </tr>
                                <tr data-row="2" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span >Perlindungan atas kerahasiaan informasi</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan2-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan2-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan2-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan2-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan2-1"></span></td>
                                </tr>
                                <tr data-row="3" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Keakuratan laporan hasil uji</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan3-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan3-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan3-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan3-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan3-1"></span></td>
                                </tr>
                                <tr data-row="4" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Ketepatan waktu pengujian</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan4-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan4-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan4-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan4-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan4-1"></span></td>
                                </tr>
                                <tr data-row="5" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Komunikasi</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan5-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan5-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan5-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan5-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan5-1"></span></td>
                                </tr>
                                <tr data-row="6" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Tindakan lanjut dari pengaduan</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan6-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan6-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan6-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan6-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan6-1"></span></td>
                                </tr>
                                <tr data-row="7" class="m-datatable__row" style="left: 0px;">
                                <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Fasilitas dan sumber daya manusia</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan7-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan7-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan7-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan7-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan7-1"></span></td>
                                </tr>
                                <tr data-row="8" class="m-datatable__row" style="left: 0px;">
                                    <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Penerapan good profesional practice</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan8-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan8-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan8-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan8-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan8-1"></span></td>
                                </tr>
                                <tr data-row="9" class="m-datatable__row" style="left: 0px;">
                                    <td data-field="Uraian" class="m-datatable__cell" style="background:#f4f3f8; width:300px;"><span>Biaya pengujian</span></td>
                                    <td data-field="SM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan9-5"></span></td>
                                    <td data-field="M" class="m-datatable__cell m--align-center" style="width:130px;"><span style="text-align:center;" class="Pertanyaan9-4"></span></td>
                                    <td data-field="N" class="m-datatable__cell m--align-center" style="width:85px;"><span style="text-align:center;" class="Pertanyaan9-3"></span></td>
                                    <td data-field="KM" class="m-datatable__cell m--align-center" style="width:184px;"><span style="text-align:center;" class="Pertanyaan9-2"></span></td>
                                    <td data-field="SKM" class="m-datatable__cell m--align-center" style="width:230px;"><span style="text-align:center;" class="Pertanyaan9-1"></span></td>
                                </tr>
                                <!-- <span class="fa fa-check" style="color:#5867dd;"></span> -->
                            </tbody>
                        </table>
                    <!--end: Datatable -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-12">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-12">
                                        <div class="m-form__group m-form__group--inline">
                                            <h4>
                                                <strong>Kritik dan Saran:</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-12">
                                        <textarea type="text" class="form-control m-input" name="tbxKritikSaran" id="tbxKritikSaran" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


<script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>

