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
            $('#avatar').val('');
            if (r.status=="success"){
                if (r.data.hasOwnProperty('image'))
                    $('#avatar-image').attr('src', r.data.image);
                iziToast.success({
                    title: 'INFO !',
                    message: 'Operation success, the changing has been saved',
                    position: 'topRight'
                });
            }else if (r.status=="error"){
                iziToast.error({
                    title: 'INFO !',
                    message: 'Operation failed, please check the data input',
                    position: 'topRight'
                });
            }
        }
    });
}