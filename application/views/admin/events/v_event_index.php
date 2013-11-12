
<h2>
 Все события
</h2>


<br />
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Дата</th>
    <th>Площадка</th>
    <th>Мероприятие</th>
    <th>Начало</th>
    <th>Сцена</th>
    <th>Функции</th>
   
    
</tr>
<tr>
    <?foreach ($events as $event):?>
    <td>
        <?=$event->day?>
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
        <?=HTML::anchor('admin/events/edit/'.$event->id, HTML::image('media/images/edit.png'))?>
         <?=HTML::anchor('admin/events/delete/'.$event->id, HTML::image('media/images/delete.png'))?>
    </td>
   
</tr>
    <? endforeach; ?>  
</table>

