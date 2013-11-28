
<div class='row'>
     <div class="col-md-10">
         <div class="portlet">
             <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/playbill', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться</button>')?>
                </p>
                
                 <h3> <?=$place->title?></h3>
                
  
      
     

</div>
             <div class="portlet-content">
<table class="table table-bordered table-highlight table-hover">
    <thead>
<tr>
    
    <th>Название</th>
    <th>Начало</th>
    <th>Сцена</th>
    <th>Цены</th>
    <th>События</th>
    
</tr>
</thead>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

    
    <td>
        <?if(count($playbill->costs->find_all()) > 0):?> 
        <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, $playbill->title)?>
        
         <?else:?>
        <?=$playbill->title?>
        <?endif?>
    </td>
    <td><?=$playbill->starts->start?></td>
    <td><?=$playbill->scene->title?></td>
    <td>
       <?if(count($playbill->costs->find_all()) > 0):?> 
         <?$costs = $playbill->costs->find_all()?>
        <?foreach($costs as $cost):?>
        <p><?=$cost->sector?>-<?=$cost->price?> руб.</p>
        <?endforeach?>
        
    </td>
    <td>
         
       <?if(count($playbill->events->find_all()) > 0):?>
        <?$events = $playbill->events->find_all();?>
         <?foreach($events as $event):?>
        <p><?=$event->day?></p>
        <?  endforeach;?>
         <?=HTML::anchor('admin/events/add/'.$playbill->id, HTML::image('media/images/add.png'))?> 
        <?=HTML::anchor('admin/events/add/'.$playbill->id, 'Событие')?> 
         <?else:?>
        <br />
        <?=HTML::anchor('admin/events/add/'.$playbill->id, HTML::image('media/images/add.png'))?> 
        <?=HTML::anchor('admin/events/add/'.$playbill->id, 'Событие')?> 
        <?endif?> 
        <?else:?>
        <p>Здесь нет Цен</p>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, 'Цены')?>
    <td>
        <p>Нет событий пока нет цен</p>
    </td>
        <?endif?>
    </td>
</tr>
    <? endforeach; ?>  
</table>
                 </div>
       </div>
     </div>
</div>



