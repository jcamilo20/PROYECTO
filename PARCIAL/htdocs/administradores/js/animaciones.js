$(window).scroll(function() {
         $('#servicios').each(function(){
         var imagePos = $(this).offset().top;
         
         var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow+400) {
               $(this).addClass("fadeIn");
            }
         });

      
         $('#pago').each(function(){
         var imagePos = $(this).offset().top;
         
         var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow+400) {
               $(this).addClass("slideExpandUp");
            }
         });         


$('#glitch').each(function(){
         var imagePos = $(this).offset().top;
         
         var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow+400) {
               $(this).addClass("slideRight");
            }
         });       

 });


