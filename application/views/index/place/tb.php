   <div class="thumbnail">
        <ul class="nav nav-pills" role="navigation">
            <li class="filter" data-filter="all">
                <a>Все</a>
            </li>
              <?foreach($scenes  as $scene):?>
            <li  class="filter" data-filter="category_<?=$scene->scene->id?>">
                <a><?=$scene->scene->title;?></a>
            </li>
            
            <?endforeach;?>
            <li class="sort" data-sort="data-name" data-order="desc">
                <a><span class="fa fa-sort-alpha-asc"></span> </a>
                    
            </li>
            <li class="sort" data-sort="data-name" data-order="asc">
               
               <a><span class="fa fa-sort-alpha-desc"></span></a>     
               
            </li>
            
            
            <li class="sort" data-sort="data-date" data-order="desc">
               
               <a><span class="fa fa-calendar"></span></a>     
               
            </li>
          

            
        </ul>
       <br />
        </div>



 <div class="row">
        <ul class="list-unstyled sorting-grid">
            
             <?foreach($events as $event):?>
            <li class="col-md-4 col-sm-6 col-xs-12 mix category_<?=$event->scene->id?>"
                data-cat="<?=$event->scene->id?>"
                data-name ="<?=$event->playbill->title;?>"
                data-date ="<?=$event->day;?>"
                
                >
                <div class="thumbnail ">
                <a href="<?=URL::base()?>event/one/<?=$event->playbill->id;?>">

                    <?=HTML::image('media/uploads/playplaces/'.$event->playbill->image, array(
                        
                        'class' => 'img-responsive',
                        'alt' =>$event->playbill->place->title.' - '. $event->playbill->title,
                        //'data-toggle' => 'tooltip',
                        //'data-placement' => 'top',
                        //'title' => $event->playbill->description,
                    
               ));?>
                   
                    <div class=" caption">
                        <h4><?=Text::limit_chars($event->playbill->title, 18);?></h4>
                        
                        <p>
              
               
               <?=  Text::limit_chars($event->playbill->subtitle, 25 );?></p>
                        
                        
                </a>
         
   
                    
                    <!-- HTML to write -->

                    <p><?=date('d-m-Y',strtotime($event->day));?></p>
                    
                    <button class="btn btn-default btn-xs"
                            data-toggle="modal"
                            
                             
                            data-target="#myModals<?=$event->playbill->id;?>">
                          Подробнее
                        </button>  
                    
                    <div class="modal" id="myModals<?=$event->playbill->id;?>" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$place->title?> <?=$event->playbill->title; ?></h4>
      </div>
      <div class="modal-body">
          <?=HTML::image('media/uploads/playplaces/'.$event->playbill->image, array(
                   'class' => 'pull-right img-circle',
                    
                    
               ));?>
          
        <?=$event->playbill->description; ?>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
       
      </div>
    </div>
  </div>
</div>
                    
                    
                    
                    
                        <p>Начало в <?=$event->tart->start; ?> </p>
                      
                         <p><!-- Button trigger modal -->
                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal<?=$event->scene->id;?>">
                          Схема: <?=$event->scene->title;?>
                        </button>   
                        </p>
                        <!-- Modal -->
<div class="modal" id="myModal<?=$event->scene->id;?>" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$place->title?> <?=$event->scene->title; ?></h4>
      </div>
      <div class="modal-body">
         <?=HTML::image('media/uploads/scenes/'.$event->scene->image, array(
                   'class' => 'img-responsive',
                    
                    
               ));?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
       
      </div>
    </div>
  </div>
</div>

                        
                        
                         <p>
                             

                             
                    <?=HTML::anchor('event/one/'.$event->id, 'Заказать', array(
                         'class' => 'btn btn-success',
                        'role' => 'button',
                    ));?>
                </p>
                   </div>
               </div>
                <br />
            </li>
            
            
              <?endforeach;?>
         
         
            
        </ul>
    
        
        </div>