/**
 * initialize event on creating menu management features
 */
var init = function(){
    $('#app-form').submit(function(e){
        e.preventDefault();
        saveApps();
    });
}
var saveApps = function(){
    if ($('#app-form').postValidate()===false){
        return false;
    }
    $('#app-form').postAjax({
        success:function(r){
            console.log(r);
            if (r.status=="success"){
                iziToast.success({
                    title: 'INFO !',
                    message: 'Operation success, data has been saved',
                    position: 'topRight'
                });
            }else{
                iziToast.error({
                    title: 'INFO !',
                    message: 'Operation failed, please check the data input',
                    position: 'topRight'
                });
            }
        }
    });
}