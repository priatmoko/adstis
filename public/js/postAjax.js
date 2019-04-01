/**
 * general POST with file upload ajax Request
 */
$.fn.postFile = function(options){
    //Defines the variable
    var defaults = {success : function(){}, error : function(){}, ext : [], maxsize:''};
    var options = $.extend(defaults, options);
    //init form file
    var formData = new FormData(this[0]);
    if (options.ext.length>0){
        if (fileValidation(this, options)===false)
            return false;
    }
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
        error : function(xhr, status, error){
            sLoader('hide');
            catchError(xhr, status, error);
            if ($.isFunction(options.error)) {
                options.error.call(this, xhr, status, error);
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
var catchError = function(err, status, error){
    console.log(status);
    console.log(error);
    console.log(err);
    if (err.status==422){
        catchValidation(err);
    }else{
        var message = '';
        message += status+' : '+error+' \n ';
        if (typeof err !='undefined' && err.hasOwnProperty('responseJSON')){
            message += err.responseJSON.exception+' \n ';
            message += err.responseJSON.message+' \n\n ';
            message += JSON.stringify(err.responseJSON.trace, null, '\t');
        }
        alert(message);
    }
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
    if (err.hasOwnProperty('responseJSON')){
        $.each(err.responseJSON.errors, function(i, v){
            document.getElementById(i).classList.add('is-invalid');
            document.getElementById(i).nextElementSibling.innerHTML=v.join(',');
        });
    }
}

var fileValidation = function(obj, options){
    obj[0].classList.remove('was-validated');
    var file;
    var ext;
    var filesize;
    var errMsg = 'Invalid file format, file extension allowed : ';
    //force rule into uppercase
    var exts = new Array;
    for(il=0; il<options.ext.length; il++){
        exts.push(options.ext[il].toUpperCase());
    }
    //looping the rules
    for(i=0; i<obj[0].length; i++){
        //validate element type file and the value is not empty
        if (obj[0][i].type=='file' && obj[0][i].value!=""){
            //read the file extension
            file =obj[0][i].value;
            ext = file.split('.');
            //validate the uploaded file extension is registered or not on option
            if (exts.indexOf($.trim(ext[ext.length-1]).toUpperCase()) < 0  ){
                //validate the class is-invalid is exist or not
                if (obj[0][i].classList.contains('is-invalid') === false)
                    obj[0][i].classList.add('is-invalid');
                //assign error message
                if (obj[0][i].nextElementSibling.classList.contains('invalid-feedback'))
                    obj[0][i].nextElementSibling.innerHTML = errMsg+exts.join(',');
                //focus on element
                obj[0][i].focus();
                //return false;
                return false;
            }else if (exts.indexOf($.trim(ext[ext.length-1]).toUpperCase()) > 0){
                //file size validation
                filesize = obj[0][i].files[0].size/(1024);
                if (filesize > options.maxsize){
                    if (obj[0][i].classList.contains('is-invalid') === false)
                    obj[0][i].classList.add('is-invalid');
                    //assign error message
                    if (obj[0][i].nextElementSibling.classList.contains('invalid-feedback'))
                        obj[0][i].nextElementSibling.innerHTML = 'Maximum file size is '+options.maxsize+' KB, the uploaded file size is '+Math.round(filesize)+' KB';
                    //focus on element
                    obj[0][i].focus();
                    //return false;
                    return false;
                }else{
                    //remove the invalid for passing rule
                    if (obj[0][i].classList.contains('is-invalid') === true)
                    obj[0][i].classList.remove('is-invalid');
                    //remove the invalid message for passing rule
                    if (obj[0][i].nextElementSibling.classList.contains('invalid-feedback'))
                        obj[0][i].nextElementSibling.innerHTML = '';
                }
            }
        }
    }
    obj[0].classList.add('was-validate');
    obj[0].checkValidity()
    return true;
}