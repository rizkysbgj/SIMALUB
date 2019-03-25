@extends('manajerTeknis.layout.index')
@section('title', 'Dashboard Performa Analis')
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <strong>Tahun : </strong>
                            </h3>
                            <div class="m-portlet__head-text" style="padding-left: 10px;">
                                <input type="text" class="form-control m-input" name="tbxTahun" id="tbxTahun" />
                            </div>
                            <h3 class="m-portlet__head-text" style="padding-left: 20px;">
                                <label for="namaBulan">
                                    <strong>Bulan : </strong>
                                </label>
                            </h3>
                            <div class="m-portlet__head-text" style="padding-left: 10px; width: 130px;"> 
                                <select class="form-control m-input" id="tbxBulan">
                                    <option value="1">
                                        Januari
                                    </option>
                                    <option value="2">
                                        Februari
                                    </option>
                                    <option value="3">
                                        Maret
                                    </option>
                                    <option value="4">
                                        April
                                    </option>
                                    <option value="5">
                                        Mei
                                    </option>
                                    <option value="6">
                                        Juni
                                    </option>
                                    <option value="7">
                                        Juli
                                    </option>
                                    <option value="8">
                                        Agustus
                                    </option>
                                    <option value="9">
                                        September
                                    </option>
                                    <option value="10">
                                        Oktober
                                    </option>
                                    <option value="11">
                                        November
                                    </option>
                                    <option value="12">
                                        Desember
                                    </option>
                                </select>
                                <!-- <select class="form-control m-bootstrap-select" id="tbxBulan">
                                    <option>Januari</option>
                                    <option>Februari</option>
                                </select> -->
                            </div>
                            <div class="m-portlet__head-text" style="padding-left: 10px;">
                                <a href="javascript:void(0)" id="btnSearch" class="btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                    <i class="la la-search">
                                    </i>
                                </a>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SWEET ALERT -->
                <div class="m-portlet__body" id="alertTahunKosong" style="display:none;">
                    <div class="m-content" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px;">
                        <div class="alert alert-danger m-alert--default m--align-center" role="alert" style="padding:20px;">
                            <strong>
                                Maaf,
                            </strong>
                            tidak ada proyek yang dilakukan pada tahun tersebut. Silahkan isi tahun dan bulan lainnya untuk melihat performa analis.
                        </div>
                    </div>
                </div>
                
                <div class="m-portlet__body" id="alertAdaPerformaAnalis">
                   <div id="chartPerformaAnalis" style="width: 100%;height: 500px;"></div>
                </div>
                    
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/app/js/dashboard/dashboardPerformaAnalis.js') }}" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
@endsection