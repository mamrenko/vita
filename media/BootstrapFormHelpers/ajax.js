$(function(){
 

//console.log($amt)
//;
//
$('#amy').change(function(){
    var $amt = $('#amy').val();
    var $hidval = $('#hidval').val();
////   // alert($amt);
    $.post('cart/edit',{input: $amt, inputid:$hidval },function(data){
     //$('#feedback').text(data);
  });
  });
//$('#amy').change(function(){
//   
//value = $(this).attr('value');
//  $(this).parent().submit();
//    });
    
});
 
 



    
	
    

	