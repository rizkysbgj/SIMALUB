@extends('manajerTeknis.layout.index')
@section('title', 'Proyek : ' . $vwProyek['NamaProyek'])
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
            <!--begin:: Widgets/Tasks -->
            <div class="m-portlet m-portlet--full-height" id="bebasMinimize">
                <div class="m-portlet__head">

                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Tugas
								<span class="m-menu__link-badge">
									<span class="m-badge m-badge--info">
										{{ $vwProyek['TotalTugas'] }}
									</span>
								</span>
                            </h3>
                        </div>
                    </div>

                    <!-- <div class="m-portlet__head-tools">

                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <small class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                    Order By :
                                </small>
                                <div class="m-dropdown__wrapper" style="width: 130px;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body" >
                                            <div class="m-dropdown__content" >
                                                <ul class="m-nav">
                                                    <li class="m-nav__item TaskOrderBy" id="Order-UpdatedDate">
                                                        <a style="cursor:pointer" class="m-nav__link">
                                                            <span class="m-nav__link-text text-sm-right">
                                                                Update Date
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item TaskOrderBy" id="Order-TaskName">
                                                        <a style="cursor:pointer" class="m-nav__link">
                                                            <span class="m-nav__link-text text-sm-right">
                                                                Task Name
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item TaskOrderBy" id="Order-TaskCode">
                                                        <a style="cursor:pointer" class="m-nav__link">
                                                            <span class="m-nav__link-text text-sm-right">
                                                                Task Code
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div> -->

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item" m-dropdown-toggle="hover" aria-expanded="true">
                                <button type="button" class="btn btn-brand m-btn m-btn--icon m-btn--icon-only" id="minimizeTaskLeft">
                                    <i class="fa fa-chevron-left"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body" style="padding-left: 15px; padding-right: 15px;">
                    <!-- <div class="m-scrollable" data-scrollable="true" data-max-height="500px" style="height: 380px; overflow: hidden;"> -->
                    <div class="m-scrollable" data-scrollable="true" data-max-height="380px" style="height: 380px; overflow: hidden;">
                        <div id="showTask">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-lg-8" id="detailTask">
        
        </div>
    </div>

</div>

@else
<div class="m-content">
    <div class="alert alert-warning m-alert--default m--align-center" role="alert" style="padding:20px;">
        <strong>
            Maaf,
        </strong>
        proyek ini belum memiliki tugas. Silahkan klik tombol disamping untuk membuat tugas terlebih dahulu
        <a href="{{ url('halamanTugas/tambahTugas/' .$vwProyek['IDProyek']) }}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-left: 10px;">
		    <span>
                <i class="fa fa-plus"></i>
                <span>
                    Tambah Tugas
                </span>
            </span>
        </a>
    </div>
</div>
@endif

<input type="hidden" id="IDProyek" value="{{ $vwProyek['IDProyek'] }}" >
<input type="hidden" id="IDTugas" value="{{ $IDTugas }}" >
<script src="{{ asset('assets/app/js/pinnedProject/index.js') }}" type="text/javascript"></script>
@endsection
