
<p>
<?=HTML::anchor('admin/starts/add', HTML::image('media/images/add.png'))?>
    
<?=HTML::anchor('admin/starts/add', 'Добавить')?>
</p>
<br/>
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
       <?if(count($start->playbills->find_all()) > 0):?>
     
        <p>Удалить нельзя</p>
          <?else:?>
            <?=HTML::anchor('admin/starts/delete/'.$start->id, HTML::image('media/images/delete.png'))?>
        <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>