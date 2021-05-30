$(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('body').delay(350).css({'overflow':'visible'});
  });


var inProcess = false;//Just to make sure that the last ajax call is not in process
setInterval( function () {
    if (inProcess) {
        return false;//Another request is active, decline timer call ...
    }
    inProcess = true;//make it burn ;)
    var data = [];
    jQuery.ajax({
        url: 'live-fetch.php', //Define your script url here ...
        data: data, //Pass some data if you need to
        method: 'POST', //Makes sense only if you passing data
        success: function(data) {
            jQuery('#live-token-no').html(data);//update your div with new content, yey ....
            inProcess = false;//Queue is free, guys ;)
        },
        error: function() {
            //unknown error occorupted
            inProcess = false;//Queue is free, guys ;)
        }
    });
}, 1000 );