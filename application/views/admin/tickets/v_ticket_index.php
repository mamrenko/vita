<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h2>
                 Все события
                </h2>
                <ul class="portlet-tools pull-right">
								
                <li>
                        <span class="label label-primary">Всего событий : <?=count($events);?></span>
                </li>
                </ul>

            </div>
            <div class="portlet-content">
<table id="placetb" class="table table-bordered table-highlight">
    
    <thead>
    <tr>
        <th>Дата</th>
        <th>Площадка</th>
        <th>Мероприятие</th>
        <th>Начало</th>
        <th>Сцена</th>
        <th>Список Билетов</th>
        <th>Билеты</th>
        <th>Функции</th>
    </tr>
    </thead>
<tr>
    <?foreach ($events as $event):?>
    <td>
        <?=date('d-m-Y',strtotime($event->day));?>
       
    </td>

    <td>
        <?=$event->playbill->place->title?>
    </td>
    <td>
        <?=$event->playbill->title?>
    </td> 
     <td>
        <?=$event->playbill->starts->start?>
    </td> 
    <td>
        <?=$event->playbill->scene->title?>
    </td> 
    <td>
        <?$tickets = $event->tickets->find_all();?> 
                <?if(count($tickets)> 0):?>
        <?foreach($tickets as $ticket):?>
        <p> <?=$ticket->sector?>
            Ряд: <?=$ticket->row?>
            Место:  <?=$ticket->seat?> 
            Цена: <?=$ticket->cost?> 
          </p>                  
                               
        <?endforeach?>
        <?else:?>
                
                <ul class="portlet-tools pull-left">
								
                <li>
                        <span class="label label-primary">Нет Билетов</span>
                </li>
                </ul>
                <?endif?>
    </td>
    <td>
        <?=HTML::anchor('admin/tickets/list/'. $event->id, 'Билеты')?>
       
    </td>
    <td>
        <?=HTML::anchor('admin/events/edit/'.$event->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
         <?=HTML::anchor('admin/events/delete/'.$event->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
    </td>
   
</tr>
    <? endforeach; ?>  
</table>
</div>
        </div>
</div>
    </div>
