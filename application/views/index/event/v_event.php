

<ol class="breadcrumb">
     <li><a href="<?=URL::base()?>places">Площадки</a></li>
     <li><a href="<?=URL::base()?>places/place/<?=$playbill->place->id;?>"><?=$playbill->place->title;?></a></li>
     <li class="active"><?=$playbill->title;?></li>
  
</ol>
<div class="well">
<h1 ><?=$playbill->place->title;?></h1>
</div>
            
                <div class="row">
                    
                  
                        <h2><?=$playbill->title;?></h2>
                        
                         <img class="img-responsive img-thumbnail pull-right" src="<?=URL::base();?>media/uploads/playplaces/<?=$playbill->image;?>"
                              alt="<?=$playbill->title;?>">
                        <?=$playbill->description;?>
                        
                    
                </div>                            
              <br />
              
              <?if(count($artists) > 0){?>
    <div class="row">
                  
                <div class="panel-group" id="accordion">
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Актерский состав
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
        <div class="panel-body">
            
                      <?
                                    foreach ($artists as $artist):?> 
                <div class="media">
                    <a class="pull-left" href="<?=URL::base()?>artists/index/<?=$artist->id;?>">
    <img class="media-object img-circle"  style="width: 100px;" src="<?=URL::base();?>media/uploads/artists/<?=$artist->image;?>" alt="<?=$artist->name;?>">
  </a>
  <div class="media-body">
      <h4 class="media-heading"><?=HTML::anchor('artists/'.$artist->id, $artist->name)?></h4>
   
  </div>
</div>

                       
                   
                      <?
                                            endforeach;?>
            
            
            
            
        </div>
                      </div>
      </div>
                    </div>
                    
                     
           
                
              </div>
              <?}?>
              
              
              <br>
<div class="row">
    
    <div class="col-md-9">
   
        <table class="table table-bordered table-hover">
            
            <tbody>
                        
                        <? foreach ($events as $dat):?>
                 <tr>  
                <td>
                    <p><?=date('d',strtotime($dat->day))?>
                        
                <?$month = (date('m',strtotime($dat->day))); ?>
                
                
                   
                    <? switch ($month) {
case 1:
    echo "января";
    break;
case 2:
    echo "февраля";
    break;
case 3:
    echo "марта";
    break;
case 4:
    echo "апреля";
    break;
case 5:
    echo "мая";
    break;
case 6:
    echo "июня";
    break;
case 7:
    echo "июля";
    break;
case 8:
    echo "августа";
    break;
case 9:
    echo "сентября";
    break;
case 10:
    echo "октября";
    break;
case 11:
    echo "ноября";
    break;
case 12:
    echo "декабря";
    break;
default:
    echo "????";
}
   ?>                 
       <?=date('Y ',strtotime($dat->day));?>             </p> 
                    <p><?$den = (date('N',strtotime($dat->day)));?> 
                     <? switch ($den) {
case 1:
    echo "Понедельник";
    break;
case 2:
    echo "Вторник";
    break;
case 3:
    echo "Среда";
    break;
case 4:
    echo "Четверг";
    break;
case 5:
    echo "Пятница";
    break;
case 6:
    echo "Суббота";
    break;
case 7:
    echo "Воскресенье";
    break;
default:
    echo "????";
}
  ?>                  
        в <?=$dat->start;?>
                    
                    </p>
                
                </td> 
                
                
                <td>
                     <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal<?=$dat->scene->id;?>">
                          Схема: <?=$dat->scene->title;?>
                        </button> 
                    
                  <div class="modal" id="myModal<?=$dat->scene->id;?>" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$dat->playbill->place->title?> <?=$dat->scene->title; ?></h4>
      </div>
      <div class="modal-body">
         <?=HTML::image('media/uploads/scenes/'.$dat->scene->image, array(
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
                <?if(isset($arr[$dat->id])):?>
                   
                     <td>
                         
                                   
                    <?=HTML::anchor('cart', 'В Заказе', array(
                         'class' => 'btn btn-danger',
                        'role' => 'button',
                    ));?>
                        
                    </td>
    
             <?else:?>
                  <td>
                      
                     
                      <?=HTML::anchor('order/index/'.$dat->id, 'Заказать', array(
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
    <div class="col-md-3">
        
        <div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Цены</h3>
  </div>
  <div class="panel-body">
   <?$costs = $playbill->costs->find_all();?>
        <?foreach ($costs as $cost):?>
        <p><?=$cost->area->title;?> - <?=$cost->price;?> руб.</p>
        <?endforeach;?> 
  </div>
</div>
           
                        
    </div>
   
    </div>
              
    
 