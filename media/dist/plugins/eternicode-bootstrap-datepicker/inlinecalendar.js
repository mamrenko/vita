$(function () {
     $('#dp-ex-55').datepicker({
    todayBtn: "linked",
    language: "ru",
    //multidate: true,
    multidate: false,
    todayHighlight: true,
    format: 'yyyy-mm-dd',
    startDate: '0d',
    clearBtn: true,
    todayHighlight: true,
    
    })
    .on('changeDate', function(e){
      
       //var datavalues = $("#dp-ex-55").datepicker("getDates"); 
       var datavalue = $("#dp-ex-55").datepicker("getDate");
      // window.location.href = 'calendar';
       //alert(datavalue);
       
      // var datavalue = $.datepicker.formatDate('yy-mm-dd', datavalue1);
      





      
           //alert(datavalue);
           $.post('calendar/index',{datavalue: datavalue},function(data){
  $('#feedback').text(data);
     
      window.location.href = 'calendar';
  });
       
     
    });

});