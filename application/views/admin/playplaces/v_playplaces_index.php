<h2>
Страница Мероприятий 
(На сайте показываются только События).
</h2>

<br />
<p>
  
   
</p>
<br />
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка</th>
    
    
    <th>Добавить мероприятие</th>
    
</tr>
<tr>
    <?foreach ($places as $place):?>
<p></p>

   
    <td><?=HTML::anchor('admin/playplaces/list/'.$place->id, $place->title)?></td>
   
   
    <td>
          <?=HTML::anchor('admin/playplaces/add/'. $place->id, HTML::image('media/images/add.png'))?>
          <?=HTML::anchor('admin/playplaces/add/'. $place->id, 'Добавить Мероприятие')?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>

<br />


<br />
<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>

