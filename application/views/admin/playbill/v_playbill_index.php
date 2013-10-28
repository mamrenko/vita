<h2>
Страница Мероприятий 
(На сайте показываются только События).
</h2>

<br />
<p>
  
   <?=HTML::anchor('admin/playbill/add', HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playbill/add', 'Добавить')?>
</p>
<br />
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка</th>
    <th>Название</th>
    <th>Начало</th>
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

    <td><?=$playbill->place->title?></td>
    <td><?=HTML::anchor('admin/playbill/edit/'.$playbill->id, $playbill->title)?></td>
    <td><?=$playbill->start?> ч.</td>
   
    <td>
            <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, HTML::image('media/images/edit.png'))?>
        &nbsp;&nbsp;
            <?=HTML::anchor('admin/playbill/delete/'.$playbill->id, HTML::image('media/images/delete.png'))?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>

<br />
<p>
  
   <?=HTML::anchor('admin/playbill/add', HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playbill/add', 'Добавить')?>
</p>

<br />
<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>

