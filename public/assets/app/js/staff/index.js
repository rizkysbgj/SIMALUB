//== Class Initialization
jQuery(document).ready(function () {
    //Control.Init();
    Table.Init();
});

var Table = {
    Init: function () {
        t = $("#divUserList").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        url: "/api/user/list/0",
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
                    field: "NIK", title: "Action", sortable: false, textAlign: "center", width: 100, template: function (t) {
                        var strBuilder = '<a href="/editStaff/' + t.IDUser + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<button onclick="Button.deleteStaff(\''+ t.IDUser  +'\')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus"><i class="la la-trash"></i></button>';
						return strBuilder;
                    }
                },
                { field: "IDUser", title: "User ID", textAlign: "center" },
                { field: "NamaLengkap", title: "Nama Lengkap", textAlign: "center" },
                { field: "Role", title: "Jabatan", textAlign: "center" },
                { field: "Status", title: "Active", sortable: false, textAlign: "center"}
            ]
        })


    }
}

var Control = {
    Init: function () {

        $.ajax({
            url: "/api/user/list",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                var html = "<option value=''>All</option>";
                var select = $("#slsProjectManager");

                $.each(data, function (i, item) {
                    html += '<option value="' + item.FullName + '">' + item.FullName + '</option>';
                });

                $("#slsProjectManager").append(html);
                $("#slsProjectManager").selectpicker("refresh");
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });

        $("#slsProjectManager").on("change", function () {
            t.search($(this).val(), "ProjectManager")
        })
    }
}

var Button ={
	deleteStaff:function($id){
		$.ajax({
			url: "/api/user/" + $id,
			type: "DELETE",
			dataType: "json",
			contentType: "application/json",
		}).done(function (data, textStatus, jqXHR) {
			
			if (Common.CheckError.Object(data) == true){
				Common.Alert.Success("Staff Berhasil Dihapus", '/halamanStaff/' + $id);
				$("#divUserList").mDatatable('reload');
			}
			else
				Common.Alert.Warning(data.ErrorMessage);

		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	}
}