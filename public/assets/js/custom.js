/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

if (window.location.hash!=""){
    $(window.location.hash+'-tab').tab('show');
}

$('#user-change-pwd').on('click', function(){
    $(window.location.hash+'-tab').tab('show');
});

//tab add hash url to keep page not change to other tab page 
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    // e.target; // newly activated tab
    // e.relatedTarget; // previous active tab
    //console.log(e.target.getAttribute('href'));
    window.location.hash = e.target.getAttribute('href');
});