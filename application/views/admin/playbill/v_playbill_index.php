<h2>
Страница Мероприятий 
(На сайте показываются только События).
</h2>


<br />
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка</th>
    <th>Название</th>
    <th>Начало</th>
     <th>Сцена</th>
    <th>Цены</th>
   
</tr>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

    <td><?=$playbill->place->title?></td>
    <td>
        <?if(count($playbill->costs->find_all()) > 0):?> 
        <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, $playbill->title)?>
        <p>Можно добавить событие</p>
         <?else:?>
        <?=$playbill->title?>
        <?endif?>
    </td>
    <td><?=$playbill->starts->start?></td>
    <td><?=$playbill->scene->title?></td>
    <td>
       <?if(count($playbill->costs->find_all()) > 0):?> 
         <?$costs = $playbill->costs->find_all()?>
        <?foreach($costs as $cost):?>
        <p><?=$cost->sector?>-<?=$cost->price?> руб.</p>
        <?endforeach?>
        <?else:?>
        <p>Здесь нет Цен</p>
      <?=HTML::anchor('admin/playbill/add', HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playbill/add', 'Цены')?>
        <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>



<br />
<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>

