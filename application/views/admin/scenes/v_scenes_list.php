<h1></h1>
<h2>
    <?=$place->title?>


</h2>
<p><?=HTML::anchor('admin/places','Вернуться на Список Площадок')?></p>
<br />
<p>
  
      <?=HTML::anchor('admin/scenes/add/'.$place->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/scenes/add/'.$place->id, 'Добавить')?>
</p>
<br />
<?if(count($scenes) > 0):?>
<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка <?=$place->title?></th>
    
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($scenes as $scene):?>
<p></p>

   
    <td><?=HTML::anchor('admin/scenes/edit/'.$scene->id, $scene->title)?></td>
   
   
    <td>
            <?=HTML::anchor('admin/scenes/edit/'.$scene->id, HTML::image('media/images/edit.png'))?>
        &nbsp;&nbsp;
            <?=HTML::anchor('admin/scenes/delete/'.$scene->id, HTML::image('media/images/delete.png'))?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
 <?else:?>
        
<p> здесь нет сцен</p>
        
         <?endif?>
<br />
<p>
   
   <?=HTML::anchor('admin/scenes/add/'.$place->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/scenes/add/'.$place->id, 'Добавить')?>
</p>

<br />
<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>

