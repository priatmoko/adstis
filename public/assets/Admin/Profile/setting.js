//initial 
var initProfile = function(){
    //form user setting event
    saveProfile();
    //form change password event
    submitPassword();
}
/**
 * save the profile
 */
var saveProfile = function(){
    //catch submit event
    $('#user-profile').submit(function(e){
        e.preventDefault();
        //validate form
        if ($('#user-profile').postValidate()===false){
            return false;
        }
        //make ajax request
        $('#user-profile').postFile({
            ext : ['png', 'jpg'],
            maxsize : 1024,
            success : function(r){
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
    });
}