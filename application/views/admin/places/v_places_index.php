<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">

<p>

   
<?=HTML::anchor('admin/places/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
    
    
    
</p>
<h3>Площадки</h3>
</div>
            <div class="portlet-content">
                
           
<table id="placetb" class="table table-bordered table-highlight" data-paginate="TRUE">
    <thead>
<tr>
    <th>Название</th>
    <th>Адрес</th>
    <th>Картинка</th>
    <th>Сцены</th>
    
    
    <th>Функции</th>
    
</tr>
</thead>

    <? foreach ($places as $place):?>

<tr>
    
    <td><?=HTML::anchor('admin/places/edit/'. $place->id, $place->title)?></td>
    
   <td><?=$place->adress?></td>
   <td>
        <?if($place->image == NULL):?>
       <?=HTML::image('/media/images/placeoff.jpg', array(
               'class' => 'img-thumbnail',
                'width' => 100,
       ))?>
       
       <?else:?>
            <?=HTML::image('media/uploads/places/small_'.$place->image,array(
                'class' => 'img-thumbnail',
                'width' => 100,
            ))?>
       
       
       <?endif?>
   </td>
   <td><?=HTML::anchor('admin/scenes/list/'. $place->id, 'Сцены')?></td>
    <td>
        
           <?=HTML::anchor('admin/places/edit/'. $place->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
        <?if(count($place->event->place_id) > 0):?>
     
        <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Удалить нельзя, есть события</span>
             
                </li>
                </ul>
          <?else:?>
         <?=HTML::anchor('admin/places/delete/'. $place->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
        <?endif?>
    </td>
</tr>
 <? endforeach; ?>  

</table>
                
   <p>

<?=HTML::anchor('admin/places/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
   
</p>             



</div>
            </div>
        </div>
    </div>

