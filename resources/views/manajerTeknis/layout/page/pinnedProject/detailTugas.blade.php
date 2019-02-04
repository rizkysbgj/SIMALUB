@extends('manajerTeknis.layout.index')

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">

                <h3 class="m-portlet__head-text">
                    @Html.ValueFor(model => model.Task.TaskName)
                    <small>
                        @Html.ValueFor(model => model.Task.ProjectName) / @Html.ValueFor(model => model.Task.TaskCode)
                    </small>
                </h3>
            </div>
        </div>
    </div>


    <div class="m-portlet__body" style="padding-top: 0px;">
        <div class="form-group m-form__group">
            <div class="alert m-alert m-alert--default" role="alert" style="margin-bottom: 20px;">
                <div class="col-lg-12 m--align-center" id="btnGenerate">
                    <a href="/Story/Edit/@Html.ValueFor(model => model.Task.ProjectID)/@Html.ValueFor(model => model.Task.TaskID)" class="btn btn-primary btn-m m-btn m-btn--icon m-btn--pill m-btn--air" style="margin-right: 10px;">
                        <span>
                            <i class="la la-edit"></i>
                            <span>
                                Edit
                            </span>
                        </span>
                    </a>
                    <!-- looping dan kondisi untuk modal dan button -->
                    <!-- disini -->
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
                            <span>
                                @Html.ValueFor(model => model.Task.PIC)
                            </span>
                        </div>
                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-route"></i>
                            </span>
                            <span>
                                @Html.ValueFor(model => model.Task.Milestone)
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5" style="padding-left: 55px;">

                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">

                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-music-2"></i>
                            </span>
                            <span class="text-sm-left">
                                Start Plan :
                            </span>
                            <span class="text-sm-left" id="txtStartPlan">
                                @Html.ValueFor(model => model.Task.StartPlan)
                            </span>
                        </div>
                        <div class="m-portlet__head-icon">
                            <span style="margin-right: 5px;">
                                <i class="flaticon-music-1"></i>
                            </span>
                            <span class="text-sm-left">
                                End Plan :
                            </span>
                            <span class="text-sm-left" id="txtEndPlan">
                                @Html.ValueFor(model => model.Task.EndPlan)
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
            <textarea readonly class="form-control m-input m-input--air" id="exampleTextarea" rows="5" style="margin-bottom: 30px;">@Html.ValueFor(model => model.Task.TaskDescription)</textarea>
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
                    @*Tab Content*@
                </div>
            </div>
            <div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
                <div class="m_datatable" id="divWorkLogList">
                    @*Tab Content*@
                </div>
            </div>
            <div class="tab-pane" id="m_tabs_5_3" role="tabpanel">
                <div class="m_datatable" id="divHistoryList">
                    @*Tab Content*@
                </div>
            </div>
        </div>
    </div>
</div>

@endsection