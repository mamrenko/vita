
<div class='row'>
<ol class="breadcrumb">
     <li><a href="<?=URL::base()?>places">Площадки</a></li>
     <li><a href="<?=URL::base()?>places/place/<?=$event->place_id;?>"><?=$event->playbill->place->title;?></a></li>
     <li class="active"><?=$event->playbill->title;?></li>
  
</ol>
      <div class="panel panel-default">
                    <div itemscope itemtype="http://schema.org/Event" class="panel-body">
                 <img itemprop="image" class="img-responsive img-thumbnail pull-right" 
                       src="<?=URL::base();?>media/uploads/playplaces/<?=$event->playbill->image;?>" 
                              alt="<?=$event->playbill->title;?>">
                    <h3>Заказ Билетов: </h3>
                 
                   <h3 itemprop="location" itemscope itemtype="http://schema.org/Place"><?=HTML::anchor('place/'.$event->playbill->place->id, 
                           
                           '<span itemprop="name">'.
                           
                           $event->playbill->place->title
                           .'</span>')?>
                   </h3>
                    <h3><?=HTML::anchor('event/'.$event->playbill->id,'<span itemprop="name">'. $event->playbill->title.'</span>');?></h3>
                    <h4 itemprop="description" ><?=$event->playbill->subtitle;?></h4>
                    <h4  itemprop="startDate" content="<?=date('Y-m-d',strtotime($event->day))?>T<?=$event->start?>  ">
                        <?=date('d',strtotime($event->day))?>
                        
                       <?$month = (date('m',strtotime($event->day))); ?>
                
                
                   
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
       <?=date('Y ',strtotime($event->day));?>            
                    <?$den = (date('N',strtotime($event->day)));?> 
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
                        
                        
                    
                       
                    в <?=$event->start?>  
                    </h4>
                    
     
</div></div></div>
    
 
    <div class="row">
        <?=Form::open('order/add/'.$event->id, array(
                
                'class' => 'form parsley-form',
                'data-validate' => 'parsley',
          ));?>
                    
     <div class="col-md-5">  
                
               
               
              
 
                   
                  <div class="form-group">
                        
                         <?=Form::label('cost', 'Стоимость билетов')?>
                          <?=Form::select('cost', $costs_s,'',array(
                              'class' => "form-control",
                          ));?>
                        
                        
                    </div>
                    
                    
             
                   
                    
                    
                    
              </div>          
              
    
     <div class="col-md-3">
          <div class="form-group bfh-number">
                           <?=  Form::label('amt', 'Количество билетов')?>
                        <?=Form::input('amt', 2, array(
                            'type' =>'text',
                            'class' => 'form-control bfh-number',
                            'data-min'=> '1',
                            'data-max' => '25',
                        ));?>
                        
                    </div>
        
         
     </div></div>
<div class="row">
        <div class="col-md-8 text-right">
            <div class="form-group">
                        
                       
                      <?=Form::button('submit', 'Заказать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success',
                          ));?> 
                        
                    </div>
    
                 <?=Form::close()?>
</div>
        </div>
        
             
     

        

