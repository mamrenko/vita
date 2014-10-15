

<div style="padding-top:25px; padding-bottom:20px" id="usStates-nav"></div>
 <ul id="usStates" class="list-group">


<?php
foreach ($eventsplaces  as $ev =>$sp):?>

     
      <li class="list-group-item">
                   
                <a class="list-group-item" href="places/place/<?=$ev;?>"> 
                  
                    <p class="list-group-item-heading">
                       
                        
                       <?= $sp?>
                        <span class="badge pull-right">Событий : <?=
        count(ORM::factory('event')
        ->where('place_id', '=',  $ev)
        ->and_where('day', '>', date('Y-m-d'))
        ->find_all());?>
                        </span>
                   
                    </p>

           
                  
                   
                  
                </a>   
          
              
       
               
             </li>

<?  endforeach;?>

</ul>

   
      
  
     
    

