<div class="row">
    <div class="col-md-4">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/categories/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
                </p>
                <h3>Категории</h3>
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
    <?foreach ($categories as $cat):?>
<p></p>

   
    <td><?=HTML::anchor('admin/categories/edit/'.$cat->id, $cat->title)?></td>
    
   
    <td>
          
         <?=HTML::anchor('admin/categories/edit/'.$cat->id,'<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
        <?if(count($cat->events->find_all()) > 0):?>
      
        <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Удалить нельзя, есть события</span>
             
                </li>
                </ul>
        
          <?else:?>
            <?=HTML::anchor('admin/categories/delete/'.$cat->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
         <?endif?>
    </td>
 
</tr>
    <? endforeach; ?>  
</table>
</div>
            <div class="portlet-toolbar">
<p>
    
<?=HTML::anchor('admin/categories/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
</p>
         </div>
          </div>     
           </div>
            </div>
             