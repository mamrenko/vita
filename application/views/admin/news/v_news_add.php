<br/>

<?if($errors):?>

    <?foreach ($errors as $error):?>
        <div><?=$error?></div>
    <?endforeach;?>

<?  endif;?>
        
<?=Form::open('admin/news/add')?>
<table width="100%" cellspacing="10">
    <tr>
        <td ><?=Form::label('title', 'Название')?>:</td>
        <td><?=Form::input('title', $post['title'], array('size' => 100))?></td>
    </tr>
    <tr>
        <td ><?=Form::label('date', 'Дата')?>:</td>
        <td><?=Form::input('date', date('d.m.Y'), array('size' => 100))?></td>
    </tr>
    
    <tr>
        <td valign="top"><?=Form::label('content', 'Основной текст')?>: </td>
        <td><?=Form::textarea('content', $post['content'], array('cols' => 100, 'rows' => 20))?></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?=Form::submit('submit', 'Добавить')?></td>
    </tr>
</table>
<?=Form::close()?>

