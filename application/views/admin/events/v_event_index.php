<div class="row">
    <div class="col-md-9">
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