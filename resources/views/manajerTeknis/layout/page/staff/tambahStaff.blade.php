@extends('manajerTeknis.layout.index')

@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Tambah Staff
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" id="formCreateRole">

                    <div class="m-form__content">
                        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="msgLogFail">
                            <div class="m-alert__icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="m-alert__text">
                                Oh sorry! Please check your form Log again :).
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
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" maxlength="5" name="tbxprojectinitial" id="tbxProjectInitial" required value='@Html.ValueFor(model => model.ProjectInitial)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                ID Staff<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" maxlength="5" name="tbxprojectinitial" id="tbxProjectInitial" required value='@Html.ValueFor(model => model.ProjectInitial)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Nama Lengkap<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='@Html.ValueFor(model => model.ProjectName)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Inisial Nama<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='@Html.ValueFor(model => model.ProjectName)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Email<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='@Html.ValueFor(model => model.ProjectName)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Jabatan <strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control  m-select2" id="slsProjectManager" required></select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Password<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='@Html.ValueFor(model => model.ProjectName)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Konfirmasi Password<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='@Html.ValueFor(model => model.ProjectName)' />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Photo Profil<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxProjectName" class="form-control m-input" maxlength="100" name="tbxProjectName" required value='@Html.ValueFor(model => model.ProjectName)' />
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
                                    <button id="btnAddRole" class="btn btn-success">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>

    </div>
</div>
@endsection
