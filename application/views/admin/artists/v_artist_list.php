<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">
                <p><?=HTML::anchor('admin/artists', '<button class="btn btn-info" type="button"><i class="fa fa-reply-all"></i> Вернуться на список площадок</button>')?></p>
<p>

   
<?=HTML::anchor('admin/artists/add/'.$place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Актера</button>')?>
    
    
    
</p>
<h3>Актеры </h3>
</div>
            <div class="portlet-content">
    <?if(count($artists) > 0){?>
        
        
    
           
           
<table id="placetb" class="table table-bordered table-highlight" data-paginate="TRUE">
    <thead>
<tr>
    <th>Имя</th>
    <th>Фото</th>
    <th>Описание</th>
    
    
    
    <th>Функции</th>
    
</tr>
</thead>

    <? foreach ($artists as $artist):?>

<tr>
    
    <td><?=HTML::anchor('admin/artists/edit/'. $artist->id, $artist->name)?></td>
    
   <td>
       <?if($artist->image == NULL):?>
       <?=HTML::image('/media/images/placeoff.jpg', array(
               'class' => 'img-thumbnail',
                'width' => 100,
       ))?>
       
       <?else:?>
            <?=HTML::image('media/uploads/artists/'.$artist->image,array(
                'class' => 'img-circle',
                'width' => 100,
            ))?>
       
       
       <?endif?>
       
   </td>
   <td>
        <?=$artist->description?>
   </td>
  
    <td>
        
        <p>   <?=HTML::anchor('admin/artists/edit/'. $artist->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?></p>
        <p>
         <?=HTML::anchor('admin/artists/delete/'. $artist->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
       </p>
    </td>
</tr>
 <? endforeach; ?>  

</table>
    <?}
else {?>
    
                <H3>Пока в труппе никого</H3>
   <p>

<?=HTML::anchor('admin/artists/add/'.$place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Актера</button>')?>
   
</p>             
<?}?>


</div>
            </div>
        </div>
    </div>


