/**
 * general POST with file upload ajax Request
 */
$.fn.postFile = function(options){
    //Defines the variable
    var defaults = {success : function(){}, error : function(){}, ext : []};
    var options = $.extend(defaults, options);
    //init form file
    var formData = new FormData(this[0]);
    if (options.ext.length>0){
        fileValidation(this, options.ext);
    }
    return false;
    // make post ajax call
    $.ajax({
        url :this[0].action,
        type :'POST',
        data : formData,
        dataType : 'json',
        contentType: false,
        processData: false,
        cache: false,
        mimeTypes: "multipart/form-data",
        beforeSend : function(){
            sLoader('show');
        
        },
        success : function(r){
            sLoader('hide');
            if ($.isFunction(options.success)) {
                options.success.call(this, r);
            }
            
        },
        error : function(xhr){
            console.log(xhr);
            catchError(xhr);
            if ($.isFunction(options.error)) {
                options.error.call(this, xhr);
            }                       
        }
    });

}

/**
 * General POST ajax request
 * @param string id
 * @return void
 */
$.fn.postAjax = function(options, id){
    // defines the variable
    var obj; 
    var data;
    var url;
    var defaults = {success : function(){}, error : function(){}};
    var options = $.extend(defaults, options);
    //validate type of selector
    if (typeof id !='undefined'){
        obj = $('#'+id);
        data = {'_token' : $('meta[name="csrf-token"]').attr('content'),id : obj.val()};
        url = obj.data('url');
    }else{
        obj = this;
        data =this.serialize();
        url = this[0].action;
    }
    // make post ajax call
    $.ajax({
        url :url,
        type :'POST',
        data : data,
        dataType : 'json',
        beforeSend : function(){
            sLoader('show');
        
        },
        success : function(r){
            sLoader('hide');
            if ($.isFunction(options.success)) {
                options.success.call(this, r);
            }
            
        },
        error : function(xhr){
            console.log(xhr);
            catchError(xhr);
            if ($.isFunction(options.error)) {
                options.error.call(this, xhr);
            }                       
        }
    });
} 
/**
 * Catch the xhr response on response error
 * @param {void} err 
 * @return void
 */
var catchError = function(err){
    console.log(err);
    var message = '';
    message += err.responseJSON.errors+' \n';
    message += err.status+' \n '+err.statusText+' \n ';
    message += err.responseJSON.exception+' \n ';
    message += err.responseJSON.message+' \n\n ';
    message += JSON.stringify(err.responseJSON.trace, null, '\t');
    alert(message);
}
/**
 * Form validation
 * 
 */
$.fn.postValidate = function(){
    var result = true;
    var validateForm = Array.prototype.filter.call(this, function(form){
        if (form.checkValidity()===false){
            for (i=0; i< form.elements.length; i++){
                form.elements[i].classList.remove('is-invalid');
                if (form.elements[i].checkValidity() === false){    
                    form.elements[i].focus();
                    break;
                }
            }
            result = false;
        }else{
            for (i=0; i< form.elements.length; i++) form.elements[i].classList.remove('is-invalid');
        }
        form.classList.add('was-validated');
    });
    return result;
}
/**
 * Catch the validation from form validation in PHP
 */
var catchValidation = function(err){
    if (typeof err.responseJSON.errors != 'undefined'){
        $.each(err.responseJSON.errors, function(i, v){
            document.getElementById(i).classList.add('is-invalid');
            document.getElementById(i).nextElementSibling.innerHTML=v.join(',');
        });
    }
}

var fileValidation = function(obj, allowedExt){
    obj[0].classList.remove('was-validated');
    var file;
    var ext;
    //force rule into uppercase
    var exts = new Array;
    for(il=0; il<allowedExt.length; il++){
        exts.push(allowedExt[il].toUpperCase());
    }
    //looping the rules
    for(i=0; i<obj[0].length; i++){
        if (obj[0][i].type=='file' && obj[0][i].value!=""){
            file =obj[0][i].value;
            ext = file.split('.');
            if (exts.indexOf($.trim(ext[ext.length-1]).toUpperCase()) < 0  ){
                obj[0][i].classList.add('is-invalid');
                console.log(obj[0][i]);
                return false;
            }
        }
    }
    obj[0].classList.add('was-validate');
    obj[0].checkValidity()
    return true;
}