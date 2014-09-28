<div class="well">
<h2><?=$cat->title;?></h2>

</div>






<div class="row margin-bottom-20">
    <div class="table-responsive">
           <table id="cattb" 
		class="table table-striped table-bordered table-hover table-highlight" 
		data-provide="datatable" 
		
                 >
              <thead>
                
		<tr>
			
			<th></th>
                        <th>Дата Время</th>
                       
                        <th>Площадка</th>
                        <th>Сцена</th>
			<th>Название</th>
			
			<th></th>
		</tr>
	    </thead>
               <tbody>
                     <?foreach ($events as $event):?>
                <tr>
                        
                        <td>
                              <?=HTML::anchor('event/'.$event->playbill->id,HTML::image('media/uploads/playplaces/small_'.$event->playbill->image, array(
                        
                        'class' => 'img-thumbnail',
                                 // 'width' => 150,
                        'alt' =>$event->playbill->place->title.' - '. $event->playbill->title,
                        
               )) );?>
                        </td>
                        <td>
                         <p><?=date('d-m-Y',strtotime($event->day));?></p>
                           <p>Начало в <?=$event->tart->start; ?> </p>
                         
                        </td>
                        
                        <td>
                          <?=HTML::anchor('place/'.$event->playbill->place->id,$event->playbill->place->title );?>  
                        </td>
                        <td>
                            
                           <button class="btn btn-default btn-sm" data-toggle="modal" 
                                     data-target="#myModal<?=$event->scene->id;?>">
                          Схема:  <?=$event->scene->title;?> 
                            </button> 
                           
                            <div class="modal" id="myModal<?=$event->scene->id;?>" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$event->playbill->place->title?>
 <?=$event->scene->title; ?></h4>
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
                            
                            
                            
                          
                            
                            
                        </td>
                        <td>
                          <h4><?=HTML::anchor('event/'.$event->playbill->id,$event->playbill->title);?></h4>
                          <p><?=$event->playbill->subtitle;?></p>
                          
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
        <h4 class="modal-title" id="myModalLabel"><?=$event->playbill->place->title?>
 <?=$event->playbill->title; ?></h4>
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
                          
                          
                          
                          
                          
                        </td>
                        
                        <td>
                          <p>
                             

                             
                    <?=HTML::anchor('order/index/'.$event->id, 'Заказать', array(
                         'class' => 'btn btn-success',
                        'role' => 'button',
                    ));?>
                </p>   
                            
                        </td>
                </tr>
              
        
                       <?endforeach;?>
               
           </table> 
            
            
            
        </div>
        
                
        
    </div>