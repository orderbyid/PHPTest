var i = 0;
var columns = {
    id: i++,
    edit: i++,
    delete: i++,
    img: i++,
    prodotto: i++,
    data: i++,
    descrizione: i++,
    tag: i++
};
$(document).ready(function () {
    $('#tbProduct').DataTable({
        bPaginate: false,
        order: [columns.data, "desc"],
        oLanguage: {sSearch: "Cerca Tag:"},
        columnDefs: [
            {targets: columns.id, visible: false},
            {targets: columns.edit, orderable: false},
            {targets: columns.img, orderable: false},
            {targets: columns.prodotto, searchable: false},
            {targets: columns.data, type: 'date-euro'},
            {targets: columns.descrizione, searchable: false},
            {targets: columns.tag, orderable: false}
        ]
    });
});
$.extend($.fn.dataTableExt.oSort, {
    "date-euro-pre": function (a) {
        var x;
        if ($.trim(a) !== '') {
            var frDatea = $.trim(a).split(' ');
            var frTimea = frDatea[1].split(':');
            var frDatea2 = frDatea[0].split('/');
            x = (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1]) * 1;
        } else {
            x = Infinity;
        }
        return x;
    },
    "date-euro-asc": function (a, b) {
        return a - b;
    },
    "date-euro-desc": function (a, b) {
        return b - a;
    }
});