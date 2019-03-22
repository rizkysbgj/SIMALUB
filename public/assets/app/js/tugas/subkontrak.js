//== Class Initialization
jQuery(document).ready(function () {
	Table.Subkontrak();
});

var Table = {
	Subkontrak: function () {
		var IDProyek = $("#IDProyek").val();
		t = $("#divSubkontrakList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/subkontrak/" + IDProyek,
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
					field: "#", title: "Status Tugas Subkontrak", sortable: false, textAlign: "center", template: function (t) {
						if(t.StatusSubKontrak != 0)
							var strBuilder = '<button onclick="Modal.statussubkontrak('+t.IDSubKontrak+')" class="btn btn-success" style="width: 100px;"><span><small>Sudah</small></span></button>';
                        else
						var strBuilder = '<button onclick="Modal.statussubkontrak('+t.IDSubKontrak+')" class="btn btn-danger" style="width: 100px;"><span><small>Belum</small></span></button>';
                        return strBuilder;
					}
					
				},
				{
					field: "Attachment", title: "Download Hasil Tugas Subkontrak", sortable: false, textAlign: "center", template: function (t) {
						if(t.Attachment != null)
							var strBuilder = '<a href="/api/subkontrak/download/'+ t.IDSubKontrak +'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Download Dokumen"><i class="la la-download"></i></a>\t\t\t\t\t\t';
						else
							var strBuilder = '<a>-</a>\t\t\t\t\t\t';
						return strBuilder;
					}
				},
				{ field: "NamaTugas", title: "Nama Tugas", textAlign: "center" },
				{
					field: "RencanaMulai", title: "Waktu Dikirim", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuDikirim != null ? Common.Format.Date(t.WaktuDikirim) : "-"
					}
				},
				{
					field: "RencanaSelesai", title: "Waktu Diterima", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuDiterima != null ? Common.Format.Date(t.WaktuDiterima) : "-"
					}
				},
				{ field: "NamaLengkap", title: "Penanggung Jawab", textAlign: "center" },
				{ field: "Catatan", title: "Catatan", textAlign: "center", sortable: false, template: function (t) {
						if(t.Catatan != null)
							var strBuilder = t.Catatan;
						else
							var strBuilder = '<a>-</a>\t\t\t\t\t\t';
						return strBuilder;
					}	
				},
			]
		})
	}
}
var Modal = {
	statussubkontrak:function(id){
		$("#modalstatussubkontrak").modal({
			backdrop: "static"
		});
		var btn = $("#submitStatusSubkontrak");
        btn.on("click", function(){
            var model = new FormData();
			model.append("IDSubKontrak", id);
            model.append("Catatan", $("#tbxRemark").val());
            
            $('input[type="file"]').each(function($i){
                model.append("Attachment", $(this)[0].files[0]);
            });
            
        	btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
        	$.ajax({
                url: "/api/subkontrak/upload",
                type: 'POST',
                data: model,
                dataType: "json",
                contentType: false,
                processData: false
            }).done(function (data, textStatus, jqXHR) {
                console.log(data);
                // var link = '/halamanLaporan/' + data.IDProyek;
                if (Common.CheckError.Object(data) == true) {
                    Common.Alert.Success("Berhasil, Tugas Subkontrak Telah Selesai");
                    $("#divSubkontrakList").mDatatable("reload");        
                    $("#tbxRemark").val('');
                    $("#inputFile").val('');
                    $('#modalstatussubkontrak').modal("toggle");
                    
                }
                btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                Common.Alert.Error(errorThrown);
                btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
            })
        })
        $("#btnClose").on("click", function(){
			$("#divSubkontrakList").mDatatable("reload");
			
            $("#tbxRemark").val('');
			$("#inputFile").val('');
		})
	}
}
