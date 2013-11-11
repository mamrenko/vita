<h2>
Страница Мероприятий 
(На сайте показываются только События).
</h2>


<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Список мероприятий Площадки</th>
    
    
    <th>Добавить мероприятие</th>
    <th>Сцены</th>
    
</tr>
<tr>
    <?foreach ($places as $place):?>
<p></p>

   <?if(count($place->scenes->find_all()) > 0):?>
    <td>
        <?=HTML::anchor('admin/playplaces/list/'.$place->id, $place->title)?>
    </td>
   
   
    <td>
        
          <?=HTML::anchor('admin/playplaces/add/'. $place->id, HTML::image('media/images/add.png'))?>
          <?=HTML::anchor('admin/playplaces/add/'. $place->id, 'Добавить Мероприятие')?>
    </td>
    <td>
        <?$scenes = $place->scenes->find_all()?>
        <?foreach($scenes as $scene):?>
        <p><?=$scene->title?></p>
        <?endforeach?>
    </td>
    
        <?else:?>
    <td>
        <?=$place->title?>
    </td>
    <td><p>Нужны сцены  </p></td>
       <td>
        <h3>Здесь нет сцен</h3>
        <?=HTML::anchor('admin/scenes/add/'.$place->id, HTML::image('media/images/add.png'))?>
        <?=HTML::anchor('admin/scenes/add/'.$place->id, 'Добавить Сцену')?>
        </td>
         <?endif?>
    
 
</tr>
    <? endforeach; ?>  
</table>

<br />


<br />
<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>

