
<!-- <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; height: 380px; max-height: 380px; position: relative;"> -->

@foreach ($mstTugasList as $mstTugas)

	@php ($color = "")
	@if ($mstTugas['IDMilestone'] == "1" || $mstTugas['IDMilestone'] == "2" || $mstTugas['IDMilestone'] == "3")
		@php ($color = "warning")
	@elseif ($mstTugas['IDMilestone'] == "4" || $mstTugas['IDMilestone'] == "5" || $mstTugas['IDMilestone'] == "6")
		@php ($color = "danger")
	@elseif ($mstTugas['IDMilestone'] == "7" || $mstTugas['IDMilestone'] == "8" || $mstTugas['IDMilestone'] == "9")
		@php ($color = "primary")
	@elseif ($mstTugas['IDMilestone'] == "10" || $mstTugas['IDMilestone'] == "11")
		@php ($color = "success")
	@endif
	<div class="tab-content divShowDetail" id="{{ $mstTugas['IDTugas'] }}">
		<div class="tab-pane active" id="m_widget2_tab1_content">
			<div class="m-widget2">
				<div class="m-widget2__item m-widget2__item--{{$color}}">
					<div class="m-widget2__checkbox">
						<!-- @*UNTUK JARAK ANTARA WARNA DAN TULISAN*@ -->
					</div>
					<div class="m-widget2__desc">
						<div>
							<span class="m-widget2__text" style="float: left;">
                                {{ $mstTugas['InisialTugas'] }}    
                            <!-- @Html.DisplayFor(model => task.TaskCode) -->
							</span>

							<span class="m-badge m-badge--{{$color}} m-badge--wide" style="float: right;">
								<!-- @Html.DisplayFor(model => task.Milestone) -->
								{{ $mstTugas['Milestone'] }}
                                
							</span>
						</div>
					</div>
					<span class="m-widget2__user-name">
						<a class="m-widget2__link" style="padding-left: 35px;">
                            <!-- @Html.DisplayFor(model => task.TaskName) -->
                            {{ $mstTugas['NamaTugas'] }} 
						</a>
					</span>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="m_widget2_tab2_content"></div>
		<div class="tab-pane" id="m_widget2_tab3_content"></div>
	</div>
@endforeach
