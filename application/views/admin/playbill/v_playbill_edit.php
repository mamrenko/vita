

<br />
<p>
  
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, HTML::image('media/images/goback.png'))?>
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, 'Вернуться')?>
</p>
<h2>
    
    Начало мероприятия <?=$playbill->starts->start?></h2>
<h2>Сцена: <?=$playbill->scene->title?></h2>
 <?=HTML::anchor('admin/costs/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, 'Цены')?>
<table id="tfhover" class="tftable" border="1">
<tr>
    
    <th>Сектор</th>
    <th>Цены</th>
    <th>Функции</th>
    
</tr>

    
    
    
       <?if(count($playbill->costs->find_all()) > 0):?> 
         <?$costs = $playbill->costs->find_all()?>
        <?foreach($costs as $cost):?>
 <tr>   
     <td>    
           <?=$cost->area->title?>
     </td>
     <td>
         <?=$cost->price?> руб.
     </td> 
       
   
    <td>
      
            <?=HTML::anchor('admin/costs/edit/'.$cost->id, HTML::image('media/images/edit.png'))?>
       <?if(count($playbill->costs->find_all()) >1):?> 
            <?=HTML::anchor('admin/costs/delete/'.$cost->id, HTML::image('media/images/delete.png'))?>
         <?endif?>
    </td>
</tr>
    <?endforeach?>
    
</table> 
    <?else:?>
        <p>Здесь нет Цен</p>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, 'Цены')?>
        <?endif?>