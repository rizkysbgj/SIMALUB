@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Pembuatan Sertifikat' )
@section('content')

@if($IDProyek != 0)
<div class="m-content" id="proyeksiap">
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
            <!--begin:: Widgets/Tasks -->
            
        </div>

        

        <div class="col-lg-8" id="detailProyek">
        
        </div>
    </div>

</div>

@else
<div class="m-content" id="proyekbelumsiap">
    <div class="alert alert-warning m-alert--default m--align-center" role="alert" style="padding:20px;">
        <strong>
            Maaf,
        </strong>
        saat ini belum ada proyek yang siap dibuatkan sertifikat
    </div>
</div>
@endif

<script src="{{ asset('assets/app/js/administrasi/index.js') }}" type="text/javascript"></script>
<input type="hidden" id="IDProyek" value="{{ $IDProyek }}">
@endsection
