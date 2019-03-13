@extends('manajerTeknis.layout.index')
@section('title', 'Dashboard Top Management')
@section('content')
<div class="m-content">
    <div class="row">
        
    <div class="col-xl-6">
        <div class="m-portlet">
            <div class="m-widget14">
                <div class="m-widget14__header" style="padding-bottom:0px">
                    <div class="row align-items-center">
                        <h3 class="m-widget14__title col-lg-6">
                            Keuangan
                        </h3>
                        <div class="col-lg-6 form-group m-form__group row" style="margin-bottom:0px">
                            <div class="col-lg-9">
                                <div class="m-form__group m-form__group row">
                                    <div class="m-form__label" style="padding-top:7px">
                                        <label class="m-label m-label--single">
                                            Tahun:
                                        </label>
                                    </div>
                                    <div class="m-form__control col-lg-8" style="padding-left:10px; padding-right:10px">
                                        <input class="form-control m-input" id="tbxTahunKeu" />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                                id="btnFilterKeuangan" style="padding-left:15px; padding-right:15px">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot" style="padding-bottom: 0px"></div>
                <div class="m-widget14__chart">
                    <div id="proyek" style="width: auto; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script src="{{ asset('assets/app/js/dashboard/dashboardTopManagement.js') }}" type="text/javascript"></script>

@endsection
