<h2>

</h2>
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Начало Мероприятий</th>
    
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($starts as $start):?>
<p></p>

   
    <td><?=HTML::anchor('admin/starts/edit/'.$start->id, $start->start)?></td>
    
   
    <td>
            <?=HTML::anchor('admin/starts/edit/'.$start->id, HTML::image('media/images/edit.png'))?>
        &nbsp;&nbsp;
            <?=HTML::anchor('admin/starts/delete/'.$start->id, HTML::image('media/images/delete.png'))?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>