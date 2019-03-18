@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Subkontrak')
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Tugas Subkontrak
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

                            <!-- Modal Status Subkontrak -->
                            <div class="modal hide fade" id="modalstatussubkontrak" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Status Analisis Subkontrak
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
                                                        <input type="file" class="custom-file test" id="inputFile" name="inputFile"
                                                            style="margin-top: 5px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row" style="padding-top: 0px;">
                                                <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
                                                    Catatan <span style="color:red">*</span> :
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;" !important>
                                                    <textarea type="text" class="form-control m-input" name="tbxRemark" id="tbxRemark"
                                                        rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="button" class="btn btn-success" id="submitStatusSubkontrak">
                                                Kirim
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <div class="m_datatable" id="divSubkontrakList"></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="IDProyek" value={{$IDProyek}}>
<script src="{{ asset('assets/app/js/tugas/subkontrak.js') }}" type="text/javascript"></script>

@endsection
