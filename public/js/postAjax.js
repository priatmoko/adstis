/**
 * General POST ajax request
 * @param string id
 * @return void
 */
$.fn.postAjax = function(id){
    // defines the variable
    var obj; 
    var data;
    var url;
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
            console.log(r);
        },
        error : function(xhr){
            console.log(xhr);
            catchError(xhr);                       
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

var catchValidation = function(err){
    if (typeof err.responseJSON.errors != 'undefined'){
        $.each(err.responseJSON.errors, function(i, v){
            document.getElementById(i).classList.add('is-invalid');
            document.getElementById(i).nextElementSibling.innerHTML=v.join(',');
        });
    }
}