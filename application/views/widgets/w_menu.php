 <ul class="dropdown-menu" role="menu">
           <?foreach($cats as $cat):?>
      
    
      
      <li><?=HTML::anchor('categories/' . $cat['id'], $cat['title']);?></li>
   
      <?endforeach?>
          </ul>
        

 
 


 