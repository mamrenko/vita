<div class="row">
    <div class="col-md-10">
        <div class="portlet">
            <div class="portlet-header">
 <p>
  
      <?=HTML::anchor('admin/playplaces', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться</button>')?>
     
</p>


<h3>Страница Мероприятий <?=$place->title?> </h3>
<ul class="portlet-tools pull-right">
								
<li>
	<span class="label label-primary">На сайте показываются только События</span>
</li>
</ul>

</div>
<div class="portlet-toolbar">
<p>
  
      
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Мероприятие</button>')?>
</p>
</div>

             <div class="portlet-content">
<table 
    id="placetb"
    class="table table-bordered table-highlight"
    data-provide="datatable"
    data-paginate="true"
    data-search="true"
    data-info="true"
   data-length-change="true"
    data-display-rows="10">
    <thead>
    <tr>
        <th data-sortable="true">Площадка <?=$place->title?></th>
         <th data-sortable="true">Сцена </th>
         <th data-sortable="true">Начало </th>
       <th data-sortable="false">Картика</th>
        <th data-sortable="false" >Функции </th>

    </tr>
  </thead>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

   
    <td><?=HTML::anchor('admin/playplaces/edit/'.$playbill->id, $playbill->title)?></td>
    <td>
        <?=$playbill->scene->title?>
    </td>
    <td>
        <?=$playbill->starts->start?>
    </td>
    <td>
        <?if($playbill->image == NULL):?>
                            <?=HTML::image('/media/images/placeoff.jpg', array(
                                    'class' => 'img-thumbnail',
                                     'width' => 100,
                            ))?>

                            <?else:?>
                             <?=HTML::image('media/uploads/playplaces/'.'small_'.$playbill->image, array(
                            'class' => 'img-thumbnail',
                            'width' => 100,
                        ))?>
                         <?endif?>
    </td>
   
    <td>
            <?=HTML::anchor('admin/playplaces/edit/'.$playbill->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
         <?if(count($playbill->events->find_all()) > 0):?>
     
        <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Удалить нельзя, есть события</span>
             
                </li>
                </ul>
          <?else:?>
            <?=HTML::anchor('admin/playplaces/delete/'.$playbill->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
        <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
<div class="portlet-toolbar">
<p>
  
   
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Мероприятие</button>')?>
</p>
</div>
 </div>
       </div>
        </div>
         </div>
