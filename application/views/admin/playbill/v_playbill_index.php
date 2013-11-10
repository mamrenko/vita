<h2>
Страница Мероприятий 
(На сайте показываются только События).
</h2>


<br />
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка</th>
   
    
</tr>
<tr>
    <?foreach ($playbills as $playbill):?>


    <td>
        <?=HTML::anchor('admin/playbill/list/'.$playbill->place->id, $playbill->place->title)?>
    </td>
    
   
</tr>
    <? endforeach; ?>  
</table>





