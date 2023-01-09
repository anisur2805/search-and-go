;( function( $ ) {
  $(".sag-enquire-now form").on("submit", function(e){
    e.preventDefault();
  
    var data = $(this).serialize();
  
    $.post(enqObj.url, data, function(response){
      console.log( response )
      if(response.success){
        console.log(response.success);
      } else {
        if (response.data && response.data.message) {
          alert( "Error: " + response.data.message );
        } else {
          alert( "Error: An unknown error occurred." );
        }
      }      
    })
    .fail(function(){
      alert( enqObj.error );
    });

    // Book a Table
    $.post(enqObj.url, data, function(response){
      console.log( response )
      if(response.success){
        console.log(response.success);
      } else {
        if (response.data && response.data.message) {
          alert( "Error: " + response.data.message );
        } else {
          alert( "Error: An unknown error occurred." );
        }
      }      
    })
    .fail(function(){
      alert( enqObj.error );
    });
  });
  
} )( jQuery );
