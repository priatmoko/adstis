var sLoader = function(tipe, msg){
    if (tipe=="show"){
        $('.preloader').show();
            if (typeof msg =='undefined' || msg == null){
                msg="Please wait, loading";
            }
            $('.preloader .loader-msg .loader-msg-content').text(msg); 
            i=1;
            setInterval(function(){
                $('.preloader .loader-msg .loader-msg-dotted').append('.');
                if (i==6){
                    $('.preloader .loader-msg .loader-msg-dotted').text('');
                    i=0;
                }
                i++;
            }, 1000);
            $('.preloader .loader-msg').show();
        
    }else{
        $('.preloader').hide();
        msg='';
        $('.preloader .loader-msg .loader-msg-content').text('');
        $('.preloader .loader-msg .loader-msg-dotted').text('');
        $('.preloader .loader-msg').hide();
    }
}