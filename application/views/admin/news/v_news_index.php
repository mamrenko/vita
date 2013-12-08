<div class="row">
    <div class="col-md-6">
        <div class="portlet">
            <div class="portlet-header">
                <p>
  
   
      <?=HTML::anchor('admin/news/add/', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
</p>
                
                
            </div>
            <div class="portlet-content">
        <?if(count($all_news)>0):?>        
<table  id ="placetb" class="table table-bordered table-highlight">
    <thead>
<tr>
    <th>Дата</th>
    <th>Название</th>
    
    
    <th>Функции</th>
    
</tr>
</thead>
    <? foreach ($all_news as $news):?>

<tr>
    <td> <?=date('d-m-Y',strtotime($news->day));?></td>
    <td><?=HTML::anchor('admin/news/edit/'. $news->id, $news->title)?></td>
    
   
    <td>
          <?=HTML::anchor('admin/news/edit/'. $news->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
         <?=HTML::anchor('admin/news/delete/'. $news->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?> 

 
    </td>
</tr>
 <? endforeach; ?>  

</table>
<?else:?>
                
                <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-danger">Нет  Новостей</span>
             
                </li>
                </ul>
                <?endif?>
</div></div></div>
    </div>