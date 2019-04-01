//initial 
var initProfile = function(){
    $('#user-profile').submit(function(e){
        e.preventDefault();
        saveProfile(e);
    });
}
/**
 * save the profile
 */
var saveProfile = function(e){
    // if ($('#user-profile').postValidate()===false){
    //     return false;
    // }
    $('#user-profile').postFile({
        ext : ['png', 'jpg'],
        maxsize : 1024,
        success : function(r){
            console.log(r);
            iziToast.success({
                title: 'INFO !',
                message: 'Operation success, the changing has been saved',
                position: 'topRight'
              });
        }
    });
    // $('#user-profile').postAjax({
    //     success : function(r){
    //         iziToast.success({
    //             title: 'INFO !',
    //             message: 'Operation success, the changing has been saved',
    //             position: 'topRight'
    //           });
    //     }
    // });
}