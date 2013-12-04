<div class="row">
    <div class="col-md-8">
        <div class="portlet">
            <div class="portlet-header">

<p>
      <?=HTML::anchor('admin/places', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться</button>')?>
</p>

<p>
      <?=HTML::anchor('admin/scenes/add/'.$place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Сцену</button>')?>
</p>
<h3>
    Сцены <?=$place->title?>


    
    
    
    
            </div>
            <div class="portlet-content">
<?if(count($scenes) > 0):?>
<table class="table table-bordered table-highlight">
    <thead>
    <tr>

        <th>Площадка <?=$place->title?></th>
         <th>Картинка</th>

        <th>Функции</th>

    </tr>
</thead>
<tr>
    <?foreach ($scenes as $scene):?>


   
    <td><?=HTML::anchor('admin/scenes/edit/'.$scene->id, $scene->title)?></td>
   
   <td>
        <?if($scene->image == NULL):?>
       <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-danger">Нет Схемы Зала</span>
             
                </li>
                </ul> 
       
       <?else:?>
        <?=HTML::image('media/uploads/scenes/small_'.$scene->image,array(
            'class' => 'img-thumbnail',
                'width' => 100,
        ))?>
       <?endif?>
   </td>
    <td>
            <?=HTML::anchor('admin/scenes/edit/'.$scene->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
       <?if(count($scene->event->scene_id) > 0):?>
     
        
         <ul class="portlet-tools pull-right">
								
                    <li>
                            <span class="label label-primary">Удалить нельзя,есть события</span>
                    </li>
                    </ul>
        
          <?else:?>
            <?=HTML::anchor('admin/scenes/delete/'.$scene->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
         <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
 <?else:?>
     <ul class="portlet-tools pull-right">
								
                    <li>
                            <span class="label label-danger">Здесь нет сцен</span>
                    </li>
                    </ul>    

        
         <?endif?>
<br />
<p>
   
  
      <?=HTML::anchor('admin/scenes/add/'.$place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Сцену</button>')?>
</p>


</div>
            </div>
        </div>
    </div>


