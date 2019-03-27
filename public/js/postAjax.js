$.fn.postAjax = function(obj){
    $.ajax({
        url : obj.url,
        type : 'POST',
        data : $(obj.id).serialize(),
        dataType : 'json',
        beforeSend : function(){
            if (typeof obj.loadFunc == 'undefined' || typeof obj.loadFunc==null){
                sLoader('show');
            }
        },
        success : function(r){
            console.log(r);
        },
        error : function(xhr){
            console.log(xhr);                       
        }
    });
} 