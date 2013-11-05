<h2>
Страница Мероприятий <?=$place->title?>

</h2>
<h3>(На сайте показываются только События).</h3>

<table id="tfhover" class="tftable" border="1">
<tr>
    
    <th>Название</th>
    <th>Начало</th>
    <th>Сцена</th>
    <th>Цены</th>
    <th>События</th>
    
</tr>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

    
    <td>
        <?if(count($playbill->costs->find_all()) > 0):?> 
        <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, $playbill->title)?>
        
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
    <td>
       <?if(count($playbill->costs->find_all()) > 0):?> 
        <br />
        <?=HTML::anchor('admin/playbill/add', HTML::image('media/images/add.png'))?> 
        <?=HTML::anchor('admin/playbill/add', 'Событие')?> 
         <?else:?>
        <p>Надо добавить цену</p>
        <?endif?> 
    </td>
</tr>
    <? endforeach; ?>  
</table>



