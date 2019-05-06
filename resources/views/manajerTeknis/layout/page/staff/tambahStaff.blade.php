@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Tambah Staff')
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
                <form class="m-form m-form--fit m-form--label-align-right" id="formCreateUser">
                    {{ csrf_field() }}
                    <div class="m-form__content">
                        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="msgLogFail">
                            <div class="m-alert__icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="m-alert__text">
                                Maaf, silahkan periksa kembali form yang telah Anda isi!.
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
                                ID Staff<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" name="tbxUserID" id="tbxUserID" required />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                NIK<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" name="tbxNIK" id="tbxNIK" required />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Nama Lengkap<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" id="tbxFullName" class="form-control m-input" maxlength="100" name="tbxFullName" required />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Email<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="email" id="tbxEmail" class="form-control m-input" maxlength="100" name="tbxEmail" required />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Jabatan <strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control  m-select2" id="slsRole" required></select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Password <strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="tbxNewPassword" name="tbxNewPassword" required />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Konfirmasi Password <strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="tbxConfirmNewPassword" name="tbxConfirmNewPassword" required />
                                <span id="message"></span>
                            </div>
                        </div>
                       
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Photo Profil<strong style="color:red" ;>*</strong>:
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="custom-file" id="inputPhotoProfile" name="inputPhotoProfile" style="margin-top: 5px" />
                            </div>
                        </div>
                    </div>                    

                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <button onclick="JavaScript: window.history.back(1); return false;" class="btn btn-secondary">
                                        Batal
                                    </button>
                                    <button id="btnAddUser" class="btn btn-success">
                                        Buat
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

<script src="{{ asset('assets/app/js/staff/create.js') }}" type="text/javascript"></script>

@endsection