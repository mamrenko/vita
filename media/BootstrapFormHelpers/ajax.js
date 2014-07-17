$(function(){
 

//console.log($amt)
//;

 $('#amt').click(function(){
    var $amt = $('#amy').val();
    var $hidval = $('#hidval').val();
   // alert($amt);
    $.post('cart/edit',{input: $amt, inputid:$hidval },function(data){
      //$('#feedback').text(data);
   });
    });
    
});
 
 



    
	
    

	