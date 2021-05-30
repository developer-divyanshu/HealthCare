<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Testing</title>
</head>
<body>
    <div id="mydiv">

    </div>
    <script>
        var inProcess = false;//Just to make sure that the last ajax call is not in process
        setInterval( function () {
            if (inProcess) {
                return false;//Another request is active, decline timer call ...
            }
            inProcess = true;//make it burn ;)
            var data = [];
            jQuery.ajax({
                url: 'test.php', //Define your script url here ...
                data: data, //Pass some data if you need to
                method: 'POST', //Makes sense only if you passing data
                async: false,
                success: function(data) {
                    jQuery('#mydiv').html(data);//update your div with new content, yey ....
                    inProcess = false;//Queue is free, guys ;)
                },
                error: function() {
                    //unknown error occorupted
                    inProcess = false;//Queue is free, guys ;)
                }
            });
        }, 3000 );
    </script>
</body>
</html>