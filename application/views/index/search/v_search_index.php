<h3>Поиск по каталогу</h3> 
<input type="text" class="span-5 form-control" id="typeahead" data-provide="typeahead" placeholder="Поиск">

<script>
    
    $(function(){
       $("#typeahead").typeahead({
           source:function(typeahead, query){
             
               $.ajaxSend({
  url: 'search/getjson',
  type: 'POST',
  data: 'query=' + query,
  dataType: 'JSON',
  async: false,
  success: function(data){
    console.log(data);
    alert(data);
      typeahead.process(data);
  }
});
         
     
    
          
               
               
           }
       });
        
    });
</script>