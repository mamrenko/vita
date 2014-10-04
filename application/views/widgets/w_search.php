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
    
    
</div>
<script>
    
    $(function(){
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
