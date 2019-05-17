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
    // if ($('#app-form').postValidate()===false){
    //     return false;
    // }
    $('#app-form').postAjax({
        success:function(r){
            console.log(r);
        }
    });
}