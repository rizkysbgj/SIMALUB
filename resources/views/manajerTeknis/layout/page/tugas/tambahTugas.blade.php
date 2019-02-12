@extends('manajerTeknis.layout.index')

@section('content')
<div class="m-content">
	<div class="row">
		<div class="col-lg-12">

			<!--begin::Portlet-->
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								Buat Tugas
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="m-form m-form--label-align-right" id="formNewStory">
                    {{ csrf_field() }} 
					<div class="m-form__content">
						<div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="msgStoryFail">
							<div class="m-alert__icon">
								<i class="la la-warning"></i>
							</div>
							<div class="m-alert__text">
								Oh sorry! Please check your form story again :).
							</div>
							<div class="m-alert__close">
								<button type="button" class="close" data-close="alert" aria-label="Close"></button>
							</div>
						</div>
					</div>

					<div class="m-portlet__body">

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Nama Tugas <strong style="color:red" ;>*</strong>:
							</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" maxlength="100" name="tbxTaskName" id="tbxTaskName" required >
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Deskripsi Tugas <strong style="color:red" ;>*</strong>:
							</label>
							<div class="col-lg-6">
								<textarea type="text" class="form-control m-input" name="tbxTaskDescription" id="tbxTaskDescription" rows="4" required></textarea>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Tanggal Penugasan <strong style="color:red" ;>*</strong>:
							</label>
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="input-group date">
									<input type="text" class="form-control m-input datepicker" name="tbxStartPlan" readonly id="tbxStartPlan" required />
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Tanggal Deadline <strong style="color:red" ;>*</strong>:
							</label>
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="input-group date">
									<input type="text" class="form-control m-input datepicker" name="tbxEndPlan" readonly id="tbxEndPlan" required />
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar"></i>
										</span>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<div class="row">
								<div class="col-lg-9 ml-lg-auto">
									<button onclick="JavaScript: window.history.back(1); return false;" class="btn btn-secondary">
										Cancel
									</button>
                                    <button id="btnCreate" class="btn btn-success">
                                        Create
                                    </button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>

<input type="hidden" id="ProjectID" value="{{$IDProyek}}">
<script src="{{ asset('assets/app/js/tugas/create.js') }}" type="text/javascript"></script>
@endsection