@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Uraian dari Customer')
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <div class="m-portlet__head-text">
                                <button onclick="JavaScript: window.history.back(1); return false;" class="btn m-btn--pill m-btn--air btn-primary" style="margin-right: 10px;">
                                    <div class="fa fa-arrow-left"></div>
                                </button>
                            </div>
                            <h3 class="m-portlet__head-text">
                                Kritik dan Saran Seluruh Proyek dari Customer
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-bottom-30">
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
                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <div class="m_datatable" id="divUraian"></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/app/js/dashboard/dashboardTopManagement.js') }}" type="text/javascript"></script>

@endsection