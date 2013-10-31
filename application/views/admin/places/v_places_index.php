<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Название</th>
    <th>Адрес</th>
    <th>Сцены</th>
    
    
    <th>Функции</th>
    
</tr>

    <? foreach ($places as $place):?>

<tr>
    
    <td><?=HTML::anchor('admin/places/edit/'. $place->id, $place->title)?></td>
    
   <td><?=$place->adress?></td>
   <td><?=HTML::anchor('admin/scenes/list/'. $place->id, 'Сцены')?></td>
    <td>
           <?=HTML::anchor('admin/places/edit/'. $place->id, HTML::image('media/images/edit.png'))?>

           <?=HTML::anchor('admin/places/delete/'. $place->id, HTML::image('media/images/delete.png'))?>
    </td>
</tr>
 <? endforeach; ?>  

</table>







<br/>
<p>
<?=HTML::image('media/images/add.png', array('valign' => 'top'))?>
    
<?=HTML::anchor('admin/places/add', 'Добавить')?>
</p>