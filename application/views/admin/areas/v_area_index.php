
<p>
<?=HTML::anchor('admin/areas/add', HTML::image('media/images/add.png'))?>
    
<?=HTML::anchor('admin/areas/add', 'Добавить')?>
</p>
<br/>
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Сектора</th>
    
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($areas as $area):?>
<p></p>

   
    <td><?=HTML::anchor('admin/areas/edit/'.$area->id, $area->title)?></td>
    
   
    <td>
            <?=HTML::anchor('admin/areas/edit/'.$area->id, HTML::image('media/images/edit.png'))?>
        &nbsp;&nbsp;
            <?=HTML::anchor('admin/areas/delete/'.$area->id, HTML::image('media/images/delete.png'))?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
<br/>
<p>
<?=HTML::anchor('admin/areas/add', HTML::image('media/images/add.png'))?>
    
<?=HTML::anchor('admin/areas/add', 'Добавить')?>
</p>