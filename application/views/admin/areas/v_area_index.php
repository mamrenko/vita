<div class="row">
    <div class="col-md-4">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/areas/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
                </p>
                <h3>Сектора</h3>
            </div>
            <div class="portlet-content">
<table id="placetb" class="table table-bordered table-highlight">
    <thead>
        <tr>
            <th>Сектора</th>


            <th>Функции</th>

        </tr>
   </thead>
<tr>
    <?foreach ($areas as $area):?>
<p></p>

   
    <td><?=HTML::anchor('admin/areas/edit/'.$area->id, $area->title)?></td>
    
   
    <td>
            <?=HTML::anchor('admin/areas/edit/'.$area->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
        <?if(count($area->costs->find_all()) > 0):?>
      
        <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Удалить нельзя, есть события</span>
             
                </li>
                </ul>
          <?else:?>
            <?=HTML::anchor('admin/areas/delete/'.$area->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
         <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
                
</div>
            <div class="portlet-toolbar">
                    
                    <p>


                    <?=HTML::anchor('admin/areas/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
                    </p>
                </div>
            </div>
        </div>
    </div>