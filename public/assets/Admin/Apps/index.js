/**
 * Initial event
 */
var init = function(){
    $('#app-index').submit(function(e){
        e.preventDefault();
        displayIndex();
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

var injectTable = function(obj){
    
    var tr = "";
    var td = $('#table-apps thead tr th');
    var tbody = $('#table-apps tbody');
    $.each(obj, function(i, v) {
        datas = "";
        $.each(v, function(id, iv) {
            datas += 'data-' + id + '="' + iv + '"';
        });
        tr += "<tr id='act_" + i + "' " + datas + " class='context-menu' title='Right Click to choose operation. &#013;Menu  : &#013;"+v.name+" - "+v.id+"'>";
        $.each(td, function(index, field) {
            tr += "<td style='" + $(this).attr('style') + "' class='" + $(this).attr('class') + "'>";
            if ($(this).data('field')=='icon'){
                if (v[$(this).data('field')]==null)
                    tr += "<i class='fa fa-th'></i>";
                else
                    tr += "<i class='fa "+v[$(this).data('field')]+"'></i>";        
            }else{
                if (v[$(this).data('field')]==null)
                    tr += '-';
                else
                    tr += v[$(this).data('field')];
            }
            
            tr += "</td>";
        });
        tr += "</tr>";
    });
    tbody.html(tr);
}