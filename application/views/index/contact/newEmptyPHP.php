<script>
var $sentDialog = $("#sentDialog");

  $("#contactForm").on("submit", function () {
    $sentDialog.modal('show');
    return false;
  });

   </script> 
   <script>
       $(':input').change(function(){
   $(this).css('border','3px solid green');
       });
   </script>
   
