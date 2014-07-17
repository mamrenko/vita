
    
      <div style="padding-top:25px; padding-bottom:20px" id="usStates-nav"></div>
     <ul id="usStates" class="list-group">
         
              
             <?foreach ($places as $place):?>
       
         
                     
             
              <li class="list-group-item">
                   
                <a class="list-group-item" href="places/place/<?=$place->place_id;?>"> 
                  
                    <h4 class="list-group-item-heading">
                       
                        
                        <?=$place->playbill->place->title;?>
                        <span class="badge pull-right">Событий : <?=
        count(ORM::factory('event')
        ->where('place_id', '=', $place->place_id)
        ->and_where('day', '>', date('Y-m-d'))
        ->find_all());?>
                        </span>
                   
                    </h4>
<!--                <img class="img-circle" style="width: 50px; height: 50px;"
                      src="media/uploads/places/small_<?//=$place->playbill->place->image;?>"
                      alt="<?//$place->playbill->place->title;?>">-->
               
                    <span></span>
                   
                  
                </a>   
          
              
       
               
             </li>
            
      
             <?endforeach;?>
              </ul>
 
   
      
  
     
    

