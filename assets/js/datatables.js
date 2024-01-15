$(document).ready(function () {
    "use strict";

    /**
     * Datatables
     */
    $('#helpdesks-table').DataTable({
        'responsive': true,
        // 'scrollX': true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'order': [[1, 'desc']],
        'ajax': {
            'type': "POST",
            'data': { 'table': 'helpdesks' },
            'url': 'assets/components/includes/datatables/helpdesks.php'
        },
        'columns': [
            { 'data': 'DateRequested' },
            { 'data': 'RequestNo' },
            { 'data': 'RequestType' },
            { 'data': 'Category' },
            { 'data': 'SubCategory' },
            { 'data': 'Status' }
        ]
    });
    $('#all-helpdesks-table').DataTable({
        'responsive': true,
        // 'scrollX': true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'order': [[1, 'desc']],
        'ajax': {
            'type': "POST",
            'data': { 'table': 'helpdesks' },
            'url': 'assets/components/includes/datatables/allhelpdesks.php'
        },
        'columns': [
            { 'data': 'DateRequested' },
            { 'data': 'RequestNo' },
            { 'data': 'RequestType' },
            { 'data': 'Category' },
            { 'data': 'SubCategory' },
            { 'data': 'Status' }
        ]
    });
});
