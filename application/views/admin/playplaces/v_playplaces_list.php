<div class="row">
    <div class="col-md-8">
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
  
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, 'Добавить')?>
</p>
</div>

             <div class="portlet-content">
<table class="table table-bordered table-highlight">
    <thead>
    <tr>
        <th>Площадка <?=$place->title?></th>
         <th>Сцена</th>
         <th>Начало</th>

        <th>Функции</th>

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
            <?=HTML::anchor('admin/playplaces/edit/'.$playbill->id, HTML::image('media/images/edit.png'))?>
         <?if(count($playbill->events->find_all()) > 0):?>
     
        <p>Удалить нельзя,есть события</p>
          <?else:?>
            <?=HTML::anchor('admin/playplaces/delete/'.$playbill->id, HTML::image('media/images/delete.png'))?>
        <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
<div class="portlet-toolbar">
<p>
  
   <?=HTML::anchor('admin/playplaces/add/'.$place->id, HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playplaces/add/'.$place->id, 'Добавить')?>
</p>
</div>
 </div>
       </div>
        </div>
         </div>
