<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">

<p>

   
<?=HTML::anchor('admin/places/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
    
    
    
</p>
<h3>Площадки</h3>
</div>
            <div class="portlet-header">
                
  <div class="row dt-rt">
      <div class="col-sm-6">
          <div id="DataTables_Table_0_length" class="dataTables_length">
              <label><select name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0">
                      <option value="10" selected="selected">10</option><option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                  </select></label></div></div>
      <div class="col-sm-6"><div class="dataTables_filter" id="DataTables_Table_0_filter">
              <label><input type="text" aria-controls="DataTables_Table_0" placeholder="Search...">
              </label></div></div></div>              
                
<table class="table table-bordered table-highlight" data-paginate="TRUE">
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
       <?=HTML::image('/media/images/placeoff.jpg')?>
       
       <?else:?>
            <?=HTML::image('media/uploads/places/small_'.$place->image)?>
       <?endif?>
   </td>
   <td><?=HTML::anchor('admin/scenes/list/'. $place->id, 'Сцены')?></td>
    <td>
        
           <?=HTML::anchor('admin/places/edit/'. $place->id, HTML::image('media/images/edit.png'))?>
        <?if(count($place->event->place_id) > 0):?>
     
        <p>Удалить нельзя,есть события</p>
          <?else:?>
         <?=HTML::anchor('admin/places/delete/'. $place->id, HTML::image('media/images/delete.png'))?>
        <?endif?>
    </td>
</tr>
 <? endforeach; ?>  

</table>
                
   <p>

<?=HTML::anchor('admin/places/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
   
</p>             
<div class="row dt-rb">
    <div class="col-sm-6">
        <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 20 entries</div>
        
    </div>
    <div class="col-sm-6">
        <div class="dataTables_paginate paging_bootstrap">
            <ul class="pagination">
                <li class="prev disabled">
                    <a href="#">← Previous</a>
                </li>
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li class="next"><a href="#">Next → </a>
                </li>
            </ul>
        </div>
    </div>
</div>


</div>
            </div>
        </div>
    </div>



