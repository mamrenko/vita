<div class="container">
    <div class="col-md-12">
      <div style="padding-top:25px" id="usStates-nav"></div>
     <ul id="usStates">
             <?foreach ($events as $event):?>
                <li><?=$event->playbill->place->title?></li>
             <?endforeach;?>
        
    </ul>
        
    </div>
     
    
</div>
