@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Proyek')
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Proyek
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <!--begin: Search Form -->
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

                            <!-- modal untuk create project -->
                            <div id="formNewProject">
                                <div class="modal hide fade" id="tambahProyek" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Tambah Proyek
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
                                                        Nama Proyek<strong style="color:red" ;>*</strong>:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required />
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Inisial Proyek<strong style="color:red" ;>*</strong>:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <input type="text" class="form-control m-input" maxlength="5" name="tbxProjectInitial" id="tbxProjectInitial" required />
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Pin Proyek:    
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <div class="m-checkbox-inline m-checkbox-list">
                                                            <label class="m-checkbox">
                                                                <input type="checkbox" checked="checked" id="cbx">
                                                                <span></span>
                                                            </label>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Penanggung Jawab <strong style="color:red" ;>*</strong>:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <select class="form-control  m-select2" id="slsProjectManager" required></select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Tanggal Mulai:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control m-input datepicker" name="tbxKickOffDate" readonly id="tbxKickOffDate" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Rencana Selesai:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control m-input datepicker" name="tbxDeadline" readonly id="tbxDeadline" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Realita Selesai:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control m-input datepicker" name="tbxRealitaSelesai" readonly id="tbxRealitaSelesai" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Deskripsi Proyek:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <textarea type="text" class="form-control m-input" name="tbxProjectDescription" id="tbxProjectDescription" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                        Sponsor Proyek:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <textarea type="text" class="form-control m-input" name="tbxProjectSponsor" id="tbxProjectSponsor" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-success" id="btnCreate">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="{{ url('halamanProject/tambahProject') }}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                <!-- <a href="#" data-toggle="modal" data-target="#tambahProyek" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> -->
                                    <span>
                                        <i class="fa fa-plus"></i>
                                        <span>
                                            Tambah Proyek
                                        </span>
                                    </span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <div class="m_datatable" id="divProjectList"></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/app/js/project/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/app/js/project/create.js') }}" type="text/javascript"></script>
@endsection
