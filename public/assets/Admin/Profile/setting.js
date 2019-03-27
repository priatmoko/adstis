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
    if ($('#user-profile').bootValidate()===false){
        return false;
    }
    
}