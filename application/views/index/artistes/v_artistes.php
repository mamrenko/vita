
 <div style="padding-top:25px; padding-bottom:20px" id="usStates-nav"></div>
 <ul id="usStates" class="list-group">


<?php
foreach ( $artistes as $artist ) :?>

     
      <li class="list-group-item">
                   
                <a class="list-group-item" href="artists/<?=$artist->id;?>"> 
                  
                    <p class="list-group-item-heading">
                       
                        
                       <?=$artist->name?> - 
                       <?=$artist->place->title?>
                   
                    </p>

           
                  
                   
                  
                </a>   
          
              
       
               
             </li>

<?  endforeach;?>

</ul>