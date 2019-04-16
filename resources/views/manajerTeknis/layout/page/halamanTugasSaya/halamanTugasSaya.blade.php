@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Tugas Saya')
@section('content')

@if($IDTugas != null)
<div class="m-content">
    <div class="row">

        <div class="col-lg-1" id="sidebarShow" style="display:none">
            <div class="m-portlet">
                <div class="m-portlet__head" style="border-bottom-width: 0px; padding-right: 18px; padding-left: 10px;">
                    <div class="m-portlet__head-tools">
                        <button type="button" class="btn btn-brand m-btn m-btn--icon m-btn--icon-only" id="minimizeTaskRight">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="m-portlet__body" style="height: 111.6px;padding-top: 15px;">
					<div class="m--align-center">
						<div class="row" style="-webkit-transform: rotate(90deg); -moz-transform: rotate(90deg); -ms-transform: rotate(90deg); -o-transform:  rotate(90deg); transform: rotate(90deg);">
							<h4 style="margin-bottom: 0px;">
								Tugas
							</h4>
						</div>
					</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4" id="removeTaskList">
            
        </div>

        <div class="col-lg-8" id="detailTask">
        
        </div>
    </div>

</div>

@else
<div class="m-content">
    <div class="alert alert-success m-alert--default m--align-center" role="alert" style="padding:20px;">
        <strong>
            Yeay,
        </strong>
            saat ini Anda belum memiliki tugas...
    </div>
</div>
@endif

<input type="hidden" id="IDTugas" value="{{ $IDTugas }}" >
<script src="{{ asset('assets/app/js/halamanTugasSaya/index.js') }}" type="text/javascript"></script>
@endsection
