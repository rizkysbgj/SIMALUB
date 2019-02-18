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
                    <a href="{{ url('/editTugas/'.$mstTugasDetail['tugas']['IDTugas']) }}" class="btn btn-primary btn-m m-btn m-btn--icon m-btn--pill m-btn--air" style="margin-right: 10px;">
                        <span>
                            <i class="la la-edit"></i>
                            <span>
                                Edit
                            </span>
                        </span>
                    </a>
                    <!-- looping dan kondisi untuk modal dan button -->
                    <!-- disini -->
                    @foreach ($mstTugasList as $mstTugas)
                    {
                        <!-- modal -->
                        @if (Model.Task.LastTaskMilestoneID == 2 || Model.Task.LastTaskMilestoneID == 5 || (Model.Task.LastTaskMilestoneID == 11 && i.Code == "DONE") || (Model.Task.LastTaskMilestoneID == 13 && i.Code == "DONE"))
                        {
                            <div class="modal hide fade" id="@i.TaskMilestoneID-@i.Code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                @i.Action
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">
                                                    Attachment :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file" id="inputFile" name="inputFile" style="margin-top: 5px">
                                                        @*<label class="custom-file-label" for="customFile">
                                                                Choose file
                                                            </label>*@
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">
                                                    Remark <span style="color:red">*</span> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    <textarea class="summernote" name="tbxRemark" id="tbxRemark-@i.Code" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnSubmit-@i.Code">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        }

                        <!-- button -->
                        if (Model.Task.PICID == UserManager.User.UserID)
                        {
                            if (Model.Task.LastTaskMilestoneID != 8)
                            {
                                <a href="#" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" id="@i.Code" style="margin-left:10px; margin-right:10px" data-toggle="modal" data-target="#@i.TaskMilestoneID-@i.Code">
                                    <span>
                                        <i class="la la-info"></i>
                                        <span>
                                            @i.Action
                                        </span>
                                    </span>
                                </a>
                            }

                            else if (i.NextTaskMilestoneID == 9)
                            {
                                <a href="/BugTracker/ListPlan/@ViewBag.SITProjectID" class="btn btn-success btn-m m-btn m-btn--icon m-btn--pill m-btn--air btn-generate" style="margin-left:10px; margin-right:10px">
                                    <span>
                                        <i class="la la-info"></i>
                                        <span>
                                            Go to SIT
                                        </span>
                                    </span>
                                </a>
                            }
                        }
                    }
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

        <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide m--margin-top-15" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; position: relative;">
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
</div>

