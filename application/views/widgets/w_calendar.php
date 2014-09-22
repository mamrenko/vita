<div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">
                    Календарь Событий 
                    </h2>
              </div>
               
   



<div class="panel-body">
    <div class="thumbnail">
      

         
         <div id="dp-ex-55" class="" data-date-format="dd-mm-yyyy">
       

   
                             

  </div>
        
        <div id="feedback">
            
            
        </div>
      
<?//=
date('d.m.Y H:i:s',0x7FFFFFFF )?>
</div>
</div>
</div>
<script>
            
         
    $('#dp-ex-55').datepicker({
    todayBtn: "linked",
    language: "ru",
    //multidate: true,
    multidate: false,
    todayHighlight: true,
    startDate: '0d',
    clearBtn: true,
    
    })
    .on('changeDate', function(e){
       
       //var datavalues = $("#dp-ex-55").datepicker("getDates"); 
       var datavalue = $("#dp-ex-55").datepicker("getDate"); 
      
           //alert(datavalue);
           $.post('calendar/index',{datavalue: datavalue},function(data){
  $('#feedback').text(data);
     
    
  });
       
       
    })
    
    ;

            </script>
        
            <script>
                
                 $(function(){
 //var currentdays = $('#dp-ex-55').data('date')
//var currentdays = $("#dp-ex-55").datepicker( "getDates" );
//v
//console.log sd2;
//alert(currentdays);
//var datePicker = $('#dp-ex-55').datePicker().on('changeDate', function(ev) {
//    //Functionality to be called whenever the date is changed
//     alert(datePicker);
//});
                     });
                 
            </script>
            
            
        