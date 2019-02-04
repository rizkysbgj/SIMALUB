@extends('manajerTeknis.layout.index')

@section('content')
<div class="m-content">
    <div class="row">

        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Edit Proyek
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--label-align-right" id="formEditProject">

                    <div class="m-form__content">
                        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="msgProjectFail">
                            <div class="m-alert__icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="m-alert__text">
                                Oh sorry! Please check your form project again :).
                            </div>
                            <div class="m-alert__close">
                                <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Status:
                            </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input data-switch="true" type="checkbox" checked="checked" data-on-text="Active" data-handle-width="70" data-off-text="Deactive" data-on-color="info" id="btnStatus">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Inisial Proyek<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" maxlength="5" name="tbxprojectinitial" id="tbxProjectInitial" required value='' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Nama Proyek<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Pin Proyek:
                            </label>
                            <div class="col-lg-6">
                                <div class="m-checkbox-inline m-checkbox-list">
                                    <label class="m-checkbox">
                                        <input type="checkbox" checked="checked" id="cbx">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Penanggung Jawab <strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control  m-select2" id="slsProjectManager" required></select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Tanggal Mulai:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxManDays" class="form-control m-input" maxlength="100" name="tbxManDays" value='' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Rencana Selesai:
                            </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input datepicker" name="tbxKickOffDate" readonly id="tbxKickOffDate" value='' />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Realita Selesai:
                            </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input datepicker" name="tbxGoLivePlan" readonly id="tbxGoLivePlan" value='' />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Deskripsi Proyek:
                            </label>
                            <div class="col-lg-6">
                                <textarea type="text" class="form-control m-input" name="tbxProjectDescription" id="tbxProjectDescription" rows="4">narik deskripsi</textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Sponsor Proyek:
                            </label>
                            <div class="col-lg-6">
                                <textarea type="text" class="form-control m-input" name="tbxProjectSponsor" id="tbxProjectSponsor" rows="4">narik sponsor proyek</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <button onclick="JavaScript: window.history.back(1); return false;" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                    <button id="btnEdit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
