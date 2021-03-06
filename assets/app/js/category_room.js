$(document).ready(function() {

    var mainArea = "web";
    var mainRoute = "category_room";
    var renderConfig = {
        "table":"#table",
        "route":mainRoute,
        "request":"POST",
        "area":mainArea,
        "column":[
            {
                "targets": 0,
                "orderable": false,
                "className": "text-center",
                "render": function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "targets": 1,
                "data": "categories_room_name"
            },
            {
                "targets": 2,
                "data": "categories_room_cost"
            },
            {
                "targets": 3,
                "data": "categories_room_description"
            },
            {
                "targets": 4,
                "orderable": false,
                "className": "text-center",
                "render": function (data, type, row, meta) {
                    var config = {
                        "route":mainRoute,
                        "id":row.categories_room_id,
                        "area":"web"
                    };
                    return appDataTable.action(config);
                }
            },
        ]
    };

    appDataTable.render(renderConfig);

});