<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">

                <h3 class="m-portlet__head-text">
                    {{ $mstTugasDetail['tugas']['NamaTugas'] }}
                    <small>
                        {{ $mstTugasDetail['tugas']['NamaProyek'] }} / {{ $mstTugasDetail['tugas']['InisialTugas'] }}
                    </small>
                </h3>
            </div>
        </div>
    </div>


    <div class="m-portlet__body" style="padding-top: 0px;">
        <div class="form-group m-form__group">
            <div class="alert m-alert m-alert--default" role="alert" style="margin-bottom: 20px;">
                <div class="col-lg-12 m--align-center" id="btnGenerate">
                    <a href="{{ url('/editTugas/'.$mstTugasDetail['tugas']['IDTugas']) }}" class="btn btn-primary btn-m m-btn m-btn--icon m-btn--pill m-btn--air"
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
                    @foreach ($mstTugasDetail['flow'] as $flow)
                    <!-- modal -->
                        @if ( $mstTugasDetail['tugas']['IDMilestone'] == 2
                        || ($mstTugasDetail['tugas']['IDMilestone'] == 8 && $flow['Kode'] == "SELESAI") )
                            <div class="modal hide fade" id="{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $flow['Aksi'] }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Lampirkan File :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file" id="inputFile" name="inputFile" style="margin-top: 5px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Catatan <span style="color:red">*</span> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;" !important>
                                                    <!-- <textarea type="text" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" required></textarea> -->
                                                    <textarea type="text" class="form-control m-input" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-{{ $flow['Kode'] }}">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @elseif ( $mstTugasDetail['tugas']['IDMilestone'] == 3 )
                            <div class="modal hide fade" id="{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $flow['Aksi'] }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Pilih Analis <strong style="color:red" ;>*</strong> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12 m--align-left" !important style="padding-left: 0px;">
                                                    <select class="form-control m-select2" style="width: 568px;" id="slsUser">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-{{ $flow['Kode'] }}">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @elseif( $mstTugasDetail['tugas']['IDMilestone'] == 5 )
                            <div class="modal hide fade" id="{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $flow['Aksi'] }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Lampirkan File :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file" id="inputFile" name="inputFile" style="margin-top: 5px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Catatan <span style="color:red">*</span> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;" !important>
                                                    <!-- <textarea type="text" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" required></textarea> -->
                                                    <textarea type="text" class="form-control m-input" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-{{ $flow['Kode'] }}">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal hide fade" id="laporkan" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Laporkan
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Lampirkan File :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file" id="inputFile" name="inputFile" style="margin-top: 5px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Catatan <span style="color:red">*</span> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;" !important>
                                                    <!-- <textarea type="text" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" required></textarea> -->
                                                    <textarea type="text" class="form-control m-input" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-{{ $flow['Kode'] }}">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @elseif ( $mstTugasDetail['tugas']['IDMilestone'] == 6 )
                            <div class="modal hide fade" id="{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $flow['Aksi'] }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Pilih Penyelia <strong style="color:red" ;>*</strong> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12 m--align-left" !important style="padding-left: 0px;">
                                                    <select class="form-control m-select2" style="width: 568px;" id="slsUser">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-{{ $flow['Kode'] }}">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @elseif ( $mstTugasDetail['tugas']['IDMilestone'] == 8 && $flow['Kode'] == "SALAH" )
                            <div class="modal hide fade" id="{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $flow['Aksi'] }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Pilih Analis <strong style="color:red" ;>*</strong> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12 m--align-left" !important style="padding-left: 0px; width: 568px;">
                                                    <select class="form-control m-select2" style="width: 568px;" id="slsUser">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Lampirkan File :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file" id="inputFile" name="inputFile" style="margin-top: 5px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Catatan <span style="color:red">*</span> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;" !important>
                                                    <!-- <textarea type="text" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" required></textarea> -->
                                                    <textarea type="text" class="form-control m-input" name="tbxRemark" id="tbxRemark-{{ $flow['Kode'] }}" rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-{{ $flow['Kode'] }}">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                        <!-- button -->
                        @if( $mstTugasDetail['tugas']['IDMilestone'] != 5 && $mstTugasDetail['tugas']['IDMilestone'] != 8 )
                            <a href="#" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" id="{{ $flow['Kode'] }}"
                                style="margin-left:10px; margin-right:10px" data-toggle="modal" data-target="#{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}">
                                <span>
                                    <i class="la la-info"></i>
                                    <span>
                                        {{ $flow['Aksi'] }}
                                    </span>
                                </span>
                            </a>
                        
                        @elseif($mstTugasDetail['tugas']['IDMilestone'] == 8)
                            @if ( $flow['Kode'] == 'SALAH')
                                <a href="#" class="btn btn-danger btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" id="{{ $flow['Kode'] }}"
                                    style="margin-left:10px; margin-right:10px" data-toggle="modal" data-target="#{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}">
                                    <span>
                                        <i class="la la-undo"></i>
                                        <span>
                                            {{ $flow['Aksi'] }}
                                        </span>
                                    </span>
                                </a>
                            @else
                            <a href="#" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" id="{{ $flow['Kode'] }}"
                                    style="margin-left:10px; margin-right:10px" data-toggle="modal" data-target="#{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}">
                                    <span>
                                        <i class="la la-info"></i>
                                        <span>
                                            {{ $flow['Aksi'] }}
                                        </span>
                                    </span>
                                </a>
                            @endif

                        @elseif($mstTugasDetail['tugas']['IDMilestone'] == 5)
                            <a href="#" class="btn btn-danger btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" id="{{ $flow['Kode'] }}"
                                style="margin-left:10px; margin-right:10px" data-toggle="modal" data-target="#laporkan">
                                <span>
                                        <i class="la la-bullhorn"></i>
                                        <span>
                                            Laporkan
                                        </span>
                                    </span>
                                </a>
                                <a href="#" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" id="{{ $flow['Kode'] }}"
                                    style="margin-left:10px; margin-right:10px" data-toggle="modal" data-target="#{{ $flow['IDMilestoneTugas'] }}-{{ $flow['Kode'] }}">
                                    <span>
                                        <i class="la la-info"></i>
                                        <span>
                                            {{ $flow['Aksi'] }}
                                        </span>
                                    </span>
                                </a>
                        @endif

                    @endforeach
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
                                <strong>{{ $mstTugasDetail['tugas']['PenanggungJawab'] }}</strong>
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
                                <strong>{{ $mstTugasDetail['tugas']['Milestone'] }}</strong>
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
                                <strong id='txtStartPlan'>{{ $mstTugasDetail['tugas']['RencanaMulai'] }}</strong>
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
                                <strong id='txtEndPlan'>{{ $mstTugasDetail['tugas']['RencanaSelesai'] }}</strong>
                            </span>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="m-portlet__head-title ">
            <h3 class="m-portlet__head-text" style="margin-bottom: 0px;margin-top: 20px;">
                Description :
            </h3>
        </div>

        <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide m--margin-top-15" data-scrollbar-shown="true"
            data-scrollable="true" data-max-height="380" style="overflow: visible; position: relative;">
            <textarea readonly class="form-control m-input m-input--air" id="exampleTextarea" rows="5" style="margin-bottom: 30px;">{{ $mstTugasDetail['tugas']['DeskripsiTugas'] }}</textarea>
        </div>

        <ul class="nav nav-pills nav-fill nav-pills--warning" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">
                    Milestones
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">
                    Work Log
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#m_tabs_5_3">
                    History
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                <div class="m_datatable" id="divMilestoneList">
                    <!-- @include('manajerTeknis.layout.page.pinnedProject.detailTab') -->
                </div>
            </div>
            <div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
                <div class="m_datatable" id="divWorkLogList">
                    <!-- @*Tab Content*@ -->
                </div>
            </div>
            <div class="tab-pane" id="m_tabs_5_3" role="tabpanel">
                <div class="m_datatable" id="divHistoryList">
                    <!-- @*Tab Content*@ -->
                </div>
            </div>
        </div>
    </div>
    
<input type="hidden" id="inptTaskID" value="{{ $mstTugasDetail['tugas']['IDTugas'] }}" />
<input type="hidden" id="inptProjectID" value="{{ $mstTugasDetail['tugas']['IDProyek'] }}" />
<input type="hidden" id="inptMilestone" value="{{ $mstTugasDetail['tugas']['IDMilestone'] }}" />
<input type="hidden" id="inptPICID" value="{{ $mstTugasDetail['tugas']['IDPIC'] }}" />
</div>