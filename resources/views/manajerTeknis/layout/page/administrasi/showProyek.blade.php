
<!-- <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; height: 380px; max-height: 380px; position: relative;"> -->

<div class="m-portlet m-portlet--full-height" id="bebasMinimize">
	<div class="m-portlet__head">

		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Daftar Proyek
					<span class="m-menu__link-badge">
						<span class="m-badge m-badge--info">
							{{$mstProyekList->count()}}
						</span>
					</span>
				</h3>
			</div>
		</div>

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
			<div id="showProyek">
			@foreach ($mstProyekList as $mstProyek)
				<div class="tab-content divShowDetail" id="{{ $mstProyek['IDProyek'] }}">
					<div class="tab-pane active" id="m_widget2_tab1_content">
						<div class="m-widget2">
							<div class="m-widget2__item m-widget2__item--success">
								<div class="m-widget2__checkbox">
									<!-- @*UNTUK JARAK ANTARA WARNA DAN TULISAN*@ -->
								</div>
								<div class="m-widget2__desc">
									<div>
										<span class="m-widget2__text" style="float: left;">
											{{ $mstProyek['InisialProyek'] }}    
										<!-- @Html.DisplayFor(model => task.TaskCode) -->
										</span>

										<span class="m-badge m-badge--success m-badge--wide" style="float: right;">
											<!-- @Html.DisplayFor(model => task.Milestone) -->
											@if($mstProyek['RealitaSelesai'] != "")
												Proyek Selesai
											@else
												Cetak Sertifikat
											@endif
										</span>
									</div>
								</div>
								<span class="m-widget2__user-name">
									<a class="m-widget2__link" style="padding-left: 35px;">
										<!-- @Html.DisplayFor(model => task.TaskName) -->
										{{ $mstProyek['NamaProyek'] }} 
									</a>
								</span>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="m_widget2_tab2_content"></div>
					<div class="tab-pane" id="m_widget2_tab3_content"></div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="IDProyek" value="{{ $IDProyek }}" />