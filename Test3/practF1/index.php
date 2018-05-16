<!DOCTYPE html>
<html>
    <head>
        <title>Practice for Final</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" src="css/styles.css">
        <script type='text/javascript'>
            /* global $ */
            $(document).ready(function () {
                $("body").append("<h3>Test Title</h3>");
                
                // button to dynamically append test to the page
                $("#testBtn").click(function () {
                    $("#testBtnResult").append("Test");
                });
                
                // button to clear child elements from the page
                $("#clearTestResults").click(function () {
                    $("#testBtnResult").empty();
                });
            });
        </script>
    </head>
    <body>
        <!--Don't add this to a form, or else it will submit it-->
        <button id="testBtn">Test</button>
        <button id="clearTestResults">Remove</button>
        
        <div id="testBtnResult"></div>
    </body>
</html>