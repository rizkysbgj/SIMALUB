@extends('manajerTeknis.layout.index')
@section('title', 'Halaman Tugas')
@section('content')
<div class="m-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Daftar Tugas
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<!--begin: Search Form -->
					<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
						<div class="row align-items-center">
							<div class="col-xl-4 order-2 order-xl-1">
								<div class="form-group m-form__group row align-items-center">
									<div class="col-md-5">
										<div class="m-input-icon m-input-icon--left">
											<input type="text" class="form-control m-input" placeholder="Search..." id="tbxSearch">
											<span class="m-input-icon__icon m-input-icon__icon--left">
												<span>
													<i class="la la-search"></i>
												</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!-- modal untuk kaji ulang -->
							<div class="modal hide fade" id="kajiulang" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Kaji Ulang Parameter
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
											<form class="m-form">
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-5 col-sm-12 m--align-right" !important>
														Metode :
													</label>
													<div class="col-lg-7 col-md-7 col-sm-12 m--align-left" style="padding-left: 0px;" id="modalMetode" !important>
														<div class="m-radio-inline" style="margin-top: 8px;">
															<label class="m-radio">
																<input type="radio" name="modalMetode" value="1">
																	Bisa
																<span></span>
															</label>
															<label class="m-radio">
																<input type="radio" name="modalMetode" value="2">
																	Tidak Bisa
																<span></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-5 col-sm-12 m--align-right" !important>
														Peralatan :
													</label>
													<div class="col-lg-7 col-md-7 col-sm-12 m--align-left" style="padding-left: 0px;" id="modalPeralatan" !important>
														<div class="m-radio-inline" style="margin-top: 8px;">
															<label class="m-radio">
																<input type="radio" name="modalPeralatan" value="1">
																	Bisa
																<span></span>
															</label>
															<label class="m-radio">
																<input type="radio" name="modalPeralatan" value="2">
																	Tidak Bisa
																<span></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-5 col-sm-12 m--align-right" !important>
														Personil :
													</label>
													<div class="col-lg-7 col-md-7 col-sm-12 m--align-left" style="padding-left: 0px;" id="modalPersonil" !important>
														<div class="m-radio-inline" style="margin-top: 8px;">
															<label class="m-radio">
																<input type="radio" name="modalPersonil" value="1">
																	Bisa
																<span></span>
															</label>
															<label class="m-radio">
																<input type="radio" name="modalPersonil" value="2">
																	Tidak Bisa
																<span></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-5 col-sm-12 m--align-right" !important>
														Bahan Kimia :
													</label>
													<div class="col-lg-7 col-md-7 col-sm-12 m--align-left" style="padding-left: 0px;" id="modalbahanKimia" !important>
														<div class="m-radio-inline" style="margin-top: 8px;">
															<label class="m-radio">
																<input type="radio" name="modalbahanKimia" value="1">
																	Bisa
																<span></span>
															</label>
															<label class="m-radio">
																<input type="radio" name="modalbahanKimia" value="2">
																	Tidak Bisa
																<span></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-5 col-sm-12 m--align-right" !important>
														kondisi Akomodasi :
													</label>
													<div class="col-lg-7 col-md-7 col-sm-12 m--align-left" style="padding-left: 0px;" id="modalkondisiAkomodasi" !important>
														<div class="m-radio-inline" style="margin-top: 8px;">
															<label class="m-radio">
																<input type="radio" name="modalkondisiAkomodasi" value="1">
																	Bisa
																<span></span>
															</label>
															<label class="m-radio">
																<input type="radio" name="modalkondisiAkomodasi" value="2">
																	Tidak Bisa
																<span></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-5 col-sm-12 m--align-right" !important>
														<strong>Kesimpulan : </strong>
													</label>
													<div class="col-lg-7 col-md-7 col-sm-12 m--align-left" style="padding-left: 0px;" id="modalKesimpulan" !important>
														<div class="m-radio-inline" style="margin-top: 8px;">
															<label class="m-radio">
																<input type="radio" name="modalKesimpulan" value="1">
																	Bisa Dianalisis
																<span></span>
															</label>
															<label class="m-radio">
																<input type="radio" name="modalKesimpulan" value="2">
																	Tidak Bisa Dianalisis
																<span></span>
															</label>
														</div>
													</div>
												</div>
											</form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="#">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
							</div>
							
							<!-- modal untuk create tugas -->
							<div id="formNewStory">
                                <div class="modal hide fade" id="tambahTugas" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Tambah Tugas
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">
                                                        &times;
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
														Nama Tugas <strong style="color:red" ;>*</strong>:
                                                    </label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
														<input type="text" class="form-control m-input" maxlength="100" name="tbxTaskName" id="tbxTaskName" required >
													</div>
												</div>
												<div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
														Deskripsi Tugas <strong style="color:red" ;>*</strong>:
													</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
														<textarea type="text" class="form-control m-input" name="tbxTaskDescription" id="tbxTaskDescription" rows="4" required></textarea>
													</div>
												</div>
												<div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
														Tanggal Penugasan <strong style="color:red" ;>*</strong>:
													</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
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
                                                    <label class="col-form-label col-lg-3 col-sm-12 m--align-right" !important>
														Tanggal Deadline <strong style="color:red" ;>*</strong>:
													</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12" style="padding-left: 0px;">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-success" id="btnCreate">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<!-- 2 Button di atas kanan halaman -->
							<div class="col-xl-8 order-1 order-xl-2 m--align-right">
								<a href="{{ url('halamanSubkontrak/'.$IDProyek) }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
								<!-- <a href="#" data-toggle="modal" data-target="#tambahTugas" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> -->
									<span>
										<i class="fa fa-folder"></i>
										<span>
											Daftar Subkontrak
										</span>
									</span>
								</a>
								<a href="{{ url('halamanTugas/tambahTugas/'.$IDProyek) }}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
								<!-- <a href="#" data-toggle="modal" data-target="#tambahTugas" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-left: 10px;"> -->
									<span>
										<i class="fa fa-plus"></i>
										<span>
											Tambah Tugas
										</span>
									</span>
								</a>
								<div class="m-separator m-separator--dashed d-xl-none"></div>
							</div>
						</div>
					</div>
					<!--end: Search Form -->
					<!--begin: Datatable -->
					<div class="m_datatable" id="divStoryList"></div>
					<!--end: Datatable -->
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('assets/app/js/tugas/index.js') }}" type="text/javascript"></script>
<input type="hidden" id="ProjectID" value="{{$IDProyek}}">
<script src="{{ asset('assets/app/js/tugas/create.js') }}" type="text/javascript"></script>
@endsection