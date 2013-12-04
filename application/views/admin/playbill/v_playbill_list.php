
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
<table id="placetb" class="table table-bordered table-highlight table-hover">
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
        <p><?=$cost->area->title?>  <?=$cost->price?> руб.</p>
        <?endforeach?>
        
    </td>
    <td>
         
       <?if(count($playbill->events->find_all()) > 0):?>
        <?$events = $playbill->events->find_all();?>
         <?foreach($events as $event):?>
        <p> <?=date('d-m-Y',strtotime($event->day));?></p>
        <?  endforeach;?>
         <?=HTML::anchor('admin/events/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i>Добавить Событие</button>')?> 
       
         <?else:?>
       
        <?=HTML::anchor('admin/events/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i>Добавить Событие</button>')?> 
        
        <?endif?> 
        <?else:?>
        
        <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Здесь нет Цен</span>
             
                </li>
                </ul>
        
        
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i>Добавить Цены</button>')?>
     
    <td>
        
               <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-danger">Нет событий, пока нет цен</span>
             
                </li>
                </ul>
        
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



