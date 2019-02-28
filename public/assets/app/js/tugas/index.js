//== Class Initialization
jQuery(document).ready(function () {
	Table.Init();
});

var Table = {
	Init: function () {
		var IDProyek = $("#ProjectID").val();
		t = $("#divStoryList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/tugas/list/" + IDProyek,
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: true,
					webstorage: true
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			sortable: true,
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
			},
			search: {
				input: $("#tbxSearch")
			},
			columns: [
				{
					field: "TaskID", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Tugas"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Dokumen"><i class="la la-file"></i></a>\t\t\t\t\t\t';
						// strBuilder += '<button onclick="Button.deleteTugas('+ t.IDTugas +')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus"><i class="la la-trash"></i></button>';
						return strBuilder;
					}
				},
				{
					field: "KajiUlang", title: "Kaji Ulang Analisis", sortable: false, textAlign: "center", template: function (t) {
						// var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Story"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						if(t.Status != "OK"){
							if(t.Status == 'Bisa')
								var strBuilder = '<button class="btn btn-success" style="width: 100px;"><span><small>Sudah Dikaji</small></span></button>';
							else
							var strBuilder = '<button class="btn btn-primary" style="width: 100px;"><span><small>Subkontrak</small></span></button>';	
						}
						else
							var strBuilder = '<button onclick="Modal.kajiUlang('+t.IDTugas+')" class="btn btn-danger" style="width: 100px;"><span><small>Belum Dikaji</small></span></button>';
						return strBuilder;
					}
					
				},
				{ field: "InisialTugas", title: "Kode Tugas", textAlign: "center" },
				{ field: "NamaTugas", title: "Nama Tugas", textAlign: "center" },
				{
					field: "RencanaMulai", title: "Tanggal Penugasan", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaMulai != null ? Common.Format.Date(t.RencanaMulai) : "-"
					}
				},
				{
					field: "RencanaSelesai", title: "Tanggal Deadline", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaSelesai != null ? Common.Format.Date(t.RencanaSelesai) : "-"
					}
				},
				{
					field: "RealitaMulai", title: "Realita Mulai", sortable: false, textAlign: "center", template: function (t) {
						return t.RealitaMulai != null ? Common.Format.Date(t.RealitaMulai) : "-"
					}
				},
				{
					field: "RealitaSelesai", title: "Realita Selesai", sortable: false, textAlign: "center", template: function (t) {
						return t.RealitaSelesai != null ? Common.Format.Date(t.RealitaSelesai) : "-"
					}
				},
			]
		})
	}
}

var Modal = {
	kajiUlang:function(id){
		$("#modalkajiUlang").modal({
			backdrop: "static"
		});
		var btn = $("#submitKajiUlang");
		btn.on("click", function(){
			var params = {
				IDTugas: id,
				Metode:$("input[name='modalMetode']:checked").val(),
				Peralatan:$("input[name='modalPeralatan']:checked").val(),
				Personil:$("input[name='modalPersonil']:checked").val(),
				BahanKimia:$("input[name='modalbahanKimia']:checked").val(),
				KondisiAkomodasi:$("input[name='modalkondisiAkomodasi']:checked").val(),
				Kesimpulan:$("input[name='modalKesimpulan']:checked").val()
			};
			btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
			
			console.log(params)

			$.ajax({
				url: "/api/kajiulang/",
				type: "PUT",
				dataType: "json",
				contentType: "application/json",
				data: JSON.stringify(params),
				cache: false,
			}).done(function (data, textStatus, jqXHR) {
				$("#divStoryList").mDatatable("reload");
				
				$("input[name='modalMetode']").prop('checked', false);
				$("input[name='modalPeralatan']").prop('checked', false);
				$("input[name='modalPersonil']").prop('checked', false);
				$("input[name='modalbahanKimia']").prop('checked', false);
				$("input[name='modalkondisiAkomodasi']").prop('checked', false);
				$("input[name='modalKesimpulan']").prop('checked', false);
	
				$("#modalkajiUlang").modal("toggle");
				
				if (Common.CheckError.Object(data) == true)
					Common.Alert.SuccessRoute("Kaji Ulang Berhasil", '/halamanTugas/' + IDProyek);
				else
					Common.Alert.Warning(data.ErrorMessage);

				btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
			}).fail(function (jqXHR, textStatus, errorThrown) {
				Common.Alert.Error(errorThrown);
				btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
			})
		})
		$("#btnClose").on("click", function(){
			$("#divStoryList").mDatatable("reload");
			
			$("input[name='modalMetode']").prop('checked', false);
			$("input[name='modalPeralatan']").prop('checked', false);
			$("input[name='modalPersonil']").prop('checked', false);
			$("input[name='modalbahanKimia']").prop('checked', false);
			$("input[name='modalkondisiAkomodasi']").prop('checked', false);
			$("input[name='modalKesimpulan']").prop('checked', false);
		})
	}
}

var Button ={
	deleteTugas:function(id){
		$.ajax({
			url: "/api/tugas/" + id,
			type: "DELETE",
			dataType: "json",
			contentType: "application/json",
		}).done(function (data, textStatus, jqXHR) {
			
			if (Common.CheckError.Object(data) == true){
				Common.Alert.Success("Tugas Berhasil Dihapus", '/halamanTugas/' + id);
				$("#divStoryList").mDatatable('reload');
			}
			else
				Common.Alert.Warning(data.ErrorMessage);

		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	}
}
