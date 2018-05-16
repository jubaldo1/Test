/* global $*/
var productData;
var recLog;

// get products table 
$.ajax({
          type: "get",
          url: "productType.php",
          dataType: "json",
          success: function(data,status) {
            //console.log(data[1].products);
            productData = data;
            for (var i=0; i<data.length; i++){
              $(".search").append("<option>" + data[i].products + "</option>");
            }
          },
          complete: function(data,status){
          }
        });
        
// get receiving table
$.ajax({
          type: "get",
          url: "recLog.php",
          dataType: "json",
          success: function(data,status) {
            recLog = data;
            for (var i in recLog) {
                var rec = recLog[i];
                $('#log > tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .html(rec.date_received)
                        )
                        .append($('<td>')
                            .html(rec.shipper)
                        )
                        .append($('<td>')
                            .html(rec.product)
                        )
                        .append($('<td>')
                            .html(rec.manufacturer)
                        )
                        .append($('<td>')
                            .html(rec.style)
                        )
                        .append($('<td>')
                            .html(rec.color)
                        )
                        .append($('<td>')
                            .html(rec.dylot)
                        )
                        .append($('<td>')
                            .html(rec.size)
                        )
                        .append($('<td>')
                            .html(rec.roll_number)
                        )
                        .append($('<td>')
                            .html(rec.cartons)
                        )
                        .append($('<td>')
                            .html(rec.sidemark)
                        )
                        .append($('<td>')
                            .html(rec.po)
                        )
                    ); //ends #log >tbody
                }
          }
        });
        


$(document).ready( function(){
    //**************************************
    //Not a working more info link function
    // MODAL stopped working??
    //**************************************
    
    $(".productLink").click( function(){
        
        //alert($(this).attr('id'));
        $('#productInfoModal').modal("show");
        $("#productInfo").html("<img src='img/loading.gif'>");
        
        $.ajax({

            type: "GET",
            url: "getProductInfo.php",
            dataType: "json",
            data: { "receiverId": $(this).attr('id')},
            success: function(data,status) {
            
               //alert(data);
               $("#productInfo").html(" Age: " + data.age + "<br>" +
                                  " <img src='img/" + data.pictureURL + "'><br >" + 
                                   data.description);   
             
               $("#productNameModalLabel").html(data.name);                   
               
            
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }
            
        });//ajax
    }); //.getLink click
        
    //BASED ON WHEN THE FILTER CHANGES    
    $(".search").change(function(){
        var product = $(".search").val();
        
        $('#log > tbody').empty(); // Clears tables
        
        // loop through receiving table to display on screen
        for (var i in recLog) {
            var rec = recLog[i];
            if (product === "all"){
            $('#log > tbody')
                .append($('<tr>')
                    .append($('<td>')
                        .html(rec.date_received)
                    )
                    .append($('<td>')
                        .html(rec.shipper)
                    )
                    .append($('<td>')
                        .html(rec.product)
                    )
                    .append($('<td>')
                        .html(rec.manufacturer)
                    )
                    .append($('<td>')
                        .html(rec.style)
                    )
                    .append($('<td>')
                        .html(rec.color)
                    )
                    .append($('<td>')
                        .html(rec.dylot)
                    )
                    .append($('<td>')
                        .html(rec.size)
                    )
                    .append($('<td>')
                        .html(rec.roll_number)
                    )
                    .append($('<td>')
                        .html(rec.cartons)
                    )
                    .append($('<td>')
                        .html(rec.sidemark)
                    )
                    .append($('<td>')
                        .html(rec.po)
                    )
                ); //ends #log >tbody
            } // ends if staetment
            else if (product === recLog[i].product){
            $('#log > tbody')
                .append($('<tr>')
                    .append($('<td>')
                        .html(rec.date_received)
                    )
                    .append($('<td>')
                        .html(rec.shipper)
                    )
                    .append($('<td>')
                        .html(rec.product)
                    )
                    .append($('<td>')
                        .html(rec.manufacturer)
                    )
                    .append($('<td>')
                        .html(rec.style)
                    )
                    .append($('<td>')
                        .html(rec.color)
                    )
                    .append($('<td>')
                        .html(rec.dylot)
                    )
                    .append($('<td>')
                        .html(rec.size)
                    )
                    .append($('<td>')
                        .html(rec.roll_number)
                    )
                    .append($('<td>')
                        .html(rec.cartons)
                    )
                    .append($('<td>')
                        .html(rec.sidemark)
                    )
                    .append($('<td>')
                        .html(rec.po)
                    )
                ); //ends #log >tbody
            } // ends if staetment
        }
    });
        
});//document.ready         
        
        
    
    
