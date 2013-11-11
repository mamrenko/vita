
<p>
<?=HTML::anchor('admin/categories/add', HTML::image('media/images/add.png'))?>
    
<?=HTML::anchor('admin/categories/add', 'Добавить')?>
</p>
<br/>
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Сектора</th>
    
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($categories as $cat):?>
<p></p>

   
    <td><?=HTML::anchor('admin/categories/edit/'.$cat->id, $cat->title)?></td>
    
   
    <td>
            <?=HTML::anchor('admin/categories/edit/'.$cat->id, HTML::image('media/images/edit.png'))?>
        <?if(count($cat->events->find_all()) > 0):?>
      
        <p>Удалить нельзя,есть события</p>
          <?else:?>
            <?=HTML::anchor('admin/categories/delete/'.$cat->id, HTML::image('media/images/delete.png'))?>
         <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
<br/>
<p>
<?=HTML::anchor('admin/categories/add', HTML::image('media/images/add.png'))?>
    
<?=HTML::anchor('admin/categories/add', 'Добавить')?>
</p>
