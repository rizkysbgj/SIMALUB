@extends('manajerTeknis.layout.index')
@section('title', 'Dashboard Manajer Teknis')
@section('content')

<div class="m-content">
    <div class="row">
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a class="m-subheader__title m-subheader__title--separator">
                        <h5 style="margin-bottom: 0px;">
                        Nama Proyek
                        </h5>
                    </a>
                    
                    <div class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <select class="form-control m-select2" id="slsNamaProyek" style="width: 400px;"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="m-content" style="padding-top:10px" id="dashboard">
    <div class="alert alert-warning m-alert--default m--align-center" role="alert" style="padding:20px;">
        <strong>
            Silahkan,
        </strong>
        pilih proyek yang ingin dilihat
    </div>
</div>

<script src="{{ asset('assets/app/js/dashboard/dashboardMT.js') }}" type="text/javascript"></script>

@endsection
