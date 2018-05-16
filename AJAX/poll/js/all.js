function doStuff() {
    /* global $ */
    
    // This runs when the page has loaded, or when it's "ready"
    $(document).ready(function() {
        //$("#input").change(function(){
        $.ajax({
            type: "GET",
            url: "getInfo.php",
            //url: "apiEndpoint.php",
            dataType: "json",
            data: {
                // "index": "index",
                // "answer": "answer",
                // "yes": "yes",
                // "no": "no"
            },
            success: function(data,status) {
                alert("Data GET: " + data);
                console.log("Data gotten", data);
            },
            complete: function(data,status) { 
                // optional, used for debugging purposes
                alert("Data GET: " + data + "Status GET: " + status);
            },
            error: function(err) {
                alert("Error GET: " + err);
                console.log("Didn't get data", err);
            }
        }); // end of ajax GET
            
        $("#input").click(function() { 
            $.ajax({
                type: "POST",
                url: "insertInfo.php",
                //url: "apiEndpoint.php",
                data: {
                  "answer": $(".answers").val()  
                },
                success: function(data,status) {
                    alert("Data POST: " + data);
                    console.log("Data POST: ", data);
                },
                complete: function(data,status) { 
                    // optional, used for debugging purposes
                    alert("Data POST: " + data + ", Status POST: " + status);
                },
                error: function(err) {
                    alert("Error POST: " + err);
                    console.log("Didn't get data", err);
                }
            }); // end of ajax POST
        }); //  end of on-click
    }); // end of ready function
            
}