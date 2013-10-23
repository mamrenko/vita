<!-- Generated from http://html-generator.weebly.com -->



<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Дата</th>
    <th>Название</th>
    
    
    <th>Функции</th>
    
</tr>

    <? foreach ($all_news as $news):?>

<tr>
    <td><?=$news->date?></td>
    <td><?=HTML::anchor('admin/news/edit/'. $news->id, $news->title)?></td>
    
   
    <td>
           <?=HTML::anchor('admin/news/edit/'. $news->id, HTML::image('media/images/edit.png'))?>

           <?=HTML::anchor('admin/news/delete/'. $news->id, HTML::image('media/images/delete.png'))?>
    </td>
</tr>
 <? endforeach; ?>  

</table>







<br/>
<p>
<?=HTML::image('media/images/add.png', array('valign' => 'top'))?>
    
<?=HTML::anchor('admin/news/add', 'Добавить')?>
</p>
