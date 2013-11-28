<div class='row'>
    <div class="col-md-4">
        <div class="portlet">
 
<div class="portlet-header">
    <p>
  
      
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться</button>')?>
</p>
<h3><i class="fa fa-clipboard"></i><?=$playbill->title?></h3>
</div>
<div class="portlet-content">
    <div class="well">
    <h4><?=$playbill->place->title?></h4>
   <h4>Начало мероприятия <?=$playbill->starts->start?></h4> 
   <h4>Сцена: <?=$playbill->scene->title?></h4>
    </div>
</div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="portlet">
        <div class="portlet-header">
 <?=HTML::anchor('admin/costs/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, 'Цены')?>
         </div>
        <div class="portlet-content">
<table class="table table-bordered table-highlight">
    <thead>
<tr>
    
    <th>Сектор</th>
    <th>Цены</th>
    <th>Функции</th>
    
</tr>
</thead>
    
    
    
       <?if(count($playbill->costs->find_all()) > 0):?> 
         <?$costs = $playbill->costs->find_all()?>
        <?foreach($costs as $cost):?>
 <tr>   
     <td>    
           <?=$cost->area->title?>
     </td>
     <td>
         <?=$cost->price?> руб.
     </td> 
       
   
    <td>
      
            <?=HTML::anchor('admin/costs/edit/'.$cost->id, HTML::image('media/images/edit.png'))?>
       <?if(count($playbill->costs->find_all()) >1):?> 
            <?=HTML::anchor('admin/costs/delete/'.$cost->id, HTML::image('media/images/delete.png'))?>
         <?endif?>
    </td>
</tr>
    <?endforeach?>

     
</table> 
    <?else:?>
        <p>Здесь нет Цен</p>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, 'Цены')?>
        <?endif?>
 
        
         
        <?if(count($playbill->events->find_all()) > 0):?> 
         <?$events = $playbill->events->find_all()?>
       
        
      </div>
     
    </div>
        
        </div>
</div>


<div class="row">

    <div class="col-md-8">
        <div class="portlet">
            <div class="portlet-header">
      <?=HTML::anchor('admin/events/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/events/add/'.$playbill->id, 'События')?>
            </div>
            <div class="portlet-content">
<table class="table table-bordered table-highlight">
    <thead>
<tr>
    
    <th>Дата</th>
    <th>На Главной</th>
    <th>Жанры</th>
    
    <th>Функции</th>
    
</tr>
</thead>
    
    
    
    
        <?foreach($events as $event):?>
 <tr>   
     <td>    
           <?=$event->day?>
     </td>
     <td>
         <?if($event->status > 0):?> 
На Главной
<?else:?>
    Не показано на главной
         <?endif?>
     </td> 
     <td>
      <?$categories = $event->categories->find_all();?> 
        <?foreach($categories as $cat):?>
         <p><?=$cat->title?></p>
         <?endforeach;?>

     </td>
   
    <td>
      
            <?=HTML::anchor('admin/events/edit/'.$event->id, HTML::image('media/images/edit.png'))?>
       
            <?=HTML::anchor('admin/events/delete/'.$event->id, HTML::image('media/images/delete.png'))?>
     
    </td>
</tr>
    <?endforeach?>
    
</table> 
    <?else:?>
        <br />
        <p>Здесь нет Событий</p>
      <?=HTML::anchor('admin/events/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/events/add/'.$playbill->id, 'События')?>
        <?endif?>
        </div>
        </div>
    </div>
</div>