 <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="span-5 form-control" id="typeahead" data-provide="typeahead" placeholder="Поиск">
        </div>
<!--        <button type="submit" class="btn btn-default">Искать!</button>-->
      </form>

<?
//var_dump($result)?>

<?if(isset($val))
    print_r($val) 
    ?>

    <a href="<?=URL::base()?>search">
    <button type="button" class="btn btn-info">
        на поиск
    </button>
    </a>

<div id="feedback">
   ----- 
    
</div>
<select id="cost">
<option selected value="1">один</option>
<option selected value="2">Два</option>
<option selected value="3">Три</option>
<option selected value="4">Четыре</option>
</select>
<script>
    
    $(function(){
        
        
        $('#cost').css({'border': '3px solid green'});
        //alert($('#cost').val()) ;
       console.log($('#cost').val());
        $.post('widgets/search/index',{cost: $cost},function(data){
            
        $('#feedback').text(data);
     
    
  });
        
       $("#typeahead").typeahead({
          // source:["Youtube", "Google", "Aplodismenty"]
         source:function(query, process){
               $.ajax({
  url: 'widgets/search',
  type: 'POST',
  data: 'query=' + query,
  dataType: 'JSON',
  async: false,
  success: function(data){
    console.log(data);
      typeahead.process(data);
  }
});
//          $.post('widgets/search/getjson',{query: 'query=' + query},function(data){
//   $('#feedback').text(data);
     
    
//  });         
//               
//               
         }
       });
        
    });
</script>
