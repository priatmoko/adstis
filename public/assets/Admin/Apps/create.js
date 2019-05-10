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
    $('#user-profile').postAjax({
        success:function(r){
            console.log(r);
        }
    });
}