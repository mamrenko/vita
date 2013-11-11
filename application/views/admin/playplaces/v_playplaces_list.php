<h2>
Страница Мероприятий <?=$place->title?>

</h2>
<h3>(На сайте показываются только События).</h3>


<p>
  
      <?=HTML::anchor('admin/playplaces', HTML::image('media/images/goback.png'))?>
      <?=HTML::anchor('admin/playplaces', 'Вернуться')?>
</p>
<br />
<p>
  
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, 'Добавить')?>
</p>
<br />
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка <?=$place->title?></th>
    
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

   
    <td><?=HTML::anchor('admin/playplaces/edit/'.$playbill->id, $playbill->title)?></td>
   
   
    <td>
            <?=HTML::anchor('admin/playplaces/edit/'.$playbill->id, HTML::image('media/images/edit.png'))?>
         <?if(count($playbill->events->find_all()) > 0):?>
     
        <p>Удалить нельзя,есть события</p>
          <?else:?>
            <?=HTML::anchor('admin/playplaces/delete/'.$playbill->id, HTML::image('media/images/delete.png'))?>
        <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>

<br />
<p>
  
   <?=HTML::anchor('admin/playplaces/add/'.$place->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, 'Добавить')?>
</p>

<br />
<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>

