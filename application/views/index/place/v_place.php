 <h1>Афиша: <?=$place->title;?></h1>
<ol class="breadcrumb">
     <li><a href="<?=URL::base();?>">Главная</a></li>
     <li><a href="<?=URL::base()?>places">Площадки</a></li>
     <li class="active"><?=$place->title;?></li>
  
</ol>




 
      <div class="row margin-10">
         
        <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Описание <?=$place->title;?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
        
              
               <?=HTML::image('media/uploads/places/small_'.$place->image, array(
                    'class' => 'pull-right img-thumbnail',
                    
                    
               ));?>
          
  
            
            <?=$place->description;?>
  
      </div>
    </div>
  </div>
            
            
  <div class="panel panel-default">
    <div class="panel-heading ">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Адрес <?=$place->title;?>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
       <?=$place->adress;?>
      </div>
    </div>
  </div>
   
       
</div>

        
        
        
        
    </div>

<br />
    
    <div class="row">
        
            
            <div class="panel panel-primary">
  <div class="panel-heading"><i class="fa fa-calendar-o"></i>  Выберите Даты</div>
  
            
            
            
          
       
        <div class="panel-body">
           <?= Form::open('places/place/'.$place->id, array(
          'id' => 'validate-basic',
          'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
             
            
            
            
            <div class="col-md-3">
                <div class="form-group">
                  <?=Form::input('startday',  $data['startday'], array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                     'placeholder' => 'Начальная дата',
                                     'id' => 'dpStart', 
                                     'data-date-format' => 'dd-mm-yyyy',
                                     'data-date-autoclose' => 'true',
                                     'data-required' => 'true',
                                    
                                    
                  ))?>
		
                </div>
	</div>

           <div class="col-md-3">
               <div class="form-group">
                <?=Form::input('endday', $data['endday'], array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                     'placeholder' => 'Конечная дата',
                                     'id' => 'dpEnd', 
                                     'data-date-format' => 'dd-mm-yyyy',
                                     'data-date-autoclose' => 'true',
                                     'data-required' => 'true',
                                    
                                    
                  ))?>
		
               </div></div>
               <div class="col-md-3">
               <div class="form-group">
                    
                      <?=Form::button('submit', 'Выбрать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success',
                          ));?>
                   <?=Form::button('reset', 'Убрать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-warning',
                          ));?>
                    
                    
                  </div>
        </div>
        <?= Form::close();?>
              </div>        
        </div>
   
         </div>
  <?if (isset($interval)){?>
     <? if(count($interval) > 0):?>
    <div class="row">
    <div class="table-responsive">
           <table id="rectb2" 
		class="table table-striped table-bordered table-hover table-highlight" 
		data-provide="datatable" 
		
                 >
              <thead>
                
		<tr>
			
			<th></th>
                        <th>Дата</th>
			<th data-sortable="true" data-direction="asc">Название</th>
			<th data-sortable="true" data-direction="asc" >Сцена</th>
			<th></th>
		</tr>
	    </thead>
               <tbody>
                     <?  foreach ($interval as $intervals):?>
                <tr>
                        
                        <td>
                              <?=HTML::anchor('event/'.$intervals->playbill->id,HTML::image('media/uploads/playplaces/small_'.$intervals->playbill->image, array(
                        
                        'class' => 'img-thumbnail',
                        'width' => 150,
                        'alt' =>$intervals->playbill->place->title.' - '. $intervals->playbill->title,
                        
               )) );?>
                        </td>
                        <td>
                         <p><?=date('d-m-Y',strtotime($intervals->day));?></p>
                          <p>Начало в <?=$intervals->tart->start; ?> </p>
                         <p></p>
                        </td>
                        <td>
                            <h4><?=HTML::anchor('event/'.$intervals->playbill->id, $intervals->playbill->title);?></h4>
                          <p><?=$intervals->playbill->subtitle;?></p>
                           <button class="btn btn-default btn-xs"
                            data-toggle="modal"
                            
                             
                            data-target="#myModals<?=$intervals->playbill->id;?>">
                          Подробнее
                        </button> 
                             <div class="modal" id="myModals<?=$intervals->playbill->id;?>" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$intervals->playbill->place->title?>
 <?=$intervals->playbill->title; ?></h4>
      </div>
      <div class="modal-body">
          <?=HTML::image('media/uploads/playplaces/'.$intervals->playbill->image, array(
                   'class' => 'pull-right img-circle',
                    
                    
               ));?>
          
        <?=$intervals->playbill->description; ?>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
       
      </div>
    </div>
  </div>
</div>
                          
                        </td>
                        <td>
                            
                             <button class="btn btn-default btn-sm" data-toggle="modal" 
                                     data-target="#myModal<?=$intervals->scene->id;?>">
                          Схема: <?=$intervals->scene->title;?> 
                            </button> 
                           
                            <div class="modal" id="myModal<?=$intervals->scene->id;?>" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$intervals->playbill->place->title?>
 <?=$intervals->scene->title; ?></h4>
      </div>
      <div class="modal-body">
         <?=HTML::image('media/uploads/scenes/'.$intervals->scene->image, array(
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
                          <p>
                             

                             
                    <?=HTML::anchor('order/'.$intervals->id, 'Заказать', array(
                         'class' => 'btn btn-success',
                        'role' => 'button',
                    ));?>
                </p>   
                            
                        </td>
                </tr>
              
        
                       <?endforeach;?>
               
           </table> 
            
            
            
        </div>
        
                
        
    
    
    
    <?  elseif (count($interval) == 0): {?>
        <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Очень жаль!</strong> В выбранный период нет событий. Попробуйте выбрать другой интервал.
            </div>  
    <?}?>
    
     
   
    
    
        <?endif;?>
          
  <?}?></div>
<?if(!$interval){?>
    <div class="row"> 
        <br>
<table id="rectb2" 
		class="table table-striped table-bordered table-hover table-highlight" 
		data-provide="datatable" 
		
                 >
              <thead>
                
		<tr>
			
			<th></th>
                        <th>Дата</th>
			<th data-sortable="true" data-direction="asc">Название</th>
			<th data-sortable="true" data-direction="asc" >Сцена</th>
			<th></th>
		</tr>
	    </thead>
            <tbody>
                  <?foreach($events as $event):?>
             
                <tr>
                    <td>
                        
                        <a href="<?=URL::base()?>event/<?=$event->playbill->id;?>">

                     <?=HTML::image('media/uploads/playplaces/small_'.$event->playbill->image, array(
                        
                        'class' => 'img-thumbnail',
                         'width' => 150,
                        'alt' =>$event->playbill->place->title.' - '. $event->playbill->title,
                        
               ));?>
                    </td> 
                    
                    <td>
                       <? $month =(date('m',strtotime($event->day)));
                       switch ($month) {
case 1:
    $month =  " Января";
    break;
case 2:
    $month =  " Февраля";
    break;
case 3:
    $month =  " Марта";
    break;
case 4:
    $month = " Апреля";
    break;
case 5:
    $month = " Мая";
    break;
case 6:
    $month = " Июня";
    break;
case 7:
    $month = " Июля";
    break;
case 8:
    $month =  " Августа";
    break;
case 9:
    $month = " Сентября";
    break;
case 10:
    $month = " Октября";
    break;
case 11:
    $month = " Ноября";
    break;
case 12:
    $month = " Декабря";
    break;
default:
    $month = "????";
                       
                       }                 ?>
                        <?$den =(date('N',strtotime($event->day)));
                        
                        switch ($den) {
case 1:
    $den =  " Понедельник";
    break;
case 2:
    $den =  " Вторник";
    break;
case 3:
    $den =  " Среда";
    break;
case 4:
    $den =  " Четверг";
    break;
case 5:
    $den =  " Пятница";
    break;
case 6:
    $den =  " Суббота";
    break;
case 7:
    $den =  " Воскресенье";
    break;
default:
    $den =  " ????";
}
                        
                        
                        ?>
                        <?=date('d',strtotime($event->day)).' '.$month.
                                ' '.date('Y',strtotime($event->day)).' '.$den;?>
                     <p>Начало в <?=$event->start; ?> </p>
                    </td>
                    <td>
                        <?=HTML::anchor('event/'.$event->playbill->id,$event->playbill->title );?>
                      <p><?=$event->playbill->subtitle;?></p>
                       <button class="btn btn-default btn-xs"
                            data-toggle="modal"
                            
                             
                            data-target="#myModal2<?=$event->playbill->id;?>">
                          Подробнее
                        </button> 
                      <div class="modal" id="myModal2<?=$event->playbill->id;?>" 
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
                                        

                      
                      
                      
                      
                      
                    </td>
                    <td>
                        <button class="btn btn-default btn-sm" data-toggle="modal"
                                data-target="#myModal3<?=$event->scene->id;?>">
                          <?=$event->scene->title;?>
                        </button> 
              
               <div class="modal" id="myModal3<?=$event->scene->id;?>" 
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
               
                        
                    </td>
                    <?if(isset($arr[$event->id])):?>
                   
                     <td>
                         
                                   
                    <?=HTML::anchor('cart', 'В Заказе', array(
                         'class' => 'btn btn-danger',
                        'role' => 'button',
                    ));?>
                        
                    </td>
    
             <?else:?>
                    
                     <td>
                                   
                    <?=HTML::anchor('order/'.$event->id, 'Заказать', array(
                         'class' => 'btn btn-success',
                        'role' => 'button',
                    ));?>
                        
                    </td>
                    
                    <?
endif;?>
                </tr>
                <?endforeach;?>
                
                
                
                
            </tbody>
</table>

     
    </div>
<?}?>
   
   
  
    
     
    

    
    
 

    
    
    
    



  
