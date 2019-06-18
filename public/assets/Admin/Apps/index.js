var conf = {
    "scrollY"   : 400,
    "paging"    : false,
    "ordering"  : false,
    "info"      : false,
    "searching" : false
}
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
    
    var tr = "";
    var td = $('#table-apps thead tr th');
    var tbody = $('#table-apps tbody');
    var column = arrangeCol(td);
    conf.columns = column;
    // console.log(table.columns);
    var records = new Array;
    $.each(obj, function(i, v) {
        var person = new Object();
        $.each(td, function(index, field) {
            field = $(this).data('field');
            if (field=='icon'){
                if (v[$(this).data('field')]==null)
                    person[field] = "<i class='fa fa-th'></i>";
                else
                    person[field] = "<i class='fa "+v[$(this).data('field')]+"'></i>";    
            }else{
                person[field] = v[field];
            }
             
        });
        records.push(person);
        // datas = "";
        // $.each(v, function(id, iv) {
        //     datas += 'data-' + id + '="' + iv + '"';
        // });
        // tr += "<tr id='act_" + i + "' " + datas + " class='context-menu' title='Right Click to choose operation. &#013;Menu  : &#013;"+v.name+" - "+v.id+"'>";
        // $.each(td, function(index, field) {
        //     tr += "<td style='" + $(this).attr('style') + "' class='" + $(this).attr('class') + "'>";
        //     if ($(this).data('field')=='icon'){
        //         if (v[$(this).data('field')]==null)
        //             tr += "<i class='fa fa-th'></i>";
        //         else
        //             tr += "<i class='fa "+v[$(this).data('field')]+"'></i>";        
        //     }else{
        //         if (v[$(this).data('field')]==null)
        //             tr += '-';
        //         else
        //             tr += v[$(this).data('field')];
        //     }
            
        //     tr += "</td>";
        // });
        // tr += "</tr>";
    });
    table = $("#table-apps").DataTable(conf);
    table.clear();
    table.rows.add(records).draw();
    // console.log(records);
    // tbody.html(tr);
    
    // $("#table-apps").DataTable({
    //     "scrollY"   : 400,
    //     "paging"    : false,
    //     "ordering"  : false,
    //     "info"      : false,
    //     "searching" : false
    // })
    // .rows()
    // .invalidate('data')
    // .draw();
    
}