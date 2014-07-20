$(function(){
 

//console.log($amt)
//;
//
$('#amy').change(function(){
    var $amt = $('#amy').val();
   // var $hidval = $('#hidval').val();
////   // alert($amt);
    $.post('cart/edit',{input: $amt},function(data){
     $('#feedback').text(data);
  });
  });
//$('#amy').change(function(){
//   
//value = $(this).attr('value');
//  $(this).parent().submit();
//    });
    
});
 
 



    
	
    

	