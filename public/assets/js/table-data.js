/******/ (() => {
    // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*******************************************!*\
  !*** ./resources/assets/js/table-data.js ***!
  \*******************************************/
    $(function (e) {
        //______Basic Data Table
        $("#basic-datatable").DataTable({
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
            },
        }); //______Basic Data Table

        $("#responsive-datatable").DataTable({
            language: {
                searchPlaceholder: "Search...",
                scrollX: "100%",
                sSearch: "",
            },
        }); //______File-Export Data Table

        var table = $("#file-datatable").DataTable({
            buttons: ["copy", "excel", "pdf", "colvis"],
            language: {
                searchPlaceholder: "Search...",
                scrollX: "100%",
                sSearch: "",
            },
        });
        table
            .buttons()
            .container()
            .appendTo("#file-datatable_wrapper .col-md-6:eq(0)"); //______Delete Data Table

        var table = $("#pending-tasks-files").DataTable({
            buttons: [
                {
                    extend: "copy",
                    exportOptions: {
                        columns: [0, 1, 4], // Specify the indices of the columns you want to include
                    },
                },
                {
                    extend: "excel",
                    exportOptions: {
                        columns: [0, 1, 4],
                    },
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: [0, 1, 4],
                    },
                    customize: function (doc) {
                        // Iterate through each button and hide the one with specific text
                        $(doc.content)
                            .find(".btn-dark.btn-sm")
                            .filter(':contains("View Task Notes")')
                            .hide();
                    },
                },
                {
                    extend: "colvis",
                    columns: [0, 1, 4], // Exclude the first column from column visibility toggle
                },
            ],
            language: {
                searchPlaceholder: "Search...",
                scrollX: "100%",
                sSearch: "",
            },
        });

        table
            .buttons()
            .container()
            .appendTo("#pending-tasks-files_wrapper .col-md-6:eq(0)");

        var table = $("#delete-datatable").DataTable({
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
            },
        });
        $("#delete-datatable tbody").on("click", "tr", function () {
            if ($(this).hasClass("selected")) {
                $(this).removeClass("selected");
            } else {
                table.$("tr.selected").removeClass("selected");
                $(this).addClass("selected");
            }
        });
        $("#button").click(function () {
            table.row(".selected").remove().draw(false);
        });
        $("#example2").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#completed-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search ...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#north-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search ...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#south-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search ...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#stations-list").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search ...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });

        $("#unassigned-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#user-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#incoming-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#pending-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });

        $("#outgoing-tasks").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#jahra-dcc").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#jabryia-dcc").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#town-dcc").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#shuaiba-dcc").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#national-dcc").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page",
            },
        });
        $("#example3").DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function header(row) {
                            var data = row.data();
                            return "Details for " + data[0] + " " + data[1];
                        },
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: "table",
                    }),
                },
            },
        }); //______Select2

        $(".select2").select2({
            placeholder: "Choose one",
            searchInputPlaceholder: "Search",
        });
    });
    /******/
})();
