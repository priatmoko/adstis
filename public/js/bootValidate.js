$.fn.bootValidate = function(e){
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

var catchBValidation = function(err){
    if (typeof err.responseJSON.errors != 'undefined'){
        $.each(err.responseJSON.errors, function(i, v){
            document.getElementById(i).classList.add('is-invalid');
            document.getElementById(i).nextElementSibling.innerHTML=v.join(',');
        });
    }
}