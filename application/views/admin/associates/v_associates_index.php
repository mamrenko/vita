



<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">


<h2>Это коллеги</h2>
 <?=HTML::anchor('admin/colleges/add/', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить в коллеги</button>')?>
</div>
            <?if(count($colleges)> 0):?>
            <div class="portlet-content">
                
           
<table id="placetb" class="table table-bordered table-highlight" data-paginate="TRUE">
    <thead>
<tr>
    <th>Имя коллеги</th>
    <th>Телефон коллеги</th>
     <th>Адрес коллеги</th>
    <th>Функции</th>
    
</tr>
</thead>

    <? foreach ($colleges as $college):?>

<tr>
    
    <td><?=HTML::anchor('admin/colleges/edit/'. $college->id, $college->name)?></td>
    
    <td><?=$college->phone?></td>
   
    <td>
        
         <?=$college->adress?>
      
    </td>
    <td>
        <?=HTML::anchor('admin/colleges/edit/'.$college->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
       
      
    </td>
</tr>
 <? endforeach; ?>  

</table>
                
               

 <?=HTML::anchor('admin/colleges/add/', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить в коллеги</button>')?>

</div>
            </div>
        <?else:?>
        <div class="portlet-content">
            <h3>Пока нет коллег</h3>
             <?=HTML::anchor('admin/colleges/add/', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить в коллеги</button>')?>
        </div>
        <?
endif;?>
        
        </div>
    </div>