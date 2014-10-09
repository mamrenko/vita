
 <div class="panel panel-warning">
                <div class="panel-heading">
                    <h2 class="panel-title">
                    Категории
                    </h2>
              </div>
                <div class="panel-body">
                    
                    
                       
  <ul class="nav nav-pills nav-stacked">
              
       
      <?foreach($cats as $cat):?>
      
    
      
      <li><?=HTML::anchor('categories/' . $cat['id'], $cat['title']);?></li>
   
      <?endforeach?>
   
 </ul>
              
  

</div>
     </div>
 
 


 