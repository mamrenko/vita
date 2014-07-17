<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">


<h3>Площадки на которых играют актеры</h3>
</div>
            <div class="portlet-content">
                
           
<table id="placetb" class="table table-bordered table-highlight" data-paginate="TRUE">
    <thead>
<tr>
    <th>Название</th>
    <th>Туппа театра</th>
    <th>Функции</th>
    
</tr>
</thead>

    <? foreach ($places as $place):?>

<tr>
    
    <td><?=HTML::anchor('admin/artists/list/'. $place->id, $place->title)?></td>
    
    <td><?=HTML::anchor('admin/artists/list/'. $place->id, '<button class="btn btn-info" type="button"><i class="fa fa-user"></i> Труппа Театра</button>')?></td>
   
    <td>
        
         <?=HTML::anchor('admin/artists/add/'. $place->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить в труппу</button>')?>
      
    </td>
</tr>
 <? endforeach; ?>  

</table>
                
               



</div>
            </div>
        </div>
    </div>

