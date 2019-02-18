
<!-- @*<div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; height: 380px; max-height: 380px; position: relative;">*@ -->

@foreach ($mstTugasList as $mstTugas)
	<div class="tab-content divShowDetail" id="@Html.DisplayFor(modelItem => task.TaskID)">
		<div class="tab-pane active" id="m_widget2_tab1_content">
			<div class="m-widget2">
				<div class="m-widget2__item m-widget2__item--@color">
					<div class="m-widget2__checkbox">
						<!-- @*UNTUK JARAK ANTARA WARNA DAN TULISAN*@ -->
					</div>
					<div class="m-widget2__desc">
						<div>
							<span class="m-widget2__text" style="float: left;">
                                {{ $mstTugas['InisialTugas'] }}    
                            <!-- @Html.DisplayFor(model => task.TaskCode) -->
							</span>

							<span class="m-badge m-badge--success m-badge--wide" style="float: right;">
                                <!-- @Html.DisplayFor(model => task.Milestone) -->
                                
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
