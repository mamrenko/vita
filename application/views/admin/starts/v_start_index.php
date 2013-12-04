<div class="row">
    <div class="col-md-6">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                

                <?=HTML::anchor('admin/starts/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
                </p>

            </div>
            <div class="portlet-content">
<table id="placetb" class="table table-bordered table-highlight">
    <thead>
        <tr>
            <th>Начало Мероприятий</th>


            <th>Функции</th>

        </tr>
   </thead>
<tr>
    <?foreach ($starts as $start):?>


   
    <td><?=HTML::anchor('admin/starts/edit/'.$start->id, $start->start)?></td>
    
   
    <td>
            <?=HTML::anchor('admin/starts/edit/'.$start->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
       <?if(count($start->playbills->find_all()) > 0):?>
     
        <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Удалить нельзя, есть события</span>
             
                </li>
                </ul>
          <?else:?>
            <?=HTML::anchor('admin/starts/delete/'.$start->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
        <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
                </div>
            </div>
        </div>
    </div>