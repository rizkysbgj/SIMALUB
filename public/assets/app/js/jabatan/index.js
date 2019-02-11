//== Class Initialization
jQuery(document).ready(function () {
    //Control.Init();
    Table.Init();
});

var Table = {
    Init: function () {
        t = $("#divRoleList").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        url: "/api/role/list",
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
                    field: "RoleID", title: "Action", sortable: false, textAlign: "center", width: 200, template: function (t) {
                        var strBuilder = '<a href="/Role/Edit/' + t.RoleID + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
                        strBuilder += '<a href="/Role/Delete/' + t.RoleID + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-eraser"></i></a>';
                        return strBuilder;
                    }
                },
                { field: "Role", title: "Role Name", textAlign: "center", width: 300 },
            ]
        })


    }
}

var Control = {
    Init: function () {
        if ($("#errorMsg").val() != "-") {
            Common.Alert.ErrorRoute($("#errorMsg").val(), document.referrer);
        }

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
