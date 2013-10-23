<br/>
<table width="100%" border="0" class="tbl"  cellspacing="0">
    <thead>
        <tr height="30">
            <th>Дата</th><th>Название</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($all_news as $news):?>
<tr>
<td align="center" width="100"><?=$news->date?></td>
<td ><?=HTML::anchor('admin/news/edit/'. $news->id, $news->title)?></td>
<td width="100" align="center">
<?=HTML::anchor('admin/news/edit/'. $news->id, HTML::image('media/images/edit.png'))?>

<?=HTML::anchor('admin/news/delete/'. $news->id, HTML::image('media/images/delete.png'))?>

</td>
</tr>
<? endforeach?>

</table>

<br/>
<p align="right">
<?=HTML::image('media/images/add.png', array('valign' => 'top'))?>
    
<?=HTML::anchor('admin/news/add', 'Добавить')?>
</p>
