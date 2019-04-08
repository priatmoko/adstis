/**
 * Submit form change password
 */
var submitPassword = function(){
    $('#form-user-pwd').submit(function(e){
        //prevent submit event as default and we change it using our custom event (not reload page)
        e.preventDefault();
        if ($('#form-user-pwd').postValidate()===false){
            return false;
        }
        $('#form-user-pwd').postAjax({
            success : function(r){
                if (r.status=="success"){
                    iziToast.success({
                        title: 'INFO !',
                        message: 'Operation success. Please re-sign in using new password',
                        position: 'topRight'
                    });
                    setTimeout(function(){window.location.reload()},5000);
                }else if (r.status=="error"){
                    iziToast.error({
                        title: 'INFO !',
                        message: 'Operation failed, please check the data input',
                        position: 'topRight'
                    });
                }
            }
        });
    });
}