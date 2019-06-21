var conf = {
    "scrollY"   : 400,
    "paging"    : false,
    "ordering"  : false,
    "info"      : false,
    "searching" : false
}
table = $("#table-apps").DataTable(conf);
/**
 * Initial event
 */
var init = function(){
    // init table
    $('#app-index').submit(function(e){
        e.preventDefault();
        displayIndex();
    });
    $("#table-1").dataTable({
        "scrollX"   : true,
        "scrollY"   : 400,
        "paging"    : false,
        "ordering"  : false,
        "info"      : false,
        "searching" : false
    });
}
/**
 * displaying list of registered application
 */
var displayIndex = function(){
    $('#app-index').postAjax({
        success:function(r){
            if (r.status=="success"){
                injectTable(r.d);
            }else{
                iziToast.error({
                    title: 'Not Found !',
                    message: 'Please try other keywords',
                    position: 'topRight'
                });
            }
        }
    });
}
var arrangeCol = function(td){
    var column = new Array;
    $.each(td, function(index, field) {
        column.push({'data':$(this).data('field')});
    });
    return column;
}
var injectTable = function(obj){
    
    table.clear();
    var td = $('#table-apps thead tr th');
    var tbody = $('#table-apps tbody');
    // var column = arrangeCol(td);
    // conf.columns = column;
    // console.log(table.columns);
    var records = new Array;
    $.each(obj, function(i, v) {
        var row = new Array();
        $.each(td, function(index, field) {
            field = $(this).data('field');
            if (field=='icon'){
                if (v[$(this).data('field')]==null){
                    row.push("<i class='fa fa-th'></i>");
                }else{
                    row.push("<i class='fa "+v[$(this).data('field')]+"'></i>");
                }
            }else{
                row.push(v[field]);
            }
             
        });
        var appendRow = table.row.add(row);
        var t = appendRow.node();
        appendRow.draw();
        datas = "";
        $.each(v, function(id, iv) {
            datas += 'data-' + id + '="' + iv + '"';
            $(t).attr('data-' + id, iv);
        });
        $(t).addClass('context-menu');
        
    });
    // table.rows.add(records).draw();
}