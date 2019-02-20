@extends('manajerTeknis.layout.index')

@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Jabatan
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

                            <!-- modal untuk create jabatan -->
                            <div id="formCreateRole">
                                <div class="modal hide fade" id="tambahJabatan" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Tambah Jabatan
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
                                                        Nama Jabatan <strong style="color:red" ;>*</strong>:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
                                                        <input type="text" class="form-control m-input" name="tbxRoleName" id="tbxRoleName" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-success" id="btnAddRole">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <!-- <a href="{{ url('halamanJabatan/tambahJabatan') }}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> -->
                                <a href="#" data-toggle="modal" data-target="#tambahJabatan" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="fa fa-plus"></i>
                                        <span>
                                            Tambah Jabatan
                                        </span>
                                    </span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <div class="m_datatable" id="divRoleList"></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/app/js/jabatan/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/app/js/jabatan/create.js') }}" type="text/javascript"></script>

@endsection
